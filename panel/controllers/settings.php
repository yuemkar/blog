<?php

// SQL İşlemlerinin yapıldığı Model dosyasının yüklenmesi
include "models/settings_model.php";

function get_add_page(){
    include "views/settings/add.php";
}

function get_list_page(){

    $settings = get_all_settings();

    include "views/settings/list.php";
}

function get_update_page(){

    $setting = get_settings();

    include "views/settings/update.php";

}


function save(){


    $post_type = $_POST["post_type"];

      if($post_type == 1) {

   
$file = $_FILES["profile_image_url"];

 if($file["name"] !== ""){

    
        $upload = move_uploaded_file($file["tmp_name"], "uploads/" . $file["name"]);

        if($upload){

                $insert = insert_settings($file["name"]);

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

            } else {

                $_SESSION["alert"] = array(
                    "title" => "Başarısız",
                    "text"  => "Dosya yüklenirken bir hata oluştu...",
                    "type"  => "error"
                );

            }

            header("Location:settings.php");

        } else {

            $_SESSION["alert"] = array(
                "title" => "Başarısız",
                "text"  => "Lütfen görsel seçimi yapınız",
                "type"  => "error"
            );

            header("Location:settings.php");

        }


    } else if($post_type == 2 || $post_type == 10) {


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
                "text"  => "İşlem başarısız",
                "type"  => "error"
            );

        }

        header("Location:settings.php");

    }


}



function update(){

    // Resmin seçilip seçilmediğini kontrol et
        // Seçildiyse UPLOAD işlemini gerçekleştir..
        // Resmin Adını al
        // Seçilmediyse; tüm form bilgileriyle beraber resim adı olmadan guncelleme işlemini gerçekleştir...

    $file = $_FILES["profile_image_url"];

    // Resim Seçilmişse..
    if($file["name"]){

        $upload = move_uploaded_file($file["tmp_name"], "uploads/" . $file["name"]);

        if($upload){

            $update = update_settings($file["name"]);

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

            header("Location:settings.php");

        } else {

            $_SESSION["alert"] = array(
                "title" => "Başarısız",
                "text"  => "Dosya yüklenirken bir hata oluştu...",
                "type"  => "success"
            );

            header("Location:settings.php");
        }

        // Resim Seçilmemişse..
    } else {

        $update = update_settings();

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

        header("Location:settings.php");

    }


}

function delete(){

    if(isset($_GET["id"])){

        $delete = delete_settings();

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

        header("Location:settings.php");

    }

}