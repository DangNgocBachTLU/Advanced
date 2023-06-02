<?php
namespace Advanced\KnockoutJS\Model\ResourceModel\Employee;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;
use Advanced\KnockoutJS\Model\Employee;
use Advanced\KnockoutJS\Model\ResourceModel\Employee as EmployeeResource;

class Collection extends AbstractCollection
{
    protected $_idFieldName = 'id';

    protected function _construct()
    {
        $this->_init(Employee::class, EmployeeResource::class);
    }
}
