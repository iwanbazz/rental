<section class="content-header">
    <h1>Mobil</h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a>Mobil</a></li>
    </ol>
</section>
<?php 

    $get_id = mysqli_query($conn, "SELECT id_mobil FROM tbl_mobil WHERE SUBSTRING(id_mobil,1,5)='MOBIL'") or die (mysqli_error($conn));
    $trim_id = mysqli_query($conn, "SELECT SUBSTRING(id_mobil,-4,4) as hasil FROM tbl_mobil WHERE SUBSTRING(id_mobil,1,5)='MOBIL' ORDER BY hasil DESC LIMIT 1") or die (mysqli_error($conn));
    $hit    = mysqli_num_rows($get_id);
    if ($hit == 0){
        $id_k   = "MOBIL0001";
    } else if ($hit > 0){
        $row    = mysqli_fetch_array($trim_id);
        $kode   = $row['hasil']+1;
        $id_k   = "MOBIL".str_pad($kode,4,"0",STR_PAD_LEFT); 
    }  

?>
<section class="content container-fluid">
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title"><b>MOBIL</b> | Tambah</h3>
                </div>

                <div class="box-body">
                <form action="?page=mobiladdpro" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Tipe Mobil</label>
                                <input type="text" class="form-control" name="tipemobil" placeholder="masukkan tipe mobil ..." required>
                                <input type="hidden" name="idmobil" value="<?= $id_k ?>">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Upload Gambar</label>
                                <input type="file" class="form-control" name="foto">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="box-footer">
                    <input type="submit" name="submit" class="btn btn-success" value="Simpan">
                    <a href="?page=mobil" class="btn btn-danger">Kembali</a>
                </div>
                </form>
            </div>
        </div>
    </div>
</section>

