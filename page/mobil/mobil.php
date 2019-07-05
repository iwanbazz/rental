<section class="content-header">
  <h1>Mobil</h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
    <li><a>Mobil</a></li>
  </ol>
</section>
<section class="content container-fluid">
  <div class="row">
    <div class="col-xs-12">
      <div class="box box-success">
        <div class="box-header with-border">
          <h3 class="box-title"><b>MOBIL</b> | List</h3>
          <div class="pull-right">
            <a class="btn btn-success" href="?page=mobiladd">
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
                  <th>TIPE MOBIL</th>
                  <th>AKSI</th>
                </tr>
              </thead>
              <tbody>
              <?php
                $no = 1;
                $sql = mysqli_query($conn,"SELECT * FROM tbl_mobil") or die (mysqli_error($conn));
                while($data = mysqli_fetch_array($sql)){ ?>
                  <tr>
                    <td><?= $no ?></td>
                    <td><a class="btn btn-success btn-xs"><i class="fa fa-car"></i> <?= $data['id_mobil'] ?></a></td>
                    <td><?= $data['tipe_mobil'] ?></td>
                    <td>
                    <a class="btn btn-warning btn-xs" href="?page=mobilview&id=<?php echo $data['id_mobil']; ?>"><i class="fa fa-eye"></i> Lihat</a>
                      <a class="btn btn-primary btn-xs" href="?page=mobiledit&id=<?php echo $data['id_mobil']; ?>"><i class="fa fa-edit"></i> Edit</a>
                      <a class="btn btn-danger btn-xs" href="?page=mobildelete&id=<?php echo $data['id_mobil']; ?>&img=<?= (!empty($data['foto_mobil'])) ? $data['foto_mobil'] : "T"; ?>"><i class="fa fa-trash"></i> hapus</a>
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