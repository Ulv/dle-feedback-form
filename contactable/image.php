<?php
session_start();
header("Content-type: image/jpeg");
error_reporting (E_ALL);

include('kcaptcha.php');



$captcha = new KCAPTCHA();

$_SESSION['captcha_keystring'] = $captcha->getKeyString();

echo $_SESSION['captcha_keystring'];
?>