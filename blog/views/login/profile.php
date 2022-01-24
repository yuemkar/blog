<!doctype html>
<html lang="tr">
<head>
    <?php include "views/includes/head.php"; ?>
    
<link rel="stylesheet" type="text/css" href="assets/css/sweetalert2.min.css">

</head>
 
<body>

<?php include "views/includes/header.php"; ?>

<section class="section-content">
<div class="container">
<div class="well">
    <ul class="nav nav-tabs">
      <li class="active"><a href="#home" data-toggle="tab">Profile</a></li>
      <li><a href="#profile" data-toggle="tab">Password</a></li>
    </ul>
    <div id="myTabContent" class="tab-content">
      <div class="tab-pane active in" id="home">
		            <div class="row" style="margin-top:5px;">
		                <div class="col-md-12">
		                    <form id="tab1" action="/blog/login.php?p=profile" method="post">
                              <div class="form-group row">
                                <label for="fullname" class="col-4 col-form-label">Ad Soyad</label> 
                                <div class="col-8">
                                  <input id="fullname" name="fullname" placeholder="Ad Soyad" class="form-control here" type="text" required="required" value="<?=$fullname;?>">
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="email" class="col-4 col-form-label">E-posta Adresi</label> 
                                <div class="col-8">
                                  <input id="email" name="email" placeholder="E-posta Adresi" class="form-control here" required="required" type="text" value="<?=$email;?>">
                                </div>
                              </div>                              
                              <div class="form-group row">
                                <div class="offset-4 col-8">
                                  <button name="submit" type="submit" class="btn btn-primary">Güncelle</button>
                                </div>
                              </div>
                            </form>
		                </div>
		            </div>
      </div>
      <div class="tab-pane fade" id="profile">
		            <div class="row" style="margin-top:5px;">
		                <div class="col-md-12">
		                    <form id="tab2" action="/blog/login.php?p=profile" method="post">
                              <div class="form-group row">
                                <label for="oldpass" class="col-4 col-form-label">Eski Şifre</label> 
                                <div class="col-8">
                                  <input id="oldpass" name="oldpass" placeholder="Eski Şifre" class="form-control here" required="required" type="password">
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="newpass" class="col-4 col-form-label">Yeni şifre</label> 
                                <div class="col-8">
                                  <input id="newpass" name="newpass" placeholder="Yeni şifre" required="required" class="form-control here" type="password">
                                </div>
                              </div> 
                              <div class="form-group row">
                                <div class="offset-4 col-8">
                                  <button name="submit" type="submit" class="btn btn-primary">Güncelle</button>
                                </div>
                              </div>
                            </form>
		                </div>
		            </div>
      </div>
  </div>
</div>
</div>
</section>  
<?php include "views/includes/footer.php"; ?>
<?php include "views/includes/include_script.php";?>
<?php include "views/includes/alert.php";?>
    
<script src="assets/js/sweetalert2.min.js"></script>
<script type="text/javascript" src="assets/js/login.js"></script>
    
</body>
</html>
