<?php
/**
 * @category Mdbhojwani
 * @package Mdbhojwani_StorePricing
 * @author Manish Bhojwani <manishbhojwani3@gmail.com>
 * @github https://github.com/mdbhojwani
 * @license http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */
namespace Mdbhojwani\StorePricing\Model\Preference\Catalog\Product\Attribute\Backend;

use Magento\Eav\Model\Entity\Attribute\ScopedAttributeInterface;
use Magento\Catalog\Model\Attribute\ScopeOverriddenValue;
use Mdbhojwani\StorePricing\Helper\Data as StorePricingHelper;

/**
 * Class Price
 */
class Price extends \Magento\Catalog\Model\Product\Attribute\Backend\Price
{
    /**
     * @var StorePricingHelper
     */
    private $storePricingHelper;

    /**
     * @param \Magento\Directory\Model\CurrencyFactory $currencyFactory
     * @param \Magento\Store\Model\StoreManagerInterface $storeManager
     * @param \Magento\Catalog\Helper\Data $catalogData
     * @param \Magento\Framework\App\Config\ScopeConfigInterface $config
     * @param \Magento\Framework\Locale\FormatInterface $localeFormat
     * @param StorePricingHelper $storePricingHelper
     * @param ScopeOverriddenValue|null $scopeOverriddenValue
     */
    public function __construct(
        \Magento\Directory\Model\CurrencyFactory $currencyFactory,
        \Magento\Store\Model\StoreManagerInterface $storeManager,
        \Magento\Catalog\Helper\Data $catalogData,
        \Magento\Framework\App\Config\ScopeConfigInterface $config,
        \Magento\Framework\Locale\FormatInterface $localeFormat,
        StorePricingHelper $storePricingHelper,
        ScopeOverriddenValue $scopeOverriddenValue = null
    ) {
        $this->storePricingHelper = $storePricingHelper;
        parent::__construct(
            $currencyFactory, 
            $storeManager, 
            $catalogData, 
            $config, 
            $localeFormat, 
            $scopeOverriddenValue
        );
    }

    /**
     * @param $attribute
     * @return $this
     */
    public function setScope($attribute)
    {
        if (!$this->storePricingHelper->isEnabled() || 
            !$this->storePricingHelper->isPriceStoreScope()) {
            return parent::setScope($attribute);
        }

        $attribute->setIsGlobal(ScopedAttributeInterface::SCOPE_STORE);
        return $this;
    }
}
