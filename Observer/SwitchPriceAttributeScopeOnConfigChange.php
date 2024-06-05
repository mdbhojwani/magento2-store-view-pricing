<?php
/**
 * @category Mdbhojwani
 * @package Mdbhojwani_StorePricing
 * @author Manish Bhojwani <manishbhojwani3@gmail.com>
 * @github https://github.com/mdbhojwani
 * @license http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */
namespace Mdbhojwani\StorePricing\Observer;

use Magento\Catalog\Api\Data\ProductAttributeInterface;
use Magento\Catalog\Api\ProductAttributeRepositoryInterface;
use Magento\Framework\Api\SearchCriteriaBuilder;
use Magento\Framework\App\Config\ReinitableConfigInterface;
use Magento\Framework\Event\Observer as EventObserver;
use Magento\Store\Model\Store;
use Mdbhojwani\StorePricing\Helper\Data as StorePricingHelper;

/**
 * Class SwitchPriceAttributeScopeOnConfigChange
 */
class SwitchPriceAttributeScopeOnConfigChange
{
    /**
     * @var ReinitableConfigInterface
     */
    private $config;

    /**
     * @var ProductAttributeRepositoryInterface
     */
    private $productAttributeRepository;

    /**
     * @var SearchCriteriaBuilder
     */
    private $searchCriteriaBuilder;

    /**
     * @var StorePricingHelper
     */
    private $storePricingHelper;

    /**
     * @param ReinitableConfigInterface $config
     * @param ProductAttributeRepositoryInterface $productAttributeRepository
     * @param SearchCriteriaBuilder $searchCriteriaBuilder
     * @param StorePricingHelper $storePricingHelper
     */
    public function __construct(
        ReinitableConfigInterface $config,
        ProductAttributeRepositoryInterface $productAttributeRepository,
        SearchCriteriaBuilder $searchCriteriaBuilder,
        StorePricingHelper $storePricingHelper
    ) {
        $this->config = $config;
        $this->productAttributeRepository = $productAttributeRepository;
        $this->searchCriteriaBuilder = $searchCriteriaBuilder;
        $this->storePricingHelper = $storePricingHelper;
    }

    /**
     * Change scope for all price attributes according to
     * 'Catalog Price Scope' configuration parameter value
     *
     * @param EventObserver $observer
     * @return void
     * @SuppressWarnings(PHPMD.UnusedFormalParameter)
     */
    public function execute(EventObserver $observer)
    {
        $this->searchCriteriaBuilder->addFilter('frontend_input', 'price');
        $criteria = $this->searchCriteriaBuilder->create();

        $scope = $this->config->getValue(Store::XML_PATH_PRICE_SCOPE);
        $scope = ($scope == Store::PRICE_SCOPE_WEBSITE)
            ? ProductAttributeInterface::SCOPE_WEBSITE_TEXT
            : ProductAttributeInterface::SCOPE_GLOBAL_TEXT;

        if ($this->storePricingHelper->isEnabled() && $this->storePricingHelper->isPriceStoreScope()) {
            $scope = ($scope == \Mdbhojwani\StorePricing\Model\Config::STORE_SCOPE_PRICE_VALUE)
            ? ProductAttributeInterface::SCOPE_STORE_TEXT
            : $scope;
        }

        $priceAttributes = $this->productAttributeRepository->getList($criteria)->getItems();

        /** @var ProductAttributeInterface $priceAttribute */
        foreach ($priceAttributes as $priceAttribute) {
            $priceAttribute->setScope($scope);
            $this->productAttributeRepository->save($priceAttribute);
        }
    }
}
