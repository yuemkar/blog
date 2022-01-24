<?php

function get_all_posts(){

    require "libraries/db.php";
    return $db->query("SELECT * from post WHERE isActive = 1 ORDER BY id DESC")->fetchAll(PDO::FETCH_OBJ);
}
function get_comment(){

    require "libraries/db.php";
    return $db->query("SELECT * from comments WHERE isActive = 1 ORDER BY id DESC")->fetch(PDO::FETCH_OBJ);
}

function get_all_sidebar_posts(){

    require "libraries/db.php";
    return $db->query("SELECT * from post WHERE isActive = 1 ORDER BY id DESC LIMIT 5 ")->fetchAll(PDO::FETCH_OBJ);
}

function get_settings(){

    require "libraries/db.php";
    return $db->query("SELECT * from settings WHERE isActive = 1 LIMIT 1")->fetch(PDO::FETCH_OBJ);
}

function get_category_title($id = -1){

    require "libraries/db.php";
    $category = $db->query("SELECT * from category WHERE id = $id")->fetch(PDO::FETCH_OBJ);
    return $category->title;
}

function get_categories(){

    require "libraries/db.php";
    return $db->query("SELECT * from category WHERE isActive = 1 ORDER BY title ASC")->fetchAll(PDO::FETCH_OBJ);
}

function get_menu_categories(){

    require "libraries/db.php";
    return $db->query("SELECT * from category WHERE isActive = 1 AND isMenu = 1 ORDER BY title ASC")->fetchAll(PDO::FETCH_OBJ);
}


