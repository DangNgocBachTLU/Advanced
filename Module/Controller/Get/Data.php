<?php

    namespace Advanced\Module\Controller\Get;

    use Magento\Framework\App\Action\Action;
    use Magento\Framework\View\Result\PageFactory;
    use Magento\Framework\App\Action\Context;
    use Advanced\Module\Model\PostFactory;

    class Data extends Action
    {
        protected $PageFactory;
        protected $PostFactory;

        public function __construct(Context $context, PageFactory $pageFactory, PostFactory $postFactory)
        {
            parent::__construct($context);
            $this->PageFactory = $pageFactory;
            $this->PostFactory = $postFactory;
        }

        public function execute()
        {
            $post = $this->PostFactory->create();
            $collection = $post->getCollection();
            foreach ($collection as $item) {
                echo "<pre>";
                    print_r($item->getData());
                echo "</pre>";
            }
            exit();
            return $this->PostFactory->create();
        }
    }