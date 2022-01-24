<?php

// Tek Kayıt Getir
function get_comment(){

    if(isset($_GET["id"])){

        $id = $_GET["id"];

        include "libraries/db.php";
        return $db->query("SELECT * FROM comments WHERE id=$id")->fetch(PDO::FETCH_OBJ);

    }

}

// Tüm kayıtları getir
function get_all_comments(){

    include "libraries/db.php";
    return $db->query("SELECT * FROM comments")->fetchAll(PDO::FETCH_OBJ);
}


// ekleme
function insert_comment(){


    include "libraries/db.php";


    $prepare = $db->prepare("INSERT INTO comments SET 
      name = :name,      
      email = :email,
      comment = :comment,
      createdAt = :createdAt,      
      post_id = :post_id");

    return $prepare->execute(
        array(
            "name"          => $_POST["name"],           
            "email"              => $_POST["email"],
            "comment"              => $_POST["comment"],
            "createdAt"           => $_POST["createdAt"],
            "post_id"            => $_POST["post_id"],    
            
        )
    );

}

// silme
function delete_comment(){

    include "libraries/db.php";
    $prepare = $db->prepare("DELETE FROM comments WHERE id=:id");

    return $prepare->execute(
        array(
            "id"    => $_GET["id"]
        )
    );

}

// duzenleme
function update_comment(){

    include "libraries/db.php";
  

       $prepare = $db->prepare("UPDATE comments SET
    name=:name,
    email=:email,
    comment=:comment,
    isActive=:isActive 
    WHERE id= :id");

       return $prepare->execute(
        array(
"name" => $_POST["name"],
"email" => $_POST["email"],
"comment" => $_POST["comment"],
"isActive" => $_POST["isActive"],
"id" => $_GET["id"],



       
)

        );


}