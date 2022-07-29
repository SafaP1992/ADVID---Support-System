<?php

ini_set('upload_max_filesize', '50M');
ini_set('post_max_size', '50M');
ini_set('max_input_time', 300);
ini_set('max_execution_time', 300);


$hostname = "localhost";
$database = "avidsystem_supportsDB";
$username = "avidsystem_supportsUser";
$password = "supportsUser";

// $connectionString = 'mysql:host='.$hostname.';dbname='.$database.'';
$connectionString = "mysql:host=$hostname;dbname=$database;";
$dbo = new PDO($connectionString, $username, $password, array(PDO::ATTR_PERSISTENT => true));
$dbo->exec("set names utf8");
$dbo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
// $dbh = new PDO('mysql:host=localhost;dbname=test', $user, $pass, array(PDO::ATTR_PERSISTENT => true

//$dbo->exec("INSERT INTO post VALUES (NULL,'title','body')");
//`root`@`localhost`
