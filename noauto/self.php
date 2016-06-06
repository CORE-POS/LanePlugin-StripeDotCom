<?php

if (!class_exists('StripeDotCom', false)) {
    include(__DIR__ . '/../StripeDotCom.php');
}

if (!class_exists('StripeParser', false)) {
    include(__DIR__ . '/../StripeParser.php');
}

if (!class_exists('StripeAmountPage', false)) {
    include(__DIR__ . '/../gui/StripeAmountPage.php');
}

if (!class_exists('StripePaymentPage', false)) {
    include(__DIR__ . '/../gui/StripePaymentPage.php');
}

if (!class_exists('StripeQrCode', false)) {
    include(__DIR__ . '/../gui/StripeQrCode.php');
}

