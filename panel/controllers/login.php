<?php

session_start();

// SQL İşlemlerinin yapıldığı Model dosyasının yüklenmesi
include "models/login_model.php";

function login(){

    if(isset($_SESSION['user'])){
        header("location:post.php");
    } else {
        include "views/login/login.php";
    }

}

function do_login(){

    $user = get_user();

    if($user) {

        $_SESSION["user"] = $user;

        $_SESSION["alert"] = array(
            "title" => "Başarılı",
            "text"  => "İşlem başarılıdır",
            "type"  => "success"
        );

        header("location:post.php");

    } else {

        $_SESSION["alert"] = array(
            "title" => "Başarısız",
            "text"  => "Kullanıcı Bulunamadı!!",
            "type"  => "success"
        );

        header("location:index.php");
    }



}

function logout(){

    session_destroy();

    header("location:index.php");

}
