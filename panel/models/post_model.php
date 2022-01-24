<?php

// Tek Kayıt Getir
function get_post(){

    if(isset($_GET["id"])){

        $id = $_GET["id"];

        include "libraries/db.php";
        return $db->query("SELECT * FROM post WHERE id=$id")->fetch(PDO::FETCH_OBJ);

    }

}

// Tüm kayıtları getir
function get_all_posts(){

    include "libraries/db.php";
    if ($_SESSION["user"]->sbox=='Admin'){
		return $db->query("SELECT * FROM post")->fetchAll(PDO::FETCH_OBJ);	
	}else{
		$userid=$_SESSION["user"]->id;
		return $db->query("SELECT * FROM post WHERE user_id=$userid")->fetchAll(PDO::FETCH_OBJ);	
	}
    
}

function get_category($id){
    include "libraries/db.php";
    return $db->query("SELECT * FROM category WHERE id = $id")->fetch(PDO::FETCH_OBJ);
}

function get_categories(){
    include "libraries/db.php";
    return $db->query("SELECT * FROM category WHERE isActive = 1")->fetchAll(PDO::FETCH_OBJ);
}

// ekleme
function insert_post($img_url = ""){

    include "libraries/db.php";

    $prepare = $db->prepare("INSERT INTO post SET 
      user_id = :user_id,
      title = :title,
      description = :description,
      post_type = :post_type,
      img_url = :img_url,
      video_url = :video_url,
      category_id = :category_id,
      isActive = :isActive,
      createdAt = :createdAt");

	$userid=$_SESSION["user"]->id;

    return $prepare->execute(
        array(
        	"user_id"		=> $userid,
            "title"          => $_POST["title"],
            "description"    => $_POST["description"],
            "post_type"      => $_POST["post_type"],
            "img_url"        => $img_url,
            "video_url"      => $_POST["video_url"],
            "category_id"    => $_POST["category_id"],
            "isActive"       => $_POST["isActive"],
            "createdAt"      => date("Y-m-d H:i:s")
        )
    );

}

// silme
function delete_post(){

    include "libraries/db.php";
    
    $yorumsil = $db->prepare("DELETE FROM comments where post_id = :id");
    $yorumsil->execute(array("id"=>$_GET["id"]));
$prepare = $db->prepare("DELETE FROM post WHERE id=:id");
    return $prepare->execute(
        array(
            "id"    => $_GET["id"]
           
        )
    );

}



// duzenleme
function update_post($img_url = ""){

    include "libraries/db.php";


    if($img_url != ""){

        $update_query = "UPDATE post SET 
                          title = :title,
                          description = :description,
                          post_type = :post_type,
                          img_url = :img_url,
                          video_url = :video_url,
                          category_id = :category_id,
                          isActive = :isActive WHERE id = :id";

        $data = array(
            "title"          => $_POST["title"],
            "description"    => $_POST["description"],
            "post_type"      => $_POST["post_type"],
            "img_url"        => $img_url,
            "video_url"      => $_POST["video_url"],
            "category_id"    => $_POST["category_id"],
            "isActive"       => $_POST["isActive"],
            "id"             => $_GET["id"]
        );

    } else {

        $update_query = "UPDATE post SET 
                          title = :title,
                          description = :description,
                          post_type = :post_type,
                          video_url = :video_url,
                          category_id = :category_id,
                          isActive = :isActive WHERE id = :id";

        $data = array(
            "title"          => $_POST["title"],
            "description"    => $_POST["description"],
            "post_type"      => $_POST["post_type"],
            "video_url"      => $_POST["video_url"],
            "category_id"    => $_POST["category_id"],
            "isActive"       => $_POST["isActive"],
            "id"             => $_GET["id"]
        );

    }

    $prepare = $db->prepare($update_query);

    return $prepare->execute($data);

}