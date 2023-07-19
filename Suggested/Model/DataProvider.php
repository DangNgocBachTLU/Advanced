<?php

namespace Advanced\Suggested\Model;
 
use Advanced\Suggested\Model\ResourceModel\Product\CollectionFactory;
 
class DataProvider extends \Magento\Ui\DataProvider\AbstractDataProvider
{

	protected $collection;
    public function __construct(
        $name,
        $primaryFieldName,
        $requestFieldName,
        CollectionFactory $productCollectionFactory,
        array $meta = [],
        array $data = []
    ) {
        $this->collection = $productCollectionFactory->create();
        parent::__construct($name, $primaryFieldName, $requestFieldName, $meta, $data);
    }
 
    public function getData()
    {
        $items = $this->collection->getItems();
        $loadedData = array();
        foreach ($items as $item) {
            $loadedData[$item->getId()] = $item->getData();
        }
        return $loadedData;
    }


}