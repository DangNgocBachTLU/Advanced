<?php
namespace Advanced\Suggested\Model;
class Product extends \Magento\Framework\Model\AbstractModel
{
	protected function _construct()
	{
		$this->_init('Advanced\Suggested\Model\ResourceModel\Product');
	}
}
