<?php

include "models/post_model.php";

function get_postpage(){

$user=isset($_SESSION["user1"])? $_SESSION["user1"]:Null;

    if(isset($_GET["id"])){

        $post = get_post($_GET["id"]);
        $sidebar_posts      = get_all_sidebar_posts();
        $settings           = get_settings();
        $categories         = get_categories();
        $menu_categories    = get_menu_categories();
        $comments           = get_post_comments($_GET["id"]);

        // Görüntülenme sayısını arttırma işlemi...
        inc_display_count($post->display_count);

        include "views/post/post.php";


    } else {
        header("location:index.php");
    }


}


function leave_a_post_comment(){

$user=isset($_SESSION["user1"])? $_SESSION["user1"]:Null;

    if(isset($_GET["id"])){

        if( isset($_POST["comment"])){

            if( trim($_POST["comment"]) != "" && is_object($user)){

                $insert = addPostComment($user);

                if($insert){

                    header("location:post.php?id=".$_GET['id']);

                }


            }else{
				 header("location:post.php?id=".$_GET['id']);
			}

        }else{
			 header("location:post.php?id=".$_GET['id']);
		}

    }

}

function get_short_str($text, $len = 200){

    if(strlen(strip_tags($text)) > $len){

        return mb_substr(strip_tags($text), 0, $len) . "...";

    } else {

        return strip_tags($text);
    }

}
