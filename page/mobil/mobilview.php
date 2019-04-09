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
                    <button class="btn btn-success"><i class="fa fa-car"></i> <?= $row['id_mobil'] ?></button>
                </div>

                <div class="box-body">
                    <div class="row">
                        <div class="col-md-3">  
                            <div class="form-group">
                            <?php 
                                if (!empty($row['foto_mobil'])){
                                    $dest = "images/mobil/".$row['foto_mobil'];
                                } else {
                                    $dest = "images/no-car.jpg";
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
                        </div>
                    </div>
                </div>
                <div class="box-footer">
                    <a href="?page=mobil" class="btn btn-danger"><i class="fa fa-chevron-circle-left"></i> Back</a>
                </div>
            </div>
        </div>
    </div>
</section>

