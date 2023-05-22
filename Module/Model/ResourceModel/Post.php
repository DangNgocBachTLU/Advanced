<?php

    namespace Advanced\Module\Model\ResourceModel;

    use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

    class Post extends AbstractDb{
        protected function _construct(){
            // my_module_my_table là tên bảng , id là khóa chính primary của bảng
            $this->_init('demo_db_schema', 'id');
        }
    }