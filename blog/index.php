<?php

require_once "controllers/homepage.php";
session_start();

if(isset($_GET)){
    if(isset($_GET["p"])){
        switch ($_GET["p"]){
            default:
                get_homepage();
                break;
        }
    } else {
        get_homepage();
    }
}