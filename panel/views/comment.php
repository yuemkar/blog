<?php

session_start();

if(!isset($_SESSION["user"])){
    header("location:index.php");
}


require_once "controllers/settings.php";

if(isset($_GET)){
    if(isset($_GET["p"])){

        switch ($_GET["p"]){
            case "add":
                get_add_page();
                break;
            case "list":
                get_list_page();
                break;
            case "updatePage":
                get_update_page();
                break;
            case "save":
                save();
                break;
            case "delete":
                delete();
                break;
            case "update":
                update();
                break;
            default:
                get_list_page();
                break;
        }

    } else {
        get_list_page();
    }
}
?>