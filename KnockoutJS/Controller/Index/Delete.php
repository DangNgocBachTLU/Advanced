<?php
namespace Advanced\KnockoutJS\Controller\Index;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\Controller\Result\JsonFactory;
use Magento\Framework\Exception\LocalizedException;
use Magento\Framework\Exception\NoSuchEntityException;
use Advanced\KnockoutJS\Model\EmployeeFactory;

class Delete extends Action
{
    protected $resultJsonFactory;
    protected $employeeFactory;

    public function __construct(
        Context $context,
        JsonFactory $resultJsonFactory,
        EmployeeFactory $employeeFactory
    ) {
        $this->resultJsonFactory = $resultJsonFactory;
        $this->employeeFactory = $employeeFactory;
        parent::__construct($context);
    }

    public function execute()
    {
        $resultJson = $this->resultJsonFactory->create();

        try {
            $id = $this->getRequest()->getParam('id');
            $employee = $this->employeeFactory->create()->load($id);
            $employee->delete();

            $response = [
                'success' => true
            ];

            return $resultJson->setData($response);
        } catch (LocalizedException $e) {
            $response = [
                'success' => false,
                'message' => $e->getMessage()
            ];

            return $resultJson->setData($response);
        }
    }
}
