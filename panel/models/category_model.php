<?php
//KAYITLARRRRRR
// Tek Kayıt Getir
function get_category(){

    if(isset($_GET["id"])){

        $id = $_GET["id"];

        include "libraries/db.php";
        return $db->query("SELECT * FROM category WHERE id=$id")->fetch(PDO::FETCH_OBJ);

    }

}

// Tüm kayıtları getir
function get_all_categories(){

    include "libraries/db.php";
    return $db->query("SELECT * FROM category")->fetchAll(PDO::FETCH_OBJ);
}

// ekleme
function insert_category(){


    include "libraries/db.php";

    $prepare = $db->prepare("INSERT INTO category SET 
      title = :title,
      isActive = :isActive,
      isMenu = :isMenu,
      createdAt = :createdAt");

    return $prepare->execute(
        array(
            "title"              => $_POST["title"],
            "isActive"           => $_POST["isActive"],
            "isMenu"           => $_POST["isMenu"],
            "createdAt"          => date("Y-m-d H:i:s")
        )
    );

}

// silme
function delete_category(){

    include "libraries/db.php";
    $prepare = $db->prepare("DELETE FROM category WHERE id=:id");

    return $prepare->execute(
        array(
            "id"    => $_GET["id"]
        )
    );

}


// duzenleme
function update_category(){

    include "libraries/db.php";

    $prepare = $db->prepare("UPDATE category SET 
      title = :title,
      isActive = :isActive ,
      isMenu = :isMenu WHERE id= :id");

    return $prepare->execute(
        array(
            "title"              => $_POST["title"],
            "isActive"           => $_POST["isActive"],
            "isMenu"           => $_POST["isMenu"],
            "id"                 => $_GET["id"],
        )
    );
}
