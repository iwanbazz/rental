<section class="content-header">
    <h1>Sewa</h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a>Sewa</a></li>
    </ol>
</section>
<section class="content container-fluid">
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title"><b>SEWA</b> | List</h3>
                    
                </div>

                <div class="box-body">
                    <div class="table-responsive">
                        <table id="example1" class="table table-bordered table-striped">
                        <thead>
                                <tr>
                                <th>NO</th>
                                <th>#</th>
                                <th>PELANGGAN</th>
                                <th>SUPIR</th>
                                <th>ALAMAT PENGANTARAN</th>
                                <th>TANGGAL MULAI</th>
                                <th>TANGGAL SELESAI</th>
                                <th>TANGGAL KEMBALI</th>
                                <th>PAKAI SUPIR</th>
                                <th>DURASI</th>
                                <th>BIAYA</th>
                                <th>DENDA</th>
                                <th>TOTAL</th>
                                <th>PROSES</th>
                                <th>AKSI</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                $no = 1;
                                $sql = mysqli_query($conn,"SELECT * FROM tbl_sewa
                                                    JOIN tbl_supir ON tbl_sewa.id_supir=tbl_supir.id_supir
                                                    JOIN tbl_pelanggan ON tbl_sewa.id_pelanggan=tbl_pelanggan.id_pelanggan") or die (mysqli_error($conn));
                                while($data = mysqli_fetch_array($sql)){ ?>
                                    <tr>    
                                        <td><?= $no ?></td>
                                        <td><a class="btn btn-success btn-xs"><i class="fa fa-car"></i> <?= $data['id_sewa'] ?></a></td>
                                        <td><a class="btn btn-success btn-xs"><?= $data['id_pelanggan'] ?></a> <?= $data['nama_pelanggan'] ?></td>
                                        <td><a class="btn btn-success btn-xs"><?= $data['id_supir'] ?></a> <?= $data['nama_supir'] ?></td>
                                        <td><?= $data['alamat_pengantaran'] ?></td>
                                        <td><a class="btn btn-success btn-xs"><i class="fa fa-calendar"></i> <?= $data['tanggal_mulai'] ?></a></td>
                                        <td><a class="btn btn-success btn-xs"><i class="fa fa-calendar"></i> <?= $data['tanggal_selesai'] ?></a></td>
                                        <td>
                                        <?php 
                                            if (!empty($data['tanggal_kembali'])) {
                                                echo '<a class="btn btn-success btn-xs"><i class="fa fa-calendar"></i> '.$data['tanggal_kembali'].'</a>';
                                            } elseif ($data['selesai']==0 && $data['denda']==0 && empty($data['tanggal_kembali'])) {
                                                echo '<a class="btn btn-warning btn-xs"><i class="fa fa-refresh"></i> dalam orderan</a>';
                                            }
                                        ?>
                                        </td>
                                        <td>
                                        <?php 
                                            if ($data['supir']!=0) {
                                                echo '<a class="btn btn-primary btn-xs"><i class="fa fa-check"></i> ya</a>';
                                            } else {
                                                echo '<a class="btn btn-danger btn-xs"><i class="fa fa-remove"></i> tidak</a>';
                                            }
                                        ?>
                                        </td>
                                        <td><a class="btn btn-success btn-xs"><?= $data['durasi_sewa'] ?> hari</a></td>
                                        <td><a class="btn btn-success btn-xs"><?= buatrp($data['biaya']) ?></a></td>
                                        <td>
                                        <?php 
                                            if ($data['selesai']==1 && $data['denda']!=0 && !empty($data['tanggal_kembali'])) {
                                                echo '<a class="btn btn-success btn-xs">'.buatrp($data['denda']).'</a>';
                                            } elseif ($data['selesai']==0 && $data['denda']==0 && empty($data['tanggal_kembali'])) {
                                                echo '<a class="btn btn-warning btn-xs"><i class="fa fa-refresh"></i> dalam orderan</a>';
                                            } elseif ($data['selesai']==1 && $data['denda']==0 && !empty($data['tanggal_kembali'])) {
                                                echo '<a class="btn btn-danger btn-xs"><i class="fa fa-remove"></i> tidak ada denda</a>';
                                            }
                                        ?>
                                        </td>
                                        <td>
                                        <?php 
                                            if ($data['selesai']==1 && $data['denda']!=0 && !empty($data['tanggal_kembali'])) {
                                                echo '<a class="btn btn-success btn-xs">'.buatrp($data['biaya']+$data['denda']).'</a>';
                                            } elseif ($data['selesai']==0 && $data['denda']==0 && empty($data['tanggal_kembali'])) {
                                                echo '<a class="btn btn-warning btn-xs"><i class="fa fa-refresh"></i> dalam orderan</a>';
                                            } elseif ($data['selesai']==1 && $data['denda']==0 && !empty($data['tanggal_kembali'])) {
                                                echo '<a class="btn btn-success btn-xs">'.buatrp($data['biaya']+$data['denda']).'</a>';
                                            }
                                        ?>
                                        </td>
                                        <td>
                                        <?php 
                                            if ($data['selesai']!=0) {
                                                echo '<a class="btn btn-primary btn-xs"><i class="fa fa-check-square"></i> selesai</a>';
                                            } else {
                                                echo '<a class="btn btn-warning btn-xs"><i class="fa fa-refresh"></i> dalam orderan</a>';
                                            }
                                        ?>
                                        </td>
                                        <td><a class="btn btn-info btn-xs" href="?page=sewaview&id=<?= $data['id_sewa'] ?>"><i class="fa fa-eye"></i> lihat</a></td>
                                    </tr>
                                <?php $no++; } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>