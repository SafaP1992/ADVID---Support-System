<?php
session_start();
$random = md5(rand());
$captcha_vms = substr($random, 0, 5);
$_SESSION["captcha"] = $captcha_vms;
$target = imagecreatetruecolor(55, 30);
$captcha_background = imagecolorallocate($target, 205, 78, 19);
imagefill($target, 0, 0, $captcha_background);
$captcha_fore_color = imagecolorallocate($target, 0, 0, 0);
imagestring($target, 8, 5, 5, $captcha_vms, $captcha_fore_color);
header("Content-type: image/jpeg");
imagejpeg($target);
