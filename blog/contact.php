<?php
session_start();

require_once "controllers/contact.php";

if(isset($_GET)){
    if(isset($_GET["p"])){
        switch ($_GET["p"]){
            case "send":
                send_message();
                break;
            default:
                get_contactpage();
                break;
        }
    } else {
        get_contactpage();
    }
}