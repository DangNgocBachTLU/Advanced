<?php
namespace Advanced\Suggested\Model\ResourceModel\Product;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
	protected function _construct()
	{
		$this->_init('Advanced\Suggested\Model\Product', 'Advanced\Suggested\Model\ResourceModel\Product');
	}
}