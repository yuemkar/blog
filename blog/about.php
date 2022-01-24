<?php

require_once "controllers/about.php";
session_start();

if(isset($_GET)){
    if(isset($_GET["p"])){
        switch ($_GET["p"]){
            default:
                get_aboutpage();
                break;
        }
    } else {
        get_aboutpage();
    }
}