<?php

require_once "controllers/category.php";
session_start();

if(isset($_GET)){
    if(isset($_GET["p"])){
        switch ($_GET["p"]){
            default:
                get_categorypage();
                break;
        }
    } else {
        get_categorypage();
    }
}