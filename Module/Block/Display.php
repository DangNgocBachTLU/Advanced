<?php
    namespace Advanced\Module\Block;

    use \Magento\Framework\View\Element\Template;

    class Display extends Template
    {
        public function getText($text) {
            return $text;
        }

        public function getEnable(){
            return $this->_scopeConfig->getValue('advanced/general/enable');
        }
        public function getName(){
            return $this->_scopeConfig->getValue('advanced/general/name');
        }
        public function getList(){
            return $this->_scopeConfig->getValue('advanced/general/list');
        }
    }
?>