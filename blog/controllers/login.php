<?php

include "models/login_model.php";

function get_loginpage(){

    //$sidebar_posts      = get_all_sidebar_posts();
    //$settings           = get_settings();
    //$categories         = get_categories();
    //$menu_categories    = get_menu_categories();
	//session_start();
	$user=isset($_SESSION["user1"])? $_SESSION["user1"]:Null;
	
	if (isset($user)){
		header("location:/blog/");
		exit;
	}
    include "views/login/login.php";

}


function get_profilpage(){

    $sidebar_posts      = get_all_sidebar_posts();
    $settings           = get_settings();
    $categories         = get_categories();
    $menu_categories    = get_menu_categories();
	//session_start();
	
	$user=$_SESSION["user1"];
	// post varsa update islemi
	if (isset($_POST['fullname']) && isset($_POST['email'])){
		
		$fullname=trim($_POST['fullname']);
		$email=trim($_POST['email']);
		if ( isset($fullname) &&  isset($email)){
			if (is_object($user)){
				$data['full_name']=$fullname;
				$data['email']=$email;
				update_usernew($data,$user->id);
				//print_r($fullname);
				//print_r($email);
				$_SESSION["user1"]=get_usernew($user->id);
				$user=$_SESSION["user1"];
				//print_r($user);
			    $_SESSION["alert"] = array(
			            "title" => "Başarılı",
			            "text"  => "Profiliniz Güncellenmiştir.",
			            "type"  => "success"
				);				
			}
		}
		
	}
	
	if (isset($_POST['oldpass']) && isset($_POST['newpass'])){
		
		$oldpass=trim($_POST['oldpass']);
		$newpass=trim($_POST['newpass']);
		if ( isset($oldpass) &&  isset($newpass)){
			if (is_object($user)){
				
				$login=check_login($user->email,$oldpass);
				if (is_object($login)){
					update_userpass($newpass,$user->id);
					$_SESSION["alert"] = array(
			            "title" => "Başarılı",
			            "text"  => "Yeni Şifreniz Güncellenmiştir.",
			            "type"  => "success"
					);
				}else{
					$_SESSION["alert"] = array(
			            "title" => "Başarısız",
			            "text"  => "Eski Şifreniz Hatalı Girdiniz!!",
			            "type"  => "error"
					);
				}
				
				//print_r($fullname);
				//print_r($email);
				//print_r($user);
				
			}
		}
	}
	
	$fullname='';
	$email='';
	if (is_object($user)){
		$fullname=$user->full_name;
		$email=$user->email;
	}
    include "views/login/profile.php";

}

function get_logincheck(){
		$username=trim($_POST["username"]);
		$pass=trim($_POST["password"]);
        if(isset($username) && isset($pass) ){

            if($username != "" && $pass != ""){
            	
				$login=check_login($username,$pass);
                if( isset($login) && is_object($login) ){
					$_SESSION["user1"] = $login;
                    header("location:/blog/");
					exit;
                }else{
			    	$_SESSION["alert"] = array(
			            "title" => "Başarısız",
			            "text"  => "Kullanıcı Adı veya Şifre Yanlış",
			            "type"  => "success"
			        );
					header("location:/blog/login.php");
					exit;
				}


            }

        }


}


function get_loginregister(){
	
	if (isset($_POST['fullname']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['confirm-password'])){
		
		$fullname=trim($_POST['fullname']);
		$email=trim($_POST['email']);
		$password=trim($_POST['password']);
		$confirmpassword=trim($_POST['confirm-password']);
		
		if ( isset($fullname) &&  isset($email) &&  isset($password) &&  isset($confirmpassword)){
			if ($password==$confirmpassword){
				$val['full_name']=$fullname;
				$val['email']=$email;
				$val['password']=$password;
				insert_usernew($val);
				$_SESSION["alert"] = array(
			            "title" => "Başarılı",
			            "text"  => "Hesabınız onaylandıktan sonra giriş yapabilirsiniz.",
			            "type"  => "success"
			       );				
				header("location:/blog/");
				exit;
			}else{
					$_SESSION["alert"] = array(
			            "title" => "Başarısız",
			            "text"  => "Şifre Tekrarı Uyuşmuyor",
			            "type"  => "error"
			        );
					header("location:/blog/login.php");
					exit;
			}
		}else{
			include "views/login/login.php";	
		}
	}else{
		include "views/login/login.php";	
	}
	
	
}

function get_logout(){
	unset($_SESSION["user1"]);
	unset($_SESSION["user1"]);

	header("location:/blog/");
	exit;
}

function get_short_str($text, $len = 200){

    if(strlen(strip_tags($text)) > $len){

        return mb_substr(strip_tags($text), 0, $len) . "...";

    } else {

        return strip_tags($text);
    }

}
