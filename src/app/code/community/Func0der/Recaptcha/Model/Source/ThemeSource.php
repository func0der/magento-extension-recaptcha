<?php

declare(strict_types=1);

class Func0der_Recaptcha_Model_Source_ThemeSource
{
    public const THEME_LIGHT = 'light';
    public const THEME_DARK = 'dark';

    public function toOptionArray(): array
    {
        return [
            ['value' => self::THEME_LIGHT, 'label' => 'Light'],
            ['value' => self::THEME_DARK, 'label' => 'Dark'],
        ];
    }
}

?>