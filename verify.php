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