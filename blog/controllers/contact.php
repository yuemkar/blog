<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

include "models/contact_model.php";

function get_contactpage(){

    $sidebar_posts      = get_all_sidebar_posts();
    $settings           = get_settings();
    $categories         = get_categories();
    $menu_categories    = get_menu_categories();

    include "views/contact/contact.php";

}

function get_short_str($text, $len = 200){

    if(strlen(strip_tags($text)) > $len){

        return mb_substr(strip_tags($text), 0, $len) . "...";

    } else {

        return strip_tags($text);
    }
}

function send_message(){

    if(isset($_POST["email"])){

        require "vendor/autoload.php";

        $mail = new PHPMailer(true);

        try{

            // Server Ayarları...
//            $mail->SMTPDebug = 1;
            $mail->SMTPDebug = 2;
            $mail->isSMTP();
            $mail->Host = "ssl://smtp.gmail.com";
            $mail->SMTPAuth = true;
            $mail->Username = "";
            $mail->Password = "";
            $mail->SMTPSecure = "tls";
            $mail->Port = 465;

            // Alıcılar Ayaları
            $mail->setFrom("", "FalBlog");
            $mail->addAddress("yunusemrekar3453@gmail.com", "Yunus Emre Kar");

//            Ek ayarları
//            $mail->addAttachment();

            // Gonderi Ayarlari
            $mail->isHTML();
            $mail->Subject = $_POST["subject"];
            $mail->Body = $_POST["message"];

            if($mail->send()){

//                echo "Mail Gönderimi Başarılı...";
                header("location:index.php");

            } else {

//                echo "Mail Gönderimi Başarısız...";
                header("location:contact.php");

            }

        } catch(Exception $e){
            echo "Mesaj Gönderilemedi!!!";
            echo "Mail Hatası : " . $mail->ErrorInfo;
        }


    } else {
        header("location:contact.php");
    }

}
