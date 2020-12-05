<?php
declare(strict_types=1);

namespace DerFuchs\MoreLayoutHandles\Plugin\Catalog\Product;

use Magento\Catalog\Helper\Product\View as ProductViewHelper;
use Magento\Catalog\Model\Product;
use Magento\Framework\DataObject;
use Magento\Framework\View\Result\Page as ResultPage;
use Magento\Framework\View\Result\Page;

/**
 * Plugin to add some more useful layout handles to product pages:
 * - Attribute set name: catalog_product_view_attribute_set_my_attributeset_name
 *
 * @author Michael Fuchs - derfuchs <michael@derfuchs.net>
 */
class MoreLayoutHandlesPlugin
{
    /**
     * Just the constructor. Nothing special to see here. Just go along.
     *
     * @param \Magento\Eav\Api\AttributeSetRepositoryInterface $attributeSet
     */
    public function __construct(
        \Magento\Eav\Api\AttributeSetRepositoryInterface $attributeSet
    ) {
        $this->attributeSet = $attributeSet;
    }

    // ------------------------------------------------------------------------------

    /**
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

        // Add a Handle for product's attribute set
        $attributeSetName = ($this->attributeSet->get($product->getAttributeSetId()))
                                ->getAttributeSetName();
        $attributeSetNameSlug = strtolower(preg_replace('#[^0-9a-z]+#i', '_', $attributeSetName));
        $resultPage->addHandle("catalog_product_view_attribute_set_" . $attributeSetNameSlug);

        /*
        if ($resultPage instanceof ResultPage
            && $product->getData('configurator_active')
            && $product->getData('configurator_active') == 1
        ) {
            $resultPage->addHandle([static::PRODUCT_LAYOUT_HANDLE]);
        }
        */

        return [$resultPage, $product, $params];
    }

    // ------------------------------------------------------------------------------
    // ------------------------------------------------------------------------------
}
