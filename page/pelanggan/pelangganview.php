<section class="content-header">
    <h1>Pelanggan</h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a>Pelanggan</a></li>
    </ol>
</section>
<?php 

    $get = mysqli_query($conn, "SELECT * FROM tbl_pelanggan WHERE id_pelanggan='$_GET[id]'");
    $row = mysqli_fetch_array($get);

?>
<section class="content container-fluid">
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-success">
                <div class="box-header with-border">
                    <button class="btn btn-success"><i class="fa fa-user"></i> <?= $row['id_pelanggan'] ?></button>
                </div>

                <div class="box-body">
                    <div class="row">
                        <div class="col-md-3">  
                            <div class="form-group">
                            <?php 
                                if (!empty($row['foto_pelanggan'])){
                                    $dest = "images/pelanggan/".$row['foto_pelanggan'];
                                } else {
                                    $dest = "images/no-photo.png";
                                }
                            ?>
                                <img src="<?= $dest ?>" width="200">
                            </div>
                        </div>
                        <div class="col-md-9">
                            <div class="form-group">
                                <label>Nama</label>
                                <div class="callout callout-success">
                                    <p><?= $row['nama_pelanggan'] ?></p>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>NIK</label>
                                <div class="callout callout-success">
                                    <p><?= $row['nik_pelanggan'] ?></p>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>No HP</label>
                                <div class="callout callout-success">
                                    <p><?= $row['nohp_pelanggan'] ?></p>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <div class="callout callout-success">
                                    <p><?= $row['email_pelanggan'] ?></p>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <div class="callout callout-success">
                                    <p><?= $row['password_pelanggan'] ?></p>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Alamat</label>
                                <div class="callout callout-success">
                                    <p><?= $row['alamat_pelanggan'] ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="box-footer">
                    <a href="?page=pelanggan" class="btn btn-danger"><i class="fa fa-chevron-circle-left"></i> Back</a>
                </div>
            </div>
        </div>
    </div>
</section>

