<section class="content-header">
    <h1>Pelanggan</h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a>Pelanggan</a></li>
    </ol>
</section>
<section class="content container-fluid">
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title"><b>PELANGGAN</b> | List</h3>
                    <div class="pull-right">
                        <a class="btn btn-success" href="?page=pelangganadd">
                            <span class="fa fa-plus-circle"></span> Tambah Data
                        </a>
                    </div>
                </div>

                <div class="box-body">
                    <div class="table-responsive">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                <th>NO</th>
                                <th>#</th>
                                <th>NIK</th>
                                <th>NAMA</th>
                                <th>NO HP</th>
                                <th>EMAIL</th>
                                <th>ALAMAT</th>
                                <th>AKSI</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                $no = 1;
                                $sql = mysqli_query($conn,"SELECT * FROM tbl_pelanggan") or die (mysqli_error($conn));
                                while($data = mysqli_fetch_array($sql)){ ?>
                                    <tr>    
                                        <td><?= $no ?></td>
                                        <td><a class="btn btn-success btn-xs"><i class="fa fa-user"></i> <?= $data['id_pelanggan'] ?></a></td>
                                        <td><?= $data['nik_pelanggan'] ?></td>
                                        <td><?= $data['nama_pelanggan'] ?></td>
                                        <td><?= $data['nohp_pelanggan'] ?></td>
                                        <td><?= $data['email_pelanggan'] ?></td>
                                        <td><?= $data['alamat_pelanggan'] ?></td>
                                        <td>
                                        <a class="btn btn-warning btn-xs" href="?page=pelangganview&id=<?php echo $data['id_pelanggan']; ?>"><i class="fa fa-eye"></i> Lihat</a>
                                            <a class="btn btn-primary btn-xs" href="?page=pelangganedit&id=<?php echo $data['id_pelanggan']; ?>"><i class="fa fa-edit"></i> Edit</a>
                                            <a class="btn btn-danger btn-xs" href="?page=pelanggandelete&id=<?php echo $data['id_pelanggan']; ?>&img=<?= (!empty($data['foto_pelanggan'])) ? $data['foto_pelanggan'] : "T"; ?>"><i class="fa fa-trash"></i> hapus</a>
                                        </td>
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