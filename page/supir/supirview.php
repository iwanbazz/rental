<section class="content-header">
    <h1>Supir</h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a>Supir</a></li>
    </ol>
</section>
<?php 

    $get = mysqli_query($conn, "SELECT * FROM tbl_supir 
                                JOIN tbl_mobil ON tbl_supir.id_mobil=tbl_mobil.id_mobil
                                WHERE tbl_supir.id_supir='$_GET[id]'");
    $row = mysqli_fetch_array($get);

?>
<section class="content container-fluid">
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-success">
                <div class="box-header with-border">
                    <button class="btn btn-success"><i class="fa fa-user"></i> <?= $row['id_supir'] ?></button>
                </div>

                <div class="box-body">
                    <div class="row">
                        <div class="col-md-3">  
                            <div class="form-group">
                            <?php 
                                if (!empty($row['foto_supir'])){
                                    $dest = "images/supir/".$row['foto_supir'];
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
                                    <p><?= $row['nama_supir'] ?></p>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>NIK</label>
                                <div class="callout callout-success">
                                    <p><?= $row['nik_supir'] ?></p>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>No HP</label>
                                <div class="callout callout-success">
                                    <p><?= $row['nohp_supir'] ?></p>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <div class="callout callout-success">
                                    <p><?= $row['email_supir'] ?></p>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <div class="callout callout-success">
                                    <p><?= $row['password_supir'] ?></p>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Alamat</label>
                                <div class="callout callout-success">
                                    <p><?= $row['alamat_supir'] ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">  
                            <div class="form-group">
                            <?php 
                                if (!empty($row['foto_mobil'])){
                                    $dest = "images/mobil/".$row['foto_mobil'];
                                } else {
                                    $dest = "images/no-car.png";
                                }
                            ?>
                                <img src="<?= $dest ?>" width="200">
                            </div>
                        </div>
                        <div class="col-md-9">
                            <div class="form-group">
                                <label>Tipe Mobil</label>
                                <div class="callout callout-success">
                                    <p><?= $row['tipe_mobil'] ?></p>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>No Polisi</label>
                                <div class="callout callout-success">
                                    <p><?= $row['no_polisi'] ?></p>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Tahun Mobil</label>
                                <div class="callout callout-success">
                                    <p><?= $row['tahun'] ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="box-footer">
                    <a href="?page=supir" class="btn btn-danger"><i class="fa fa-chevron-circle-left"></i> Back</a>
                </div>
            </div>
        </div>
    </div>
</section>

