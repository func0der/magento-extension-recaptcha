<?php

declare(strict_types=1);

class Func0der_Recaptcha_Helper_Data extends Mage_Core_Helper_Abstract
{
    public const FORM_FIELD_NAME_FORM_ID = 'captcha-form-id';
    private const SITE_KEY = 'recaptcha_sitekey';
    private const SECRET_KEY = 'recaptcha_secretkey';
    private const RECAPTCHA_THEME = 'recaptcha_theme';
    private const THEME_LIGHT = Func0der_Recaptcha_Model_Source_ThemeSource::THEME_LIGHT;
    private const THEME_DARK = Func0der_Recaptcha_Model_Source_ThemeSource::THEME_DARK;

    public function getKey(): string
    {
        return (string) Mage::helper('captcha')->getConfigNode(self::SITE_KEY);
    }

    public function getTheme(): string
    {
        if ((Mage::helper('captcha')->getConfigNode(self::RECAPTCHA_THEME)) === self::THEME_LIGHT) {
            return self::THEME_LIGHT;
        } else {
            return self::THEME_DARK;
        }
    }

    private function getSecretKey()
    {
        return Mage::helper('captcha')->getConfigNode(self::SECRET_KEY);
    }

    public function validateCaptchaV2Request($response)
    {
        $verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret=' . $this->getSecretKey() . '&response=' . $response);
        $responseData = json_decode($verifyResponse);
        return (bool)$responseData->success;
    }
}