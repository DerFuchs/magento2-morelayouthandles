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

declare(strict_types=1);

namespace DerFuchs\MoreLayoutHandles\Plugin\Catalog\Product;

use Magento\Catalog\Helper\Product\View as ProductViewHelper;
use Magento\Catalog\Model\Product;
use Magento\Framework\DataObject;
use Magento\Framework\View\Result\Page as ResultPage;
use Magento\Framework\View\Result\Page;
use Magento\Eav\Api\AttributeSetRepositoryInterface;
use DerFuchs\MoreLayoutHandles\Helper\Data as HelperData;

class MoreLayoutHandlesPlugin
{
    /**
     * A collection of all added layout handles. For easy debugging and development.
     *
     * @var array
     */
    private $addedHandles = [];

    // ------------------------------------------------------------------------------

    /**
     * A Result/Page object
     *
     * @var Page
     */
    private $_resultPage;

    // ------------------------------------------------------------------------------

    /**
     * Just the constructor. Nothing special to see here. Just go along.
     *
     * @param \Magento\Eav\Api\AttributeSetRepositoryInterface $attributeSet
     */
    public function __construct(
        AttributeSetRepositoryInterface $attributeSet,
        HelperData $helperData
    ) {
        $this->attributeSet = $attributeSet;
        $this->helperData = $helperData;
    }

    // ------------------------------------------------------------------------------

    /**
     * Inject the additional layout handles when they have been enabled in the admin
     * panel.
     *
     * @param  ProductViewHelper    $subject
     * @param  Page                 $resultPage
     * @param  Product              $product
     * @param  null|DataObject      $params
     * @return array
     */
    public function beforeInitProductLayout(
        ProductViewHelper $subject,
        $resultPage,
        $product,
        $params
    ) {
        // don't do anything when $resultPage is not a Page object
        if (!$resultPage instanceof ResultPage) {
            return [$resultPage, $product, $params];
        }

        // store in class attribute for easy collecting of debug messages
        $this->_resultPage = $resultPage;

        // Generate layout handles belonging to attribute sets
        $this->addAttributeSetHandles($product);

        // do some debugging stuff if config says so
        if ($this->helperData->getModuleConfigValue('general/debug') == 1) {
            $this->showDebug();
        }

        return [$this->_resultPage, $product, $params];
    }

    // ------------------------------------------------------------------------------

    /**
     * Generate layout handles belonging to attribute sets
     *
     * @param Page $resultPage
     * @param Product $product
     *
     * @return void
     */
    private function addAttributeSetHandles(
        $product
    ) {
        // Add a Handle for product's attribute set id
        if ($this->helperData->getModuleConfigValue('attribute_set/add_id/enable') == 1) {
            $attributeSetIdPrefix = $this->helperData->getModuleConfigValue('attribute_set/add_id/prefix');
            $this->addHandle($attributeSetIdPrefix . $product->getAttributeSetId());
        }

        // Add a Handle for product's attribute set name
        if ($this->helperData->getModuleConfigValue('attribute_set/add_name/enable') == 1) {
            $attributeSetName = ($this->attributeSet->get($product->getAttributeSetId()))->getAttributeSetName();
            $attributeSetNameSlug = strtolower(preg_replace('#[^0-9a-z]+#i', '_', $attributeSetName));
            $attributeSetNamePrefix = $this->helperData->getModuleConfigValue('attribute_set/add_name/prefix');
            $this->addHandle($attributeSetNamePrefix . $attributeSetNameSlug);
        }

        return $this;
    }

    // ------------------------------------------------------------------------------

    /**
     * Add a layout handle to the page
     *
     * @param string $handleName
     *
     * @return Page
     */
    private function addHandle($handleName) {
        $this->addedHandles[] = $handleName;
        return $this->_resultPage->addHandle($handleName);
    }

    // ------------------------------------------------------------------------------

    /**
     * Display a litte debug message on top of the page containing a list of added
     * layout handles.
     *
     * @return void
     */
    private function showDebug() {
        echo "<pre>";
        echo "added handles on this page: \n";
        echo "(Disable this debug message in Admin -> Stores -> Configuration -> Advanced -> Developer -> More Layout Handles Settings -> Debug)) \n";
        foreach ($this->addedHandles as $key=>$handleName) {
            echo " + " . $handleName . "\n";
        }
        echo "</pre>";
    }

    // ------------------------------------------------------------------------------
    // ------------------------------------------------------------------------------
}
