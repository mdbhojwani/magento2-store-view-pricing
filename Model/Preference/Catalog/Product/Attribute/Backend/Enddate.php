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
use Magento\Framework\Stdlib\DateTime\TimezoneInterface;
use Magento\Framework\Stdlib\DateTime\DateTime;
use Mdbhojwani\StorePricing\Helper\Data as StorePricingHelper;

/**
 * Class Enddate
 */
class Enddate extends \Magento\Eav\Model\Entity\Attribute\Backend\Datetime
{
    /**
     * @var StorePricingHelper
     */
    private $storePricingHelper;

    /**
     * @param TimezoneInterface $localeDate
     * @param DateTime $date
     * @param StorePricingHelper $storePricingHelper
     * @codeCoverageIgnore
     */
    public function __construct(
        TimezoneInterface $localeDate,
        DateTime $date,
        StorePricingHelper $storePricingHelper
    ) {
        $this->storePricingHelper = $storePricingHelper;
        parent::__construct($localeDate, $date);
    }

    /**
     * @param $attribute
     * @return $this
     */
    public function setAttribute($attribute)
    {
        parent::setAttribute($attribute);
        $this->setScope($attribute);
        return $this;
    }

    /**
     * @param $attribute
     * @return $this
     */
    public function setScope($attribute)
    {
        if ($this->storePricingHelper->isEnabled()
            && $this->storePricingHelper->isPriceStoreScope()
            && $attribute->getAttributeCode() == 'special_to_date'
        ) {
            $attribute->setIsGlobal(ScopedAttributeInterface::SCOPE_STORE);
        }

        return $this;
    }
}
