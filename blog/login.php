<?php

require_once "controllers/login.php";
session_start();

if(isset($_GET)){
    if(isset($_GET["p"])){
        switch ($_GET["p"]){
            case "login":
               	get_logincheck();
                break;
            case "logout":
               	get_logout();
                break;
            case "profile":
               	get_profilpage();
                break;
            case "register":
               	get_loginregister();
                break;                
            default:
                get_loginpage();
                break;
        }
    } else {
        get_loginpage();
    }
}