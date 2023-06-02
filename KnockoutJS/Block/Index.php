<?php
namespace Advanced\KnockoutJS\Block;

use Magento\Framework\View\Element\Template;
use Magento\Framework\View\Element\Template\Context;
use Advanced\KnockoutJS\Model\ResourceModel\Employee\CollectionFactory;

class Index extends Template
{
    protected $employeeCollectionFactory;

    public function __construct(
        Context $context,
        CollectionFactory $employeeCollectionFactory,
        array $data = []
    ) {
        $this->employeeCollectionFactory = $employeeCollectionFactory;
        parent::__construct($context, $data);
    }

    public function getEmployeeData()
    {
        $collection = $this->employeeCollectionFactory->create();
        // $collection->addAttributeToSelect('*');
        $collection->addFieldToSelect('*');


        $employeeData = [];
        foreach ($collection as $employee) {
            $employeeData[] = [
                'id' => $employee['id'],
                'name' => $employee['name'],
                'age' => $employee['age'],
                'job' => $employee['job']
            ];
        }

        return json_encode($employeeData);
    }
}
