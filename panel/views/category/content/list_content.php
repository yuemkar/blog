<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Kategoriler
			<small>Kategorileri Burada Listeli Görebilirsiniz..</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Anasayfa</a></li>
            <li class="active">Kategoriler</li>
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
                                <h3 class="box-title">Kategori Bilgileriniz</h3>
                                <a href="category.php?p=add" class="btn btn-primary btn-sm pull-right"><i class="fa fa-plus"></i> Ekle</a>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body table-responsive no-padding">
                                <table class="table table-hover">
                                    <thead>
                                    <th class="text-center">ID</th>
                                    <th class="text-center">Kategori Adı</th>
                                    <th class="text-center">isActive</th>
                                    <th class="text-center">isMenu</th>
                                    <th class="text-center">İşlemler</th>
                                    </thead>

                                    <tbody>

                                        <?php foreach ($categories as $category) { ?>

                                            <tr>
                                                <td width="50" class="text-center"><?php echo $category->id; ?></td>
                                                <td class="text-center"><?php echo $category->title; ?></td>
                                                <td width="100" class="text-center">
                                                    <span class="label label-<?php echo ($category->isActive) ? "success" : "danger"; ?>">
                                                        <?php echo ($category->isActive) ? "Aktif" : "Pasif"; ?>
                                                    </span>
                                                </td>
                                                <td width="100" class="text-center">
                                                    <span class="label label-<?php echo ($category->isMenu) ? "success" : "danger"; ?>">
                                                        <?php echo ($category->isMenu) ? "Aktif" : "Pasif"; ?>
                                                    </span>
                                                </td>

                                                <td class="text-center" width="150">
                                                    <a href="category.php?p=delete&id=<?php echo $category->id;?>" class="btn btn-danger btn-sm">Sil</a>
                                                    <a href="category.php?p=updatePage&id=<?php echo $category->id;?>" class="btn btn-warning btn-sm">Düzenle</a>
                                                </td>
                                            </tr>


                                        <?php } ?>


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
