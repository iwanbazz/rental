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
                    <h3 class="box-title"><b>SUPIR</b> | Tambah</h3>
                </div>

                <div class="box-body">
                    <?php 
                        if (isset($_POST['submit'])){
                            
                            $id             = $_POST['idsupir'];
                            $nama           = $_POST['nama'];
                            $nik            = $_POST['nik'];
                            $nohp           = $_POST['nohp'];
                            $email          = $_POST['email'];
                            $password       = $_POST['password'];
                            $alamat         = addslashes($_POST['alamat']);
                            $tipemobil      = $_POST['tipemobil'];
                            $nopol          = $_POST['nopolisi'];
                            $tahunmobil     = $_POST['tahunmobil'];

                            $nama_img       = $_FILES['foto']['name'];
                            $loc_img        = $_FILES['foto']['tmp_name'];
                            $type_img       = $_FILES['foto']['type'];
                            
                            $cek            = array('png','jpg','jpeg','gif');
                            $x              = explode('.',$nama_img);
                            $extension      = strtolower(end($x));

                            if (!empty($nama_img)) {
                                if (in_array($extension,$cek) === TRUE){
                                    $newfilename = $id.".".$extension;
                                    move_uploaded_file($loc_img,"images/supir/$newfilename");

                                    $input = mysqli_query($conn,"INSERT INTO tbl_supir SET
                                            id_supir        = '$id',
                                            nik_supir       = '$nik',
                                            nama_supir      = '$nama',
                                            nohp_supir      = '$nohp',
                                            email_supir     = '$email',
                                            password_supir  = '$password',
                                            alamat_supir    = '$alamat',
                                            foto_supir      = '$newfilename',
                                            id_mobil        = '$tipemobil',
                                            no_polisi       = '$nopol',
                                            tahun           = '$tahunmobil'
                                            ") or die (mysqli_error($conn));

                                    if ($input){
                                        echo    '<div class="row"><div class="col-md-12"><div class="alert alert-success alert-dismissible">'.
                                                '<h4><i class="icon fa fa-check"></i> Alert!</h4>'.
                                                'Tambah data berhasil'.
                                                '</div></div></div>';
                                        echo "<meta http-equiv='refresh' content='1;
                                        url=?page=supir'>";
                                    }
                                } else {
                                    echo    '<div class="row"><div class="col-md-12"><div class="alert alert-danger alert-dismissible">'.
                                                '<h4><i class="icon fa fa-check"></i> Alert!</h4>'.
                                                'Ekstensi tidak sesuai. Ekstensi gambar harus PNG, JPG, JPEG, GIF.'.
                                                '</div></div></div>';
                                    echo    '<div><a class="btn btn-info" href="?page=supiradd"><i class="fa fa-chevron-circle-left"></i> Isi ulang data</a></div>';
                                }
                            } else {
                                    $input = mysqli_query($conn,"INSERT INTO tbl_supir SET
                                            id_supir        = '$id',
                                            nik_supir       = '$nik',
                                            nama_supir      = '$nama',
                                            nohp_supir      = '$nohp',
                                            email_supir     = '$email',
                                            password_supir  = '$password',
                                            alamat_supir    = '$alamat',
                                            id_mobil        = '$tipemobil',
                                            no_polisi       = '$nopol',
                                            tahun           = '$tahunmobil'
                                            ") or die (mysqli_error($conn));

                                    if ($input){
                                        echo    '<div class="row"><div class="col-md-12"><div class="alert alert-success alert-dismissible">'.
                                                '<h4><i class="icon fa fa-check"></i> Alert!</h4>'.
                                                'Tambah data berhasil'.
                                                '</div></div></div>';
                                        echo "<meta http-equiv='refresh' content='1;
                                        url=?page=supir'>";
                                    }
                            }
                        }
                    ?>
                </div>
            </div>
        </div>
    </div>
</section>

