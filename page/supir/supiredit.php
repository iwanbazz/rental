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
                    <h3 class="box-title"><b>SUPIR</b> | Edit</h3>
                </div>

                <div class="box-body">
                <form action="?page=supireditpro" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="callout callout-success">
                                        <p>DATA DIRI SUPIR</p>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Nama</label>
                                        <input type="text" class="form-control" name="nama" placeholder="masukkan nama lengkap sesuai KTP ..." value="<?= $row['nama_supir'] ?>" required>
                                        <input type="hidden" name="idsupir" value="<?= $row['id_supir'] ?>">
                                        <input type="hidden" name="fotolama" value="<?= $row['foto_supir'] ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>NIK</label>
                                        <input type="text" class="form-control" name="nik" placeholder="masukkan NIK sesuai KTP ..." value="<?= $row['nik_supir'] ?>" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>No HP</label>
                                        <input type="text" class="form-control" name="nohp" placeholder="masukkan no hp ..." value="<?= $row['nohp_supir'] ?>" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="email" class="form-control" name="email" placeholder="masukkan email ..." value="<?= $row['email_supir'] ?>" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Password</label>
                                        <input type="text" class="form-control" name="password" placeholder="masukkan password ..." value="<?= $row['password_supir'] ?>" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Alamat</label>
                                        <textarea class="form-control" name="alamat" rows="3" placeholder="masukkan alamat sesuai KTP ..." required><?= $row['alamat_supir'] ?></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Upload Foto</label>
                                        <input type="file" class="form-control" name="foto">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="callout callout-success">
                                        <p>DATA MOBIL</p>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Tipe Mobil</label>
                                        <select class="form-control" name="tipemobil">
                                            <option value="" style="display:none;">-- pilih salah satu --</option>
                                            <?php
                                            $satuan = mysqli_query($conn, "SELECT * FROM tbl_mobil");
                                            while ($data = mysqli_fetch_array($satuan)){ ?>
                                                <option value="<?= $data['id_mobil']?>" <?php if ($row['id_mobil'] == $data['id_mobil']){echo "selected";} ?>><?= $data['tipe_mobil'] ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>No Polisi</label>
                                        <input type="text" class="form-control" name="nopolisi" placeholder="masukkan no polisi mobil ..." value="<?= $row['no_polisi'] ?>" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Tahun Mobil</label>
                                        <input type="number" class="form-control" name="tahunmobil" placeholder="masukkan tahun mobil ..." value="<?= $row['tahun'] ?>" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="box-footer">
                    <input type="submit" name="submit" class="btn btn-success" value="Simpan">
                    <a href="?page=supir" class="btn btn-danger">Kembali</a>
                </div>
                </form>
            </div>
        </div>
    </div>
</section>

