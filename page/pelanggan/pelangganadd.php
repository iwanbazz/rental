<section class="content-header">
    <h1>Pelanggan</h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a>Pelanggan</a></li>
    </ol>
</section>
<?php 
    $get_id = mysqli_query($conn, "SELECT id_pelanggan FROM tbl_pelanggan WHERE SUBSTRING(id_pelanggan,1,9)='PELANGGAN'") or die (mysqli_error($conn));
    $trim_id = mysqli_query($conn, "SELECT SUBSTRING(id_pelanggan,-4,4) as hasil FROM tbl_pelanggan WHERE SUBSTRING(id_pelanggan,1,9)='PELANGGAN' ORDER BY hasil DESC LIMIT 1") or die (mysqli_error($conn));
    $hit    = mysqli_num_rows($get_id);
    if ($hit == 0){
        $id_k   = "PELANGGAN0001";
    } else if ($hit > 0){
        $row    = mysqli_fetch_array($trim_id);
        $kode   = $row['hasil']+1;
        $id_k   = "PELANGGAN".str_pad($kode,4,"0",STR_PAD_LEFT); 
    }    
?>
<section class="content container-fluid">
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title"><b>PELANGGAN</b> | Tambah</h3>
                </div>

                <div class="box-body">
                <form action="?page=pelangganaddpro" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Nama</label>
                                <input type="text" class="form-control" name="nama" placeholder="masukkan nama lengkap sesuai KTP ..." required>
                                <input type="hidden" name="idpelanggan" value="<?= $id_k ?>">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>NIK</label>
                                <input type="text" class="form-control" name="nik" placeholder="masukkan NIK sesuai KTP ..." required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>No HP</label>
                                <input type="text" class="form-control" name="nohp" placeholder="masukkan no hp ..." required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" class="form-control" name="email" placeholder="masukkan email ..." required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Password</label>
                                <input type="text" class="form-control" name="password" placeholder="masukkan password ..." required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Alamat</label>
                                <textarea class="form-control" name="alamat" rows="3" placeholder="masukkan alamat sesuai KTP ..." required></textarea>
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

