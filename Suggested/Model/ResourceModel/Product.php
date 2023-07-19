<?php
namespace Advanced\Suggested\Model\ResourceModel;


class Product extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
	
	public function __construct(\Magento\Framework\Model\ResourceModel\Db\Context $context){
		parent::__construct($context);
	}
	
	protected function _construct(){
		$this->_init('tb_suggested_product', 'entity_id');
	}
}