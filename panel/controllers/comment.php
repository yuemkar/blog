<?php

// SQL İşlemlerinin yapıldığı Model dosyasının yüklenmesi
include "models/comment_model.php";

function get_add_page(){
    include "views/comment/add.php";
}

function get_list_page(){

    $comments = get_all_comments();

    include "views/comment/list.php";
}

function get_update_page(){

    $comment = get_comment();

    include "views/comment/update.php";

}


function save(){


    $file = $_FILES["profile_image_url"];

    if($file["name"] !== ""){

        $upload = move_uploaded_file($file["tmp_name"], "uploads/" . $file["name"]);

        if($upload){

            $insert = insert_settings();

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

            header("Location:settings.php");


        } else {

            $_SESSION["alert"] = array(
                "title" => "Başarısız",
                "text"  => "İşlem başarısızdır",
                "type"  => "success"
            );

            header("Location:settings.php");

        }

    }


}

function update(){

   

            $update = update_comment();

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

            header("Location:comment.php");

        

        header("Location:comment.php");

    }




function delete(){

    if(isset($_GET["id"])){

        $delete = delete_comment();

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

        header("Location:comment.php");

    }

}