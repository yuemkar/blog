<?php

// Tek Kayıt Getir
function get_user(){

    if(isset($_POST["email"])){

        include "libraries/db.php";

        $prepare = $db->prepare("SELECT * FROM user WHERE email = :email AND password = :password");

        $prepare->execute(
            array(
                "email" => $_POST["email"],
                "password" => md5($_POST["password"]),
            )
        );

        return $prepare->fetch(PDO::FETCH_OBJ);

    }

}
