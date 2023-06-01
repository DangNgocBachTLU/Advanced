<?php

namespace Advanced\Module\Observer;

use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;
use Magento\Customer\Model\Data\Customer;
use Magento\Framework\Message\ManagerInterface;
use Magento\Framework\App\Config\ScopeConfigInterface;

class CustomerRegisterObserver implements ObserverInterface
{
    protected $messageManager;
    protected $scopeConfig;

    public function __construct(
        ManagerInterface $messageManager,
        ScopeConfigInterface $scopeConfig
    ) {
        $this->messageManager = $messageManager;
        $this->scopeConfig = $scopeConfig;
    }

    public function execute(Observer $observer)
    {
        $customer = $observer->getEvent()->getData('customer');
        $customerEmail = $customer instanceof Customer ? $customer->getEmail() : null;
        $blacklistEmails = $this->getBlacklistEmails();

        if (in_array($customerEmail, $blacklistEmails)) {
            $this->messageManager->addError(__('Your email is in the blacklist. Please contact support.'));
            $this->redirectCustomer($observer);
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

    private function redirectCustomer(Observer $observer)
    {
        $controllerAction = $observer->getEvent()->getData('controller_action');
        $controllerAction->getResponse()->setRedirect('/');
    }
}