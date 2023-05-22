<?php

    namespace Advanced\Module\Block;

    use \Magento\Framework\View\Element\Template;
    use \Magento\Framework\View\Element\Template\Context;
    use Advanced\Module\Model\PostFactory;

    class View extends Template
    {
        protected $PostFactory;

        public function __construct(Context $context, PostFactory $postFactory
        ) {
            $this->PostFactory = $postFactory;
            parent::__construct($context);
        }

        public function getAllCollection()
        {
            $data = $this->PostFactory->create();
            return $data->getCollection();
        }
        public function getCollectionById($id){
            $data = $this->PostFactory->create();
            $collection = $data->getCollection();
            $collection->addFieldToFilter('id', $id);
            return $collection->getItems();
        }
    }