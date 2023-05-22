<?php

    namespace Advanced\Module\Controller\Get;

    use \Magento\Framework\App\Action\Action;
    use \Magento\Framework\App\Action\Context;
    use \Magento\Framework\View\Result\PageFactory;
    use Magento\Framework\Controller\Result\RedirectFactory;
    use Magento\Framework\App\RequestInterface;
    use Advanced\Module\Model\PostFactory;

    class Actions extends Action
    {
        protected $pageFactory;
        protected $redirectFactory;
        protected $request;
        protected $postFactory;

        public function __construct(Context $context, PageFactory $pageFactory, RedirectFactory $redirectFactory, RequestInterface $request, PostFactory $postFactory) {
            $this->pageFactory = $pageFactory;
            $this->postFactory = $postFactory;
            $this->redirectFactory = $redirectFactory;
            $this->request = $request;
            return parent::__construct($context);
        }

        public function execute()
        {
            $act = isset($_GET["act"]) ? $_GET["act"] : "";
            $myModel = $this->postFactory->create();
            $resultRedirect = $this->redirectFactory->create();
            switch ($act) {
                case "add": {
                        $myModel->setData('column1', $this->getRequest()->getParam('column1'));
                        $myModel->save();
                        $resultRedirect->setPath('http://dnback.com/module/get/index');
                        return $resultRedirect;
                    }
                case "edit": {
                        $id = isset($_GET["id"]) ? $_GET["id"] : "";
                        $resultRedirect->setPath("http://dnback.com/module/get/form?id=$id");
                        return $resultRedirect;
                    }

                case "do_edit": {
                        $id = $this->getRequest()->getParam('idedit');
                        $myModel->load("$id");
                        $myModel->setData('column1', $this->getRequest()->getParam('column1'));
                        $myModel->save();
                        $resultRedirect->setPath('http://dnback.com/module/get/index');
                        return $resultRedirect;
                    }
                case "delete": {
                        $id = isset($_GET["id"]) ? $_GET["id"] : "";
                        $myModel->load("$id");
                        $myModel->delete();
                        $resultRedirect->setPath('http://dnback.com/module/get/index');
                        return $resultRedirect;
                    }
            }
        }
    }