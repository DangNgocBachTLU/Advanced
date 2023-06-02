<?php
namespace Advanced\KnockoutJS\Model;

use Magento\Framework\Model\AbstractModel;

class Employee extends AbstractModel
{
    protected function _construct()
    {
    $this->_init(\Advanced\KnockoutJS\Model\ResourceModel\Employee::class);
    }
}
