<section class="content-header">
  <h1>Supir</h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
    <li><a>Supir</a></li>
  </ol>
</section>
<section class="content container-fluid">
  <div class="row">
    <div class="col-xs-12">
      <div class="box box-success">
      	<div class="box-header with-border">
      	  <h3 class="box-title"><b>SUPIR</b> | List</h3>
      	  <div class="pull-right">
      	    <a class="btn btn-success" href="?page=supiradd">
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
                <th>TIPE MOBIL</th>
                <th>NO POLISI</th>
                <th>TAHUN</th>
                <th>AKSI</th>
                </tr>
              </thead>
              <tbody>
                <?php
                	$no = 1;
                	$sql = mysqli_query($conn,"SELECT * FROM tbl_supir
                	  JOIN tbl_mobil ON tbl_supir.id_mobil=tbl_mobil.id_mobil") or die (mysqli_error($conn));
                	while($data = mysqli_fetch_array($sql)){ ?>
                <tr>    
                  <td><?= $no ?></td>
                  <td><a class="btn btn-success btn-xs"><i class="fa fa-male"></i> <?= $data['id_supir'] ?></a></td>
                  <td><?= $data['nik_supir'] ?></td>
                  <td><?= $data['nama_supir'] ?></td>
                  <td><?= $data['nohp_supir'] ?></td>
                  <td><?= $data['email_supir'] ?></td>
                  <td><?= $data['alamat_supir'] ?></td>
                  <td><?= $data['tipe_mobil'] ?></td>
                  <td><?= $data['no_polisi'] ?></td>
                  <td><?= $data['tahun'] ?></td>
                  <td>
                  	<a class="btn btn-warning btn-xs" href="?page=supirview&id=<?php echo $data['id_supir']; ?>"><i class="fa fa-eye"></i> Lihat</a>
                    <a class="btn btn-primary btn-xs" href="?page=supiredit&id=<?php echo $data['id_supir']; ?>"><i class="fa fa-edit"></i> Edit</a>
                    <a class="btn btn-danger btn-xs" href="?page=supirdelete&id=<?php echo $data['id_supir']; ?>&img=<?= (!empty($data['foto_supir'])) ? $data['foto_supir'] : "T"; ?>"><i class="fa fa-trash"></i> hapus</a>
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