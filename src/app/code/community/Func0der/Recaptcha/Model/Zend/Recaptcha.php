<?php

declare(strict_types=1);

/**
 * The only reason we are extending the Mage_Captcha_Model_Zend here, is because it has protected methods
 * that do not need to be duplicated, as this is an extension of the core's captcha functionality.
 * For security reasons and convenience, we do not want this.
 */
class Func0der_Recaptcha_Model_Zend_Recaptcha extends Mage_Captcha_Model_Zend implements Mage_Captcha_Model_Interface
{
    /**
     * @var string
     */
    protected $_formId;

    /**
     * @var Func0der_Recaptcha_Helper_Data
     */
    private $_reCaptchaHelper;

    /**
     * @inheritDoc
     */
    public function isCorrect($word)
    {
        $helper = $this->_getReCaptchaHelper();
        return $helper->validateCaptchaV2Request($word);
    }

    /**
     * Do nothing, because ReCaptcha handles the need for a captcha themselves.
     * As of now, we only support showing the captcha all the time.
     * @inheritDoc
     */
    public function logAttempt($login)
    {
        return $this;
    }

    public function getBlockName()
    {
        return 'captcha/captcha_zend_recaptcha';
    }

    protected function _isShowAlways()
    {
        return true;
    }

    private function _getReCaptchaHelper(): Func0der_Recaptcha_Helper_Data
    {
        if (empty($this->_reCaptchaHelper)) {
            $this->_reCaptchaHelper = Mage::helper('func0der_recaptcha/data');
        }
        return $this->_reCaptchaHelper;
    }
}
