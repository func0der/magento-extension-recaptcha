<?php

declare(strict_types=1);

/**
 * We could just extend the \Mage_Captcha_Model_Observer::_getCaptchaString() here, just to make sure
 * we are getting the correct field, but this would probably hurt the functionality of the internal captcha.
 */
class Func0der_Recaptcha_Model_Observer
{
    private const FORM_FIELD_NAME_RECAPTCHA_RESPONSE = 'g-recaptcha-response';

    /**
     * Since we want to be compatible with \Mage_Captcha_Model_Observer, which registers all the
     * handlers for different events, we must rewrite the ReCpatcha api response to the field it expects the captcha
     * input to be in.
     */
    public function rewrite_captcha_parameter(Varien_Event_Observer $observer): self
    {
        /** @var Mage_Core_Controller_Varien_Action $controller */
        $controller = $observer->getControllerAction();
        $request = $controller->getRequest();
        $postData = $request->getPost();
        $formId = $request->getPost(Func0der_Recaptcha_Helper_Data::FORM_FIELD_NAME_FORM_ID);

        if (empty($postData) || empty($formId) || $this->isCaptchaRequired($formId) === false) {
            return $this;
        }

        $request->setPost(Mage_Captcha_Helper_Data::INPUT_NAME_FIELD_VALUE, [$formId => $request->getPost(self::FORM_FIELD_NAME_RECAPTCHA_RESPONSE)]);

        return $this;
    }

    private function isCaptchaRequired(string $formId): bool
    {
        $captchaModel = Mage::helper('captcha')->getCaptcha($formId);
        if (is_a($captchaModel, Func0der_Recaptcha_Model_Zend_Recaptcha::class)) {
            /** @var Func0der_Recaptcha_Model_Zend_Recaptcha $captchaModel */
            return $captchaModel->isRequired($formId);
        }
        return false;
    }
}