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
          <h3 class="box-title"><b>PELANGGAN</b> | Edit</h3>
        </div>
        <div class="box-body">
          <form action="?page=pelangganeditpro" method="post" enctype="multipart/form-data">
            <div class="row">
              <div class="col-md-4">
                <div class="form-group">
                  <label>Nama</label>
                  <input type="text" class="form-control" name="nama" placeholder="masukkan nama lengkap sesuai KTP ..." value="<?= $row['nama_pelanggan'] ?>" required>
                  <input type="hidden" name="idpelanggan" value="<?= $row['id_pelanggan'] ?>">
                  <input type="hidden" name="fotolama" value="<?= $row['foto_pelanggan'] ?>">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-4">
                <div class="form-group">
                  <label>NIK</label>
                  <input type="text" class="form-control" name="nik" placeholder="masukkan NIK sesuai KTP ..." value="<?= $row['nik_pelanggan'] ?>" required>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-4">
                <div class="form-group">
                  <label>No HP</label>
                  <input type="text" class="form-control" name="nohp" placeholder="masukkan no hp ..." value="<?= $row['nohp_pelanggan'] ?>" required>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-4">
                <div class="form-group">
                  <label>Email</label>
                  <input type="email" class="form-control" name="email" placeholder="masukkan email ..." value="<?= $row['email_pelanggan'] ?>" required>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-4">
                <div class="form-group">
                  <label>Password</label>
                  <input type="text" class="form-control" name="password" placeholder="masukkan password ..." value="<?= $row['password_pelanggan'] ?>" required>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-4">
                <div class="form-group">
                  <label>Alamat</label>
                  <textarea class="form-control" name="alamat" rows="3" placeholder="masukkan alamat sesuai KTP ..." required><?= $row['alamat_pelanggan'] ?></textarea>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-4">
                <div class="form-group">
                  <label>Upload Foto</label>
                  <input type="file" class="form-control" name="foto">
                </div>
              </div>
            </div>
          </div>
          <div class="box-footer">
            <input type="submit" name="submit" class="btn btn-success" value="Simpan">
            <a href="?page=pelanggan" class="btn btn-danger">Kembali</a>
          </div>
        </form>
      </div>
    </div>
  </div>
</section>