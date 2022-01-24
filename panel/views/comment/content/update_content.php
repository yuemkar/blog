<!-- Content Wrapper. Contains page content -->

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Yorumlar
            <small>Yorum Bilgilerini Düzenleme ve Onaylama İşlemlerini Buradan Yapabilirsiniz..</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Anasayfa</a></li>
            <li class="active">Ayarlar</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Main row -->
        <div class="row">
            <section class="col-lg-12 ">

                <div class="box box-warning">
                    <div class="box-header with-border">
                        <h3 class="box-title">Yorum Bilgisini Düzenle</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <form role="form" method="post" action="comment.php?p=update&id=<?php echo $comment->id; ?>" enctype="multipart/form-data">
                            <!-- text input -->
                            
                            <div class="form-group">
                                <label>Üye Adı</label>
                                <input type="text" class="form-control" name="name" value="<?php echo $comment->name; ?>">
                            </div>

                            <div class="row">
                                <div class="col-xs-3 form-group">
                                    <label for="">E-posta</label>
                                    <input name="email" type="text" class="form-control" value="<?php echo $comment->email; ?>">
                                </div>    

                                <div class="form-group">
                                <label>Aktif / Pasif</label>
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="isActive" value="1" <?php echo ($comment->isActive) ? "checked" : "" ; ?>>
											Sitede Aktif Olsun
                                    </label>
                                </div>
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="isActive" value="0" <?php echo (!$comment->isActive) ? "checked" : "" ; ?>>
											Sitede Aktif Olmasın
                                    </label>
                                </div>
                            </div>     
                            </div>                     

                            

                            <div class="row">

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Yapılan Yorum</label>
                                        <textarea name="comment" class="textarea" placeholder="Place some text here"
                                                  style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?php echo $comment->comment; ?></textarea>
                                    </div>

                                </div>
                            </div>



                            
                            

                            <button type="submit" class="btn btn-success">Kaydet</button>
                            <a href="comment.php" class="btn btn-danger">İptal</a>

                        </form>
                    </div>
                </div>
                    <!-- /.box-body -->
                </div>

            </section>
        </div>
        <!-- /.row (main row) -->

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
