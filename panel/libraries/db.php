<?php

try{
    $db = new PDO("mysql:host=localhost;dbname=yuemkar01;charset=utf8", "root", ""); //error_reporting(0);
} catch (PDOException $e) {
    echo $e->getMessage();
    die();
}
