<header id="header">
    <div class="logo" data-bg-image="assets/images/bg-header.jpg">
        <h1>
            <a href="index.php">FalBlog</a>
        </h1>
        <p> Falın Alfabesi</p>
    </div>
    <div class="menu-container">
        <div class="container">
            <div class="row">
                <div class="col-md-7">
                    <nav class="main-nav">
                        <ul>
                            <li class=" current-menu-item menu-item-has-children">
                                <a href="index.php">Anasayfa</a>
                            </li>

                            <?php foreach ($menu_categories as $category) { ?>
                                <li><a href="category.php?id=<?php echo $category->id; ?>"><?php echo $category->title; ?></a></li>
                            <?php } ?>

                            <li><a href="about.php">Hakkımda</a></li>
                            <li><a href="contact.php">İletişim</a></li>
                        </ul>
                        <a href="javascript:;" id="close-menu"> <i class="fa fa-close"></i></a>
                    </nav>
                </div>
                <div class=" col-md-5 h-search">
<!--                    <form class="search_form">-->
<!--                        <input type="text" name="2" placeholder="Search and hit enter...">-->
<!--                        <button type="submit"><i class="fa fa-search"></i></button>-->
<!--                    </form>-->
<?php
if (isset($_SESSION['user1'])) {
$user=$_SESSION['user1'];
$name=trim($user->full_name);
if (!isset($user->full_name) ){
	$name=$user->email;
}
?>
                    <nav class="main-nav">
                        <ul>
					        <li class="dropdown">
					          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?=$name;?> <span class="caret"></span></a>
					          <ul class="dropdown-menu">
					            <li><a href="/blog/login.php?p=profile">Hesabım</a></li>
					            <li role="separator" class="divider"></li>
					            <li><a href="/blog/login.php?p=logout">Çıkış</a></li>
					          </ul>
					        </li>
					        </ul>
					      </nav>
<?}else{?> <nav class="main-nav">
                        <ul>
                            <li class=" current-menu-item menu-item-has-children">
                                <a href="/blog/login.php">Üye Giriş</a>
                            </li>
                            </ul>
                    </nav>
<?}?>                    
                    
                </div>
            </div>
        </div>
    </div>
</header>