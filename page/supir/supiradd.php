<section class="content-header">
    <h1>Supir</h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a>Supir</a></li>
    </ol>
</section>
<?php 
    $get_id = mysqli_query($conn, "SELECT id_supir FROM tbl_supir WHERE SUBSTRING(id_supir,1,5)='SUPIR'") or die (mysqli_error($conn));
    $trim_id = mysqli_query($conn, "SELECT SUBSTRING(id_supir,-4,4) as hasil FROM tbl_supir WHERE SUBSTRING(id_supir,1,5)='SUPIR' ORDER BY hasil DESC LIMIT 1") or die (mysqli_error($conn));
    $hit    = mysqli_num_rows($get_id);
    if ($hit == 0){
        $id_k   = "SUPIR0001";
    } else if ($hit > 0){
        $row    = mysqli_fetch_array($trim_id);
        $kode   = $row['hasil']+1;
        $id_k   = "SUPIR".str_pad($kode,4,"0",STR_PAD_LEFT); 
    }    
?>
<section class="content container-fluid">
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title"><b>SUPIR</b> | Tambah</h3>
                </div>

                <div class="box-body">
                <form action="?page=supiraddpro" method="post" enctype="multipart/form-data">
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
                                        <input type="text" class="form-control" name="nama" placeholder="masukkan nama lengkap sesuai KTP ..." required>
                                        <input type="hidden" name="idsupir" value="<?= $id_k ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>NIK</label>
                                        <input type="text" class="form-control" name="nik" placeholder="masukkan NIK sesuai KTP ..." required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>No HP</label>
                                        <input type="text" class="form-control" name="nohp" placeholder="masukkan no hp ..." required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="email" class="form-control" name="email" placeholder="masukkan email ..." required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Password</label>
                                        <input type="text" class="form-control" name="password" placeholder="masukkan password ..." required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Alamat</label>
                                        <textarea class="form-control" name="alamat" rows="3" placeholder="masukkan alamat sesuai KTP ..." required></textarea>
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
                                            while ($row = mysqli_fetch_array($satuan)){
                                                echo "<option value=$row[id_mobil]>$row[tipe_mobil]</option> \n";
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>No Polisi</label>
                                        <input type="text" class="form-control" name="nopolisi" placeholder="masukkan no polisi mobil ..." required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Tahun Mobil</label>
                                        <input type="number" class="form-control" name="tahunmobil" placeholder="masukkan tahun mobil ..." required>
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

