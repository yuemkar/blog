<?php

include "models/category_model.php";

function get_categorypage(){


    if(isset($_GET["id"])){

        $posts              = get_all_posts($_GET["id"]);
        $sidebar_posts      = get_all_sidebar_posts();
        $settings           = get_settings();
        $categories         = get_categories();
        $menu_categories    = get_menu_categories();

        include "views/category/category.php";

    } else {

        header("location:index.php");

    }

}

function get_short_str($text, $len = 200){

    if(strlen(strip_tags($text)) > $len){

        return mb_substr(strip_tags($text), 0, $len) . "...";

    } else {

        return strip_tags($text);
    }

}
