## ZibalPHP
use this library for download from SoundCloud Easily

Installation
-------

Recommended way of installing this is via [Composer](http://getcomposer.org):

```bash
composer require aryan-developer/zibal
```

Run locally:

```bash
php -S localhost:8000
```


# Usage

Request
-------
```php
<?php

use Aryandev\zibal\Zibal;
use Aryandev\zibal\ZibalException;

require_once "./vendor/autoload.php";
$zibal = new Zibal("65xxxxxxx0d", "https://example.ir/verify.php");
try {
    $zibal->request(amount: 10000,redirect: true);
} catch (ZibalException $e) {
    echo "<pre>{$e->getZibalMessage()}</pre>";
}
?>

```

Verify
-------
```php
<?php
use Aryandev\zibal\Zibal;
use Aryandev\zibal\ZibalException;

require_once "./vendor/autoload.php";
if($_GET['success']==1) {
    $zibal = new Zibal("65a1498fc5d2cb001d8d540d", "https://example.ir/verify.php");
    try {
        $response = $zibal->verify($_GET['trackId']);
        var_dump($response);
    } catch (ZibalException $e) {
        echo $e->getZibalResultCode();
    }
}else{
    echo "پرداخت با شکست مواجه شد.";
}
```