<?php

declare(strict_types=1);

class Func0der_Recaptcha_Block_Captcha_Zend_Recaptcha extends Mage_Core_Block_Template
{
    protected $_template = 'func0der_recaptcha/zend_recaptcha.phtml';

    /**
     * @inheritDoc
     */
    public function getTemplate()
    {
        return $this->getIsAjax() ? '' : $this->_template;
    }

    /**
     * @inheritDoc
     */
    protected function _toHtml()
    {
        if ($this->getCaptchaModel()->isRequired()) {
            return parent::_toHtml();
        }
        return '';
    }

    protected function getFormId(): string
    {
        return parent::getFormId();
    }

    public function getCaptchaModel(): Func0der_Recaptcha_Model_Zend_Recaptcha
    {
        return Mage::helper('captcha')->getCaptcha($this->getFormId());
    }
}
