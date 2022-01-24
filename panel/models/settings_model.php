<?php

// Tek Kayıt Getir
function get_settings(){

    if(isset($_GET["id"])){

        $id = $_GET["id"];

        include "libraries/db.php";
        return $db->query("SELECT * FROM settings WHERE id=$id")->fetch(PDO::FETCH_OBJ);

    }

}

// Tüm kayıtları getir
function get_all_settings(){

    include "libraries/db.php";
    return $db->query("SELECT * FROM settings")->fetchAll(PDO::FETCH_OBJ);
}




// ekleme
function insert_settings(){


    include "libraries/db.php";


    $prepare = $db->prepare("INSERT INTO settings SET 
      full_name = :full_name,
      about_me = :about_me,
      email = :email,
      post_type = :post_type,
      phone = :phone,
      isActive = :isActive,
      profile_image_url = :profile_image_url");

    return $prepare->execute(
        array(
            "full_name"          => $_POST["full_name"],
            "about_me"           => $_POST["about_me"],
            "email"              => $_POST["email"],
            "post_type"      => $_POST["post_type"],
            "phone"              => $_POST["phone"],
            "isActive"              => $_POST["isActive"],           
            "profile_image_url"  => $_FILES["profile_image_url"]["name"],
        )
    );

}

// silme
function delete_settings(){

    include "libraries/db.php";
    $prepare = $db->prepare("DELETE FROM settings WHERE id=:id");

    return $prepare->execute(
        array(
            "id"    => $_GET["id"]
        )
    );

}

// duzenleme
function update_settings($profile_image_url = ""){

    include "libraries/db.php";

    if($profile_image_url){

        $update_query = "UPDATE settings SET 
                          full_name = :full_name,
                          about_me = :about_me,
                          email = :email,
                          post_type = :post_type,
                          phone = :phone,
                          isActive = :isActive,                         
                          profile_image_url = :profile_image_url
                          WHERE id = :id
                          ";

        $data = array(
            "full_name"          => $_POST["full_name"],
            "about_me"           => $_POST["about_me"],
            "email"              => $_POST["email"],
            "post_type"      => $_POST["post_type"],
            "phone"              => $_POST["phone"],
            "isActive"              => $_POST["isActive"], 
            "profile_image_url"  => $_FILES["profile_image_url"]["name"],
            "id"                 => $_GET["id"]
        );


    } else {

        $update_query = "UPDATE settings SET 
                          full_name = :full_name,
                          about_me = :about_me,
                          email = :email,
                          post_type = :post_type,
                          phone = :phone,
                          isActive = :isActive
                          WHERE id = :id
                          ";

        $data = array(
            "full_name"          => $_POST["full_name"],
            "about_me"           => $_POST["about_me"],
            "email"              => $_POST["email"],
            "post_type"      => $_POST["post_type"],
            "phone"              => $_POST["phone"],
            "isActive"              => $_POST["isActive"], 
            "id"                 => $_GET["id"]
        );

    }

    $prepare = $db->prepare($update_query);
    return $prepare->execute($data);

}
