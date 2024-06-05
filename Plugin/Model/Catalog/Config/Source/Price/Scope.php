<?php
/**
 * @category Mdbhojwani
 * @package Mdbhojwani_StorePricing
 * @author Manish Bhojwani <manishbhojwani3@gmail.com>
 * @github https://github.com/mdbhojwani
 * @license http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */
namespace Mdbhojwani\StorePricing\Plugin\Model\Catalog\Config\Source\Price;

use Mdbhojwani\StorePricing\Helper\Data as StorePricingHelper;
use Mdbhojwani\StorePricing\Model\Config;

/**
 * Class Scope
 */
class Scope
{
    /**
     * @var StorePricingHelper
     */
    protected $storePricingHelper;

    /**
     * @param StorePricingHelper $storePricingHelper
     */
    public function __construct(
        StorePricingHelper $storePricingHelper
    ) {
        $this->storePricingHelper = $storePricingHelper;
    }

    /**
     * @param \Magento\Catalog\Model\Config\Source\Price\Scope $subject
     * @param $result
     * @return $result
     */
    public function afterToOptionArray(
        \Magento\Catalog\Model\Config\Source\Price\Scope $subject,
        $result
    ) {
        if ($this->storePricingHelper->isEnabled()) {
            $result[] = [
                'value' => Config::STORE_SCOPE_PRICE_VALUE,
                'label' => __('Store View')
            ];
        }
        
        return $result;
    }
}
