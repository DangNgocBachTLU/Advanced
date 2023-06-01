<?php

namespace Advanced\Module\Observer;

use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;
use Magento\Customer\Model\Session;
use Magento\Framework\Message\ManagerInterface;
use Magento\Framework\App\Config\ScopeConfigInterface;

class CustomerLoginObserver implements ObserverInterface
{
    protected $customerSession;
    protected $messageManager;
    protected $scopeConfig;

    public function __construct(
        Session $customerSession,
        ManagerInterface $messageManager,
        ScopeConfigInterface $scopeConfig
    ) {
        $this->customerSession = $customerSession;
        $this->messageManager = $messageManager;
        $this->scopeConfig = $scopeConfig;
    }

    public function execute(Observer $observer)
    {
        $customerEmail = $this->customerSession->getCustomer()->getEmail();
        $blacklistEmails = $this->getBlacklistEmails();

        if (in_array($customerEmail, $blacklistEmails)) {
            $this->customerSession->logout();
            $this->messageManager->addError(__('Your email is in the blacklist. Please contact support.'));
        }
    }

    private function getBlacklistEmails()
    {
        $blacklistEmails = [];
        $emailsConfig = $this->scopeConfig->getValue('advanced/blacklist/emails', \Magento\Store\Model\ScopeInterface::SCOPE_STORE);
        
        if (!empty($emailsConfig)) {
            $blacklistEmails = explode(',', $emailsConfig);
            $blacklistEmails = array_map('trim', $blacklistEmails);
        }
        
        return $blacklistEmails;
    }
}