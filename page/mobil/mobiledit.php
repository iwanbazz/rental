<section class="content-header">
    <h1>Mobil</h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a>Mobil</a></li>
    </ol>
</section>
<?php 
     $get = mysqli_query($conn, "SELECT * FROM tbl_mobil WHERE id_mobil='$_GET[id]'");
     $row = mysqli_fetch_array($get);
?>
<section class="content container-fluid">
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title"><b>MOBIL</b> | Edit</h3>
                </div>

                <div class="box-body">
                <form action="?page=mobileditpro" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Tipe Mobil</label>
                                <input type="text" class="form-control" name="tipemobil" placeholder="masukkan tipe mobil ..." value="<?= $row['tipe_mobil'] ?>" required>
                                <input type="hidden" name="idmobil" value="<?= $row['id_mobil'] ?>">
                                <input type="hidden" name="oldimage" value="<?= $row['id_mobil'] ?>">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Upload Gambar</label>
                                <input type="file" class="form-control" name="foto">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="box-footer">
                    <input type="submit" name="submit" class="btn btn-success" value="Simpan">
                    <a href="?page=mobil" class="btn btn-danger">Kembali</a>
                </div>
                </form>
            </div>
        </div>
    </div>
</section>

