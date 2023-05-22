<?php

    namespace Advanced\Module\Model;

    use Magento\Framework\Model\AbstractModel;

    class Post extends AbstractModel{
        protected function _construct(){
            $this->_init('Advanced\Module\Model\ResourceModel\Post');
        }
    }