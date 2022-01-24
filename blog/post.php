<?php

require_once "controllers/post.php";
session_start();

if(isset($_GET)){
    if(isset($_GET["p"])){
        switch ($_GET["p"]){
            case "comment":
                leave_a_post_comment();
                break;
            default:
                get_postpage();
                break;
        }
    } else {
        get_postpage();
    }
}