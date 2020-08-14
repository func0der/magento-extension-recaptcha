# Magento Extension - ReCaptcha

## Requirements

  * PHP >= 7.1
  * Magento 1.9.x or OpenMage LTS

## Installation

### Composer

Require this module via composer

```
composer require func0der/magento-extension-recaptcha
``` 

### Manually

Put the contents of the `src` folder in your Magento root folder.

## How to use

In the admin area of Magento, find the settings for frontend use in

`Customer -> Customer configuration -> CAPTCHA`

and for the admin area

`Advanced -> Admin -> CAPTCHA`

From there, select the *Captcha Type* to be *ReCaptcha*.

Afterwards put in your *Site Key* and your *Secret Key*. Optionally chose a theme.

** Please be aware, that you need to put your keys in the admin settings *and* in the customer CAPTCHA settings, to use them at both places. **


## Uninstall

### Important!

Before you uninstall this module, make sure to change the `type` of the captcha back to
'Internal' in the admin interface.
Else the internal captcha will not work anymore.

### Composer 

Run:


```
composer remove func0der/magento-extension-recaptcha
```
