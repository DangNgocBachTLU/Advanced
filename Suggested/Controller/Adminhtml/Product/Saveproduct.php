<?php

namespace Advanced\Suggested\Controller\Adminhtml\Product;

use Advanced\Suggested\Model\ProductFactory;
use Magento\Backend\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;

class Saveproduct extends \Magento\Backend\App\Action
{
	protected $resultPageFactory = false;
	protected $productFactory;

	public function __construct(
		Context $context,
		PageFactory $resultPageFactory,
		ProductFactory $productFactory
	)
	{
		$this->productFactory = $productFactory;
		parent::__construct($context);
		$this->resultPageFactory = $resultPageFactory;
	}

	public function execute()
	{
		$data = $this->getRequest()->getPostValue();
        $resultRedirect = $this->resultRedirectFactory->create();
	     try {
	           $model = $this->productFactory->create();
			   $model->setData($data);
			   $model->save();
		    	$this->messageManager->addSuccessMessage(__('You saved the product.'));
			} catch(\Exception $e) {
				 $this->messageManager->addExceptionMessage($e, __('Something went wrong while saving the product.'));
			}
	 	return $resultRedirect->setPath('*/*/');
	}
}
