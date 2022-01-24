<?php

// SQL İşlemlerinin yapıldığı Model dosyasının yüklenmesi
include "models/post_model.php";

function get_add_page(){

    $categories = get_categories();

    include "views/post/add.php";
}

function get_list_page(){

    $posts = get_all_posts();

    include "views/post/list.php";
}

function get_update_page(){

    $post = get_post();
    $categories = get_categories();

    include "views/post/update.php";

}

function get_category_title($id){

    $category = get_category($id);

    return $category->title;

}


function save(){


    $post_type = $_POST["post_type"];

    if($post_type == 1) {

        $file = $_FILES["img_url"];

        if($file["name"] !== ""){

            $upload = move_uploaded_file($file["tmp_name"], "uploads/posts/" . $file["name"]);

            if($upload){

                $insert = insert_post($file["name"]);

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

            header("Location:post.php");

        } else {

            $_SESSION["alert"] = array(
                "title" => "Başarısız",
                "text"  => "Lütfen görsel seçimi yapınız",
                "type"  => "error"
            );

            header("Location:post.php");

        }


    } else if($post_type == 2 || $post_type == 10) {


        $insert = insert_post();

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

        header("Location:post.php");

    }


}

function update(){

    $post_type = $_POST["post_type"];

    if($post_type == 1) {

        $file = $_FILES["img_url"];

        if($file["name"] !== ""){

            $upload = move_uploaded_file($file["tmp_name"], "uploads/posts/" . $file["name"]);

            if($upload){

                $update = update_post($file["name"]);

                if($update){

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

                header("Location:post.php");

            } else {

                $_SESSION["alert"] = array(
                    "title" => "Başarısız",
                    "text"  => "Dosya yüklenirken bir hata oluştu...",
                    "type"  => "error"
                );

                header("Location:post.php");
            }

        } else {


            $update = update_post();

            if($update){

                $_SESSION["alert"] = array(
                    "title" => "Başarılı",
                    "text"  => "İşlem başarılıdır",
                    "type"  => "success"
                );

            } else {


                $_SESSION["alert"] = array(
                    "title" => "Başarısız",
                    "text"  => "Dosya yüklenirken bir hata oluştu...",
                    "type"  => "error"
                );

            }

            header("Location:post.php");

        }


    } else if($post_type == 2 || $post_type == 10) {


        $update = update_post();

        if($update){


            $_SESSION["alert"] = array(
                "title" => "Başarılı",
                "text"  => "İşlem başarılıdır",
                "type"  => "success"
            );


        } else {

            $_SESSION["alert"] = array(
                "title" => "Başarısız",
                "text"  => "Dosya yüklenirken bir hata oluştu...",
                "type"  => "error"
            );

        }

        header("Location:post.php");

    }


}

function delete(){

    if(isset($_GET["id"])){

        $delete = delete_post();
       

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

        header("Location:post.php");

    }

}

function get_short_str($text, $len = 200){

    if(strlen(strip_tags($text)) > $len){

        return mb_substr(strip_tags($text), 0, $len) . "...";

    } else {

        return strip_tags($text);
    }

}
