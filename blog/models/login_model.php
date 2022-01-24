<?php

function check_login($email,$pass){

    require "libraries/db.php";
    $prepare = $db->prepare("SELECT * from `user` WHERE `isActive` = 1 AND `email` = :email AND `password` = :pass");

	$pass = md5($pass);
    $prepare->execute(
        array(
            "email"    => $email,
            "pass" 	 => $pass
        )
    );

    return $prepare->fetch(PDO::FETCH_OBJ);
}

// Tek Kayıt Getir
function get_user(){

    if(isset($_GET["id"])){

        $id = $_GET["id"];

        include "libraries/db.php";
        return $db->query("SELECT * FROM user WHERE id=$id")->fetch(PDO::FETCH_OBJ);

    }

}


function get_usernew($id){
	include "libraries/db.php";
	return $db->query("SELECT * FROM user WHERE id=$id")->fetch(PDO::FETCH_OBJ);

}

// Tüm kayıtları getir
function get_all_users(){

    include "libraries/db.php";
    return $db->query("SELECT * FROM user")->fetchAll(PDO::FETCH_OBJ);
}

// ekleme
function insert_user(){


    include "libraries/db.php";

    $prepare = $db->prepare("INSERT INTO user SET 
      full_name = :full_name,
      email = :email,
      password = :password,
      isActive = :isActive,
      sbox = :sbox,
      createdAt = :createdAt");

    return $prepare->execute(
        array(
            "full_name"          => $_POST["full_name"],
            "email"              => $_POST["email"],
            "password"           => md5($_POST["password"]),
            "isActive"           => $_POST["isActive"],
            "sbox"           => $_POST["sbox"],
            "createdAt"          => date("Y-m-d H:i:s")
        )
    );

}

function insert_usernew($val){


    include "libraries/db.php";

    $prepare = $db->prepare("INSERT INTO user SET 
      full_name = :full_name,
      email = :email,
      password = :password,
      isActive = :isActive,
      sbox = :sbox,
      createdAt = :createdAt");

    return $prepare->execute(
        array(
            "full_name"          => $val["full_name"],
            "email"              => $val["email"],
            "password"           => md5($val["password"]),
            "isActive"           => 0,
            "sbox"           => 'User',
            "createdAt"          => date("Y-m-d H:i:s")
        )
    );

}

// silme
function delete_user(){

    include "libraries/db.php";
    $prepare = $db->prepare("DELETE FROM user WHERE id=:id");

    return $prepare->execute(
        array(
            "id"    => $_GET["id"]
        )
    );

}

// duzenleme
function update_user(){

    include "libraries/db.php";

    $password = $_POST["password"];

    if ($password) {

        $update_query = "UPDATE user SET 
        full_name = :full_name,
        email = :email,
        password = :password,
        isActive = :isActive,
        sbox = :sbox,
        WHERE id= :id";

        $data = array(
            "full_name"          => $_POST["full_name"],
            "email"              => $_POST["email"],
            "password"           => md5($_POST["password"]),
            "isActive"           => $_POST["isActive"],
            "sbox"           => $_POST["sbox"],
            "id"                 => $_GET["id"]
        );

    } else {

        $update_query = "UPDATE user SET 
        full_name = :full_name,
        email = :email,
        isActive = :isActive,
        sbox = :sbox
        WHERE id= :id";

        $data = array(
            "full_name"          => $_POST["full_name"],
            "email"              => $_POST["email"],
            "isActive"           => $_POST["isActive"],
            "sbox"           => $_POST["sbox"],
            "id"                 => $_GET["id"]
        );

    }

    $prepare = $db->prepare($update_query);

    return $prepare->execute($data);
}


function update_usernew($val,$id){

    include "libraries/db.php";

        $update_query = "UPDATE `user` SET 
        `full_name` = :full_name,
        `email` = :email
        WHERE `id`= :id";

        $data = array(
            "full_name"          => $val["full_name"],
            "email"              => $val["email"],
            "id"                 => $id
        );

    $prepare = $db->prepare($update_query);

    return $prepare->execute($data);
}

function update_userpass($pass,$id){

    include "libraries/db.php";

        $update_query = "UPDATE `user` SET 
        `password` = :pass
        WHERE `id`= :id";

        $data = array(
            "pass"          => md5($pass),
            "id"                 => $id
        );

    $prepare = $db->prepare($update_query);

    return $prepare->execute($data);
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

