<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="assets/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p><?php echo $_SESSION["user"]->full_name; ?></p>
                <a href="#"><i class="fa fa-circle text-success"></i> Aktif</a>
            </div>
        </div>
        <!-- search form -->
        
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
        	<?if ($_SESSION["user"]->sbox=='Admin'){?>
            <li>
                <a href="settings.php">
                    <i class="fa fa-cog"></i> <span>Yazarlar</span>
                </a>
            </li>
            <li>
                <a href="category.php">
                    <i class="fa fa-th"></i> <span>Kategoriler</span>
                </a>
            </li>
            <?}?>
             <?if ($_SESSION["user"]->sbox=='Admin' || $_SESSION["user"]->sbox=='Author'){?>
            <li>
                <a href="post.php">
                    <i class="fa fa-pencil-square-o"></i> <span>Yazılar</span>
                </a>
            </li>
            <?}?>
            <?if ($_SESSION["user"]->sbox=='Admin'){?>
 			<li>
            <a href="comment.php">
                    <i class="fa fa-pencil-square-o"></i> <span>Yorumlar</span>
                </a>
            </li> 
            <li>
                <a href="user.php">
                    <i class="fa fa-users"></i> <span>Kullanıcılar</span>
                </a>
            </li>
		  <?}?>

        </ul>
    </section>
    <!-- /.sidebar -->
</aside>