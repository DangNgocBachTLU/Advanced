<?php

    namespace Advanced\Module\Model\ResourceModel\Post;

    use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

    class Collection extends AbstractCollection{
        protected function _construct(){
            $this->_init(
                'Advanced\Module\Model\Post',
                'Advanced\Module\Model\ResourceModel\Post'
            );
        }
    }