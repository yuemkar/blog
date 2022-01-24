<?php

// SQL İşlemlerinin yapıldığı Model dosyasının yüklenmesi
include "models/category_model.php";

function get_add_page(){
    include "views/category/add.php";
}
function get_list_page(){

    $categories = get_all_categories();

    include "views/category/list.php";
}
function get_update_page(){

    $category = get_category();

    include "views/category/update.php";
}

function save(){


    $insert = insert_category();

    if($insert){

        $_SESSION["alert"] = array(
            "title" => "Başarılı",
            "text"  => "İşlem başarılıdır",
            "type"  => "success"
        );

    } else {


        $_SESSION["alert"] = array(
            "title" => "Başarısız",
            "text"  => "İşlem başarısızdır",
            "type"  => "success"
        );

    }

    header("location:category.php");


}
function update(){

    $update = update_category();

    if($update) {

        $_SESSION["alert"] = array(
            "title" => "Başarılı",
            "text"  => "İşlem başarılıdır",
            "type"  => "success"
        );

    } else {

        $_SESSION["alert"] = array(
            "title" => "Başarısız",
            "text"  => "İşlem başarısızdır",
            "type"  => "success"
        );

    }

    header("location:category.php");

}
function delete(){

    if(isset($_GET["id"])){

        $delete = delete_category();

        if($delete) {

            $_SESSION["alert"] = array(
                "title" => "Başarılı",
                "text"  => "İşlem başarılıdır",
                "type"  => "success"
            );

        } else {

            $_SESSION["alert"] = array(
                "title" => "Başarısız",
                "text"  => "İşlem başarısızdır",
                "type"  => "success"
            );

        }

        header("location:category.php");

    }

}
