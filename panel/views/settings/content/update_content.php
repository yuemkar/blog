<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Yazarlar
            <small>Seçili Yazarın Profilini Buradan Güncelleyebilirsiniz..</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Anasayfa</a></li>
            <li class="active">Yazarlar</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Main row -->
        <div class="row">
            <section class="col-lg-12 ">

                <div class="box box-warning">
                    <div class="box-header with-border">
                        <h3 class="box-title">Profil Bilgisini Düzenle</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <form role="form" method="post" action="settings.php?p=update&id=<?php echo $setting->id; ?>" enctype="multipart/form-data">
                            <!-- text input -->
                            <div class="form-group">
                                <label>Yazar Adı</label>
                                <input type="text" class="form-control" name="full_name" value="<?php echo $setting->full_name; ?>">
                            </div>

                            <div class="row">
                                <div class="col-xs-3 form-group">
                                    <label for="">E-posta</label>
                                    <input name="email" type="text" class="form-control" value="<?php echo $setting->email; ?>">
                                </div>
                                <div class="col-xs-3 form-group">
                                    <label for="">Telefon</label>
                                    <input name="phone" type="text" class="form-control" value="<?php echo $setting->phone; ?>">
                                </div>
                            </div>

                            <div class="row">

                                <div class="form-group col-md-6">
                                    <label>Yazı Türü</label>
                                    <select name="post_type" id="post_type" class="form-control">
                                        <option <?php echo ($setting->post_type == 10) ? "selected" : "" ; ?> value="10">Resimsiz Yazı</option>
                                        <option <?php echo ($setting->post_type == 1) ? "selected" : "" ; ?> value="1">Resim Yazısı</option>                                   
                                    </select>
                                </div>

                            </div>


                            <div class="row">

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Hakkımda</label>
                                        <textarea name="about_me" class="textarea" placeholder="Place some text here"
                                                  style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?php echo $setting->about_me; ?></textarea>
                                    </div>

                                </div>
                            </div>


                            <div class="row">
                                <div class="col-md-1 text-center">
                                    <img class="img-responsive" src="uploads/<?php echo $setting->profile_image_url; ?>" alt="">
                                </div>
                                <div class="col-md-10">
                                    <div class="form-group">
                                        <label>Profil Resmi</label>
                                        <input type="file" name="profile_image_url">
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label>Aktif / Pasif</label>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="isActive" value="1" <?php echo ($setting->isActive) ? "checked" : ""; ?>>
                                            Sitede Aktif Olsun
                                        </label>
                                    </div>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="isActive" value="0" <?php echo (!$setting->isActive) ? "checked" : ""; ?>>
                                            Sitede Aktif Olmasın
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-success">Kaydet</button>
                            <a href="settings.php" class="btn btn-danger">İptal</a>

                        </form>
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
