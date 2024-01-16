<?php

use Aryandev\zibal\Zibal;
use Aryandev\zibal\ZibalException;

require_once "./vendor/autoload.php";
$zibal = new Zibal(getenv("MERCHANT"), "https://example.ir/verify.php");
try {
    $zibal->request(amount: 10000,redirect: true);
} catch (ZibalException $e) {
    echo "<pre>{$e->getZibalMessage()}</pre>";
}