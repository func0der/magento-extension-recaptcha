<?php

declare(strict_types=1);

class Func0der_Recaptcha_Model_Source_TypeSource
{
    public function toOptionArray(): array
    {
        return [
            ['value' => 'zend', 'label' => 'Internal'],
            ['value' => 'zend_recaptcha', 'label' => 'ReCaptcha'],
        ];
    }
}

?>