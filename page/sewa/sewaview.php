<section class="content-header">
    <h1>Sewa <small>#<?= $_GET['id'] ?></small></h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a>Sewa</a></li>
    </ol>
</section>
<?php 

    $get = mysqli_query($conn, "SELECT * FROM tbl_sewa 
                                JOIN tbl_pelanggan ON tbl_sewa.id_pelanggan=tbl_pelanggan.id_pelanggan
                                JOIN tbl_supir ON tbl_sewa.id_supir=tbl_supir.id_supir
                                JOIN tbl_mobil ON tbl_supir.id_mobil=tbl_mobil.id_mobil
                                WHERE id_sewa='$_GET[id]'");
    $row = mysqli_fetch_array($get);

?>
<section class="invoice">
    <div class="row">
        <div class="col-xs-12">
            <h2 class="page-header">
                <i class="fa fa-car"></i> #<?= $row['id_sewa'] ?>
                <small class="pull-right"><i class="fa fa-calendar"></i> Tanggal Sewa : <b><?= $row['tanggal_mulai'] ?></b></small>
            </h2>
        </div>
    </div>
    <div class="row invoice-info">
        <div class="col-sm-4">
            <p class="text-muted well well-sm no-shadow">
                <i class="fa fa-user"></i> Pelanggan
            </p>
            <address>
                <strong><?= $row['nama_pelanggan'] ?></strong><br>
                <i class="fa fa-phone"></i> <?= $row['nohp_pelanggan'] ?><br>
                <i class="fa fa-envelope"></i> <?= $row['email_pelanggan'] ?><br>
                <i class="fa fa-map-marker"></i> <?= $row['alamat_pelanggan'] ?><br>
            </address>
        </div>
        <div class="col-sm-4 invoice-col">
            <p class="text-muted well well-sm no-shadow">
                <i class="fa fa-user"></i> Supir
            </p>
            <address>
                <strong><?= $row['nama_supir'] ?></strong><br>
                <i class="fa fa-phone"></i> <?= $row['nohp_supir'] ?><br>
                <i class="fa fa-envelope"></i> <?= $row['email_supir'] ?><br>
                <i class="fa fa-map-marker"></i> <?= $row['alamat_supir'] ?><br>
                <i class="fa fa-car"></i> <?= $row['tipe_mobil']." - ".$row['no_polisi']." - ".$row['tahun'] ?><br>
            </address>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12 table-responsive">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>No</th>
                    <th>Tanggal Mulai</th>
                    <th>Tanggal Selesai</th>
                    <th>Tanggal Kembalikan</th>
                    <th>Pakai Supir</th>
                    <th>Durasi</th>
                    <th>Biaya</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>1</td>
                    <td><?= $row['tanggal_mulai'] ?></td>
                    <td><?= $row['tanggal_selesai'] ?></td>
                    <td>
                    <?php 
                        if (!empty($row['tanggal_kembali'])) {
                            echo $row['tanggal_selesai'];
                        } elseif ($row['selesai']==0 && $row['denda']==0 && empty($row['tanggal_kembali'])) {
                            echo '<a class="btn btn-warning btn-xs"><i class="fa fa-refresh"></i> dalam orderan</a>';
                        }
                    ?>
                    <td>
                    <?php 
                        if ($row['supir']!=0) {
                            echo '<a class="btn btn-primary btn-xs"><i class="fa fa-check"></i> ya</a>';
                        } else {
                            echo '<a class="btn btn-danger btn-xs"><i class="fa fa-remove"></i> tidak</a>';
                        }
                    ?>
                    </td>
                    <td><?= $row['durasi_sewa'] ?> hari</td>
                    <td><?= buatrp($row['biaya']) ?></td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-6">
            <p class="lead">Metode Pembayaran :
            <p class="text-muted well well-sm no-shadow">
                <i class="fa fa-money"></i> Pembayaran Cash
            </p>
        </div>
        <div class="col-xs-6">
            <div class="table-responsive">
                <table class="table">
                    <tbody>
                        <tr>
                            <th style="width:50%">Biaya:</th>
                            <td><?= buatrp($row['biaya']) ?></td>
                        </tr>
                        <tr>
                            <th>Denda:</th>
                            <td>
                            <?php 
                                if ($row['selesai']==1 && $row['denda']!=0 && !empty($row['tanggal_kembali'])) {
                                    echo buatrp($row['denda']);
                                } elseif ($row['selesai']==0 && $row['denda']==0 && empty($row['tanggal_kembali'])) {
                                    echo '<a class="btn btn-warning btn-xs"><i class="fa fa-refresh"></i> dalam orderan</a>';
                                } elseif ($row['selesai']==1 && $row['denda']==0 && !empty($row['tanggal_kembali'])) {
                                    echo '<a class="btn btn-danger btn-xs"><i class="fa fa-remove"></i> tidak ada denda</a>';
                                }
                            ?>
                            </td>
                        </tr>
                        <tr>
                            <th>Total:</th>
                            <td>
                            <?php 
                                if ($row['selesai']==1 && $row['denda']!=0 && !empty($row['tanggal_kembali'])) {
                                    echo buatrp($row['biaya']+$row['denda']);
                                } elseif ($row['selesai']==0 && $row['denda']==0 && empty($row['tanggal_kembali'])) {
                                    echo '<a class="btn btn-warning btn-xs"><i class="fa fa-refresh"></i> dalam orderan</a>';
                                } elseif ($row['selesai']==1 && $row['denda']==0 && !empty($row['tanggal_kembali'])) {
                                    echo buatrp($row['biaya']+$row['denda']);
                                }
                            ?>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="row no-print">
        <div class="col-xs-12">
          <a href="?page=sewa" class="btn btn-danger"><i class="fa fa-chevron-circle-left"></i> Back</a>
          <?php 
          if ($row['selesai']!=0){
              echo '<button type="button" class="btn btn-success pull-right"><i class="fa fa-check-square"></i> Selesai';
          } else {
            echo '<button type="button" class="btn btn-warning pull-right"><i class="fa fa-refresh"></i> dalam orderan';
          }
          ?>
          </button>
        </div>
    </div>
</section>
<div class="clearfix"></div>