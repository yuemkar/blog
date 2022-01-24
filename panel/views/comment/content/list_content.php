<!-- Content Wrapper. Contains page content -->

<div class="content-wrapper">


    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Yorumlar
			<small>Yazılarınıza Yapılmış Yorumları Burada Listeli Görebilirsiniz..</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Anasayfa</a></li>
            <li class="active">Yorumlar</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Main row -->
        <div class="row">
            <section class="col-lg-12 ">

                <div class="row">
                    <div class="col-xs-12">
                        <div class="box">
                            <div class="box-header">
                                <h3 class="box-title">Yorum Listesi</h3>
                                
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body table-responsive no-padding">
                                <table class="table table-hover">
                                    <thead>
                                    <th class="text-center">ID</th>
                                    <th class="text-center">İsim Soyisim</th>                               
                                    <th class="text-center">E-posta</th>
                                    <th class="text-center">Yorum</th>
                                    <th class="text-center">Yazılma Tarihi</th>
                                    <th class="text-center">Postun İdsi</th>  
                                    <th class="text-center">isActive</th>
                                    <th class="text-center">İşlemler</th>                              
                                    </thead>

                                    <tbody>


                                        <?php foreach ($comments as $comment) { ?>

                                            <tr>
                                                <td class="text-center"><?php echo $comment->id; ?></td>
                                                <td class="text-center"><?php echo $comment->name; ?></td>       
                                                <td class="text-center"><?php echo $comment->email; ?></td>
                                                <td class="text-center"><?php echo $comment->comment; ?></td>
                                                <td class="text-center"><?php echo $comment->createdAt; ?></td>
                                                <td class="text-center"><?php echo $comment->post_id; ?></td>
                                                                                
                                                
                                                <td class="text-center">
                                                    <span class="label label-<?php echo ($comment->isActive) ? "success" : "danger"; ?>">
                                                        <?php echo ($comment->isActive) ? "Aktif" : "Pasif"; ?>
                                                    </span>
                                                </td>
                                                <td class="text-center" width="150">
                                                    <a href="comment.php?p=delete&id=<?php echo $comment->id;?>" class="btn btn-danger btn-sm">Sil</a>
                                                    <a href="comment.php?p=updatePage&id=<?php echo $comment->id;?>" class="btn btn-warning btn-sm">Düzenle</a>
                                                </td>
                                                <?php } ?>
                                            </tr>


                                        <?php  ?>


                                    </tbody>

                                </table>
                            </div>
                            <!-- /.box-body -->
                        </div>
                        <!-- /.box -->
                    </div>
                </div>

            </section>
        </div>
        <!-- /.row (main row) -->

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
