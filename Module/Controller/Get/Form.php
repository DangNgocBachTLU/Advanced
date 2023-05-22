<?php
    namespace Advanced\Module\Controller\Get;

    use \Magento\Framework\App\Action\Action;
    use \Magento\Framework\View\Result\PageFactory;
    use \Magento\Framework\App\Action\Context;

    class Form extends Action
    {
        protected $resultPageFactory;

        public function __construct(Context $context, PageFactory $resultPageFactory) {
            $this->resultPageFactory = $resultPageFactory;
            return parent::__construct($context);
        }

        public function execute()
        {
            return $this->resultPageFactory->create();
        }
    }