<?php
/**
 * Plugin to add some more useful layout handles to product pages:
 *
 * - Attribute set id: catalog_product_view_attribute_set_id_1337
 * - Attribute set name: catalog_product_view_attribute_set_my_attributeset_name
 *
 * @category  DerFuchs
 * @package   DerFuchs_MoreLayoutHandles
 * @author    Michael Fuchs - derfuchs
 * @copyright Copyright (c) 2020 Michael Fuchs - derfuchs - https://www.derfuchs.net
 * @license   MIT
 */

namespace DerFuchs\MoreLayoutHandles\Block\System\Config;

use Magento\Config\Block\System\Config\Form\Field;
use Magento\Framework\Data\Form\Element\AbstractElement;

class Notes extends Field
{
    /**
     * Render some addition information for this module
     *
     * @param AbstractElement $element
     *
     * @return string
     */
    public function render(AbstractElement $element)
    {
        $html = '<td colspan="3" id="derfuchs-morelayouthandles-notes">
                    <div id="derfuchs-morelayouthandles-notes-inner">
                        <div class="messages">
                            <div class="message message-info">
                                <div data-ui-id="messages-message-info">
                                    <h2>
                                        Module: DerFuchs_MoreLayoutHandles
                                    </h2>
                                    <p>
                                        This module enables you to dynamically add layout handles to specific pages. You can use them within your theme to make custom layout updates on occurance of specific rules or pages and stuff like that.<br/>
                                        <br/>
                                        Check out the following links to learn how to use this module and it\'s layout handles:
                                    </p>
                                    <ul style="margin: 1em 0 0 2em;">
                                        <li><a href="https://github.com/DerFuchs/magento2-morelayouthandles" target="_blank">' . __('Github Repository') . '</a></li>
                                        <li><a href="https://github.com/DerFuchs/magento2-morelayouthandles/blob/main/README.md" target="_blank">' . __('Developer Guide (readme file on Github)') . '</a></li>
                                        <li><a href="https://github.com/DerFuchs/magento2-morelayouthandles/issues" target="_blank">' . __('Got an idea for another handle? Tell me about it by opening an issue on Github!') . '</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </td>';

        return $this->_decorateRowHtml($element, $html);
    }

    // ------------------------------------------------------------------------------

    /**
     * @param AbstractElement $element
     *
     * @return string
     * @SuppressWarnings(PHPMD.UnusedFormalParameter)
     */
    protected function _getElementHtml(AbstractElement $element)
    {
        return $this->_toHtml();
    }

    // ------------------------------------------------------------------------------
    // ------------------------------------------------------------------------------
}
