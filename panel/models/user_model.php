<?php

// Tek Kayıt Getir
function get_user(){

    if(isset($_GET["id"])){

        $id = $_GET["id"];

        include "libraries/db.php";
        return $db->query("SELECT * FROM user WHERE id=$id")->fetch(PDO::FETCH_OBJ);

    }

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
