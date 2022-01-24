<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Yazılar
            <small>Blog Yazılarınızı Buradan Düzenleyebilirsiniz</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Anasayfa</a></li>
            <li class="active">Yazılar</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Main row -->
        <div class="row">
            <section class="col-lg-12 ">

                <div class="box box-warning">
                    <div class="box-header with-border">
                        <h3 class="box-title">Blog Yazısını Düzenle</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <form role="form" method="post" action="post.php?p=update&id=<?php echo $post->id; ?>" enctype="multipart/form-data">


                            <div class="row">
                                <!-- text input -->
                                <div class="form-group col-md-6">
                                    <label>Yazı Başlığı</label>
                                    <input type="text" class="form-control" name="title" value="<?php echo $post->title; ?>">
                                </div>

                                <div class="form-group col-md-6">
                                    <label>Kategori Adı</label>
                                    <select name="category_id" class="form-control">
                                        <?php foreach ($categories as $category) { ?>
                                            <option <?php echo ($category->id == $post->category_id) ? "selected" : "" ; ?> value="<?php echo $category->id; ?>"><?php echo $category->title; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>

                            </div>

                            <div class="row">

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Yazı İçeriği</label>
                                        <textarea name="description" class="textarea" placeholder="Place some text here"
                                                  style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?php echo $post->description; ?> </textarea>
                                    </div>

                                </div>

                            </div>


                            <div class="row">

                                <div class="form-group col-md-6">
                                    <label>Yazı Türü</label>
                                    <select name="post_type" id="post_type" class="form-control">
                                    	<option <?php echo ($post->post_type == 10) ? "selected" : "" ; ?> value="10">Resimsiz Yazı</option>
                                        <option <?php echo ($post->post_type == 1) ? "selected" : "" ; ?> value="1">Resim Yazısı</option>
                                        <option <?php echo ($post->post_type == 2) ? "selected" : "" ; ?> value="2">Video Yazısı</option>
                                    </select>
                                </div>

                            </div>

                            <div class="row image-container <?php echo ($post->post_type == 1) ? "" : "hidden" ?>">

                                <div class="col-md-1 text-center">
                                    <img class="img-responsive" src="uploads/posts/<?php echo $post->img_url; ?>" alt="<?php echo $post->title; ?>">
                                </div>

                                <div class="col-md-10">
                                    <div class="form-group">
                                        <label>Resim</label>
                                        <input type="file" name="img_url">
                                    </div>
                                </div>

                            </div>

                            <div class="row">

                                <div class="form-group col-md-12 video-container <?php echo ($post->post_type == 2) ? "" : "hidden"; ?>">
                                    <label>Video URL</label>
                                    <input type="text" class="form-control" name="video_url" value="<?php echo $post->video_url; ?>">
                                </div>

                            </div>

							<?if ($_SESSION["user"]->sbox=='Admin'){?>
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label>Aktif / Pasif</label>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="isActive" value="1" <?php echo ($post->isActive) ? "checked" : ""; ?>>
											Sitede Aktif Olsun
                                        </label>
                                    </div>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="isActive" value="0" <?php echo (!$post->isActive) ? "checked" : ""; ?>>
											Sitede Aktif Olmasın
                                        </label>
                                    </div>
                                </div>
                            </div>
							<?}else{?>
							<input type="hidden" name="isActive" value="0">
							<?}?>
							
                            <button type="submit" class="btn btn-success">Kaydet</button>
                            <a href="post.php" class="btn btn-danger">İptal</a>

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
