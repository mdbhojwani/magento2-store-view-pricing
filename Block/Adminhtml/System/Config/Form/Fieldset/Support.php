<?php
/**
 * @category Mdbhojwani
 * @package Mdbhojwani_StorePricing
 * @author Manish Bhojwani <manishbhojwani3@gmail.com>
 * @github https://github.com/mdbhojwani
 * @license http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */
namespace Mdbhojwani\StorePricing\Block\Adminhtml\System\Config\Form\Fieldset;

use Magento\Backend\Block\Template;
use Magento\Backend\Block\Template\Context;
use Magento\Framework\Data\Form\Element\AbstractElement;
use Magento\Framework\Data\Form\Element\Renderer\RendererInterface;

/**
 * Class Support
 */
class Support extends Template implements RendererInterface
{
    /**
     * @var string
     */
    protected $_template = 'Mdbhojwani_StorePricing::system/config/form/fieldset/support.phtml';

    /**
     * @param AbstractElement $element
     * @return mixed
     */
    public function render(AbstractElement $element)
    {
        return $this->toHtml();
    }
}
