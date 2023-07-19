<?php

namespace Advanced\Suggested\Ui\Component\Listing;

class CustomerDataProvider extends \Magento\Framework\View\Element\UiComponent\DataProvider\SearchResult
{
    protected function _initSelect()
    {
        parent::_initSelect();
        $this->getSelect()
            ->joinLeft(
                ['cpe_product' => $this->getTable('catalog_product_entity')],
                'main_table.product_id = cpe_product.entity_id',
                ['product_sku' => 'cpe_product.sku']
            );

        $this->getSelect()
            ->joinLeft(
                ['cpe_suggested_product' => $this->getTable('catalog_product_entity')],
                'main_table.suggested_product_id = cpe_suggested_product.entity_id',
                ['suggested_product_sku' => 'cpe_suggested_product.sku']
            );
        return $this;
    }
}