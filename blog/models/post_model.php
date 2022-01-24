<?php


function get_post($id){

    require "libraries/db.php";
    $prepare = $db->prepare("SELECT * from post WHERE isActive = 1 AND id = :id");

    $prepare->execute(
        array(
            "id"    => $id
        )
    );

    return $prepare->fetch(PDO::FETCH_OBJ);
}

function get_post_comments($id){

    require "libraries/db.php";
     $prepare = $db->prepare("SELECT * from `comments` WHERE `post_id` = :ida and `isActive` = :isActive");
    //$prepare = $db->prepare("SELECT * from comment WHERE (`post_id`)` VALUES(':$id')");

  	//$prepare->bindValue(":id",$id, PDO::PARAM_INT);
  	//$prepare->bindValue(":isActive",1);
	//$prepare->execute();
	
    $prepare->execute(
        array(
            "ida"    => $id,
            "isActive" => 1
        )
    );
		
	$r = $prepare->fetchAll(PDO::FETCH_OBJ);
    return $r;
}

function get_all_sidebar_posts(){

    require "libraries/db.php";
    return $db->query("SELECT * from post WHERE isActive = 1 ORDER BY id DESC LIMIT 3 ")->fetchAll(PDO::FETCH_OBJ);
}

function get_settings(){

    require "libraries/db.php";
    return $db->query("SELECT * from settings WHERE isActive = 1 LIMIT 1")->fetch(PDO::FETCH_OBJ);
}

function get_categories(){

    require "libraries/db.php";
    return $db->query("SELECT * from category WHERE isActive = 1 ORDER BY title ASC")->fetchAll(PDO::FETCH_OBJ);
}

function get_menu_categories(){

    require "libraries/db.php";
    return $db->query("SELECT * from category WHERE isActive = 1 AND isMenu = 1 ORDER BY title ASC")->fetchAll(PDO::FETCH_OBJ);
}


function get_category_title($id = -1){

    require "libraries/db.php";
    $category = $db->query("SELECT * from category WHERE id = $id")->fetch(PDO::FETCH_OBJ);
    return $category->title;
}

function addPostComment($user){
    require "libraries/db.php";
    $prepare = $db->prepare("INSERT INTO comments SET user_id = :user_id, name = :name, email = :email, comment = :comment, post_id = :post_id, createdAt = :createdAt");
    return $prepare->execute(
        array(
        	"user_id"     => $user->id,
            "name"      => $user->full_name,
            "email"      => $user->email,
            "comment"   => $_POST["comment"],
            "createdAt" => date("Y-m-d H:i:s"),
            "post_id"   => $_GET["id"]

        )
    );

}

function inc_display_count($display_count){

//    $display_count++;
    $display_count = $display_count + 1;

    require "libraries/db.php";

    $prepare = $db->prepare("UPDATE post SET display_count = :dCount WHERE id = :id");

    return $prepare->execute(
        array(
            "dCount" => $display_count,
            "id"     => $_GET["id"]
        )
    );

}



