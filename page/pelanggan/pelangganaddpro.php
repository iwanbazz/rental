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
          <h3 class="box-title"><b>PELANGGAN</b> | Tambah</h3>
        </div>
        <div class="box-body">
            <?php 
              if (isset($_POST['submit'])){
                $id             = $_POST['idpelanggan'];
                $nama           = $_POST['nama'];
                $nik            = $_POST['nik'];
                $nohp           = $_POST['nohp'];
                $email          = $_POST['email'];
                $password       = $_POST['password'];
                $alamat         = addslashes($_POST['alamat']);            
                $nama_img       = $_FILES['foto']['name'];
                $loc_img        = $_FILES['foto']['tmp_name'];
                $type_img       = $_FILES['foto']['type'];
                $cek            = array('png','jpg','jpeg','gif');
                $x              = explode('.',$nama_img);
                $extension      = strtolower(end($x));
                if (!empty($nama_img)) {
                  if (in_array($extension,$cek) === TRUE){
                    $newfilename = $id.".".$extension;
                    move_uploaded_file($loc_img,"images/pelanggan/$newfilename");
                    $input = mysqli_query($conn,"INSERT INTO tbl_pelanggan SET
                      id_pelanggan        = '$id',
                      nik_pelanggan       = '$nik',
                      nama_pelanggan      = '$nama',
                      nohp_pelanggan      = '$nohp',
                      email_pelanggan     = '$email',
                      password_pelanggan  = '$password',
                      alamat_pelanggan    = '$alamat',
                      foto_pelanggan      = '$newfilename'
                      ") or die (mysqli_error($conn));
                    if ($input){
                      echo  '<div class="row"><div class="col-md-12"><div class="alert alert-success alert-dismissible">'.
                            '<h4><i class="icon fa fa-check"></i> Alert!</h4>'.
                            'Tambah data berhasil'.
                            '</div></div></div>';
                      echo "<meta http-equiv='refresh' content='1;
                      url=?page=pelanggan'>";
                    }
                  } else {
                    echo  '<div class="row"><div class="col-md-12"><div class="alert alert-danger alert-dismissible">'.
                          '<h4><i class="icon fa fa-check"></i> Alert!</h4>'.
                          'Ekstensi tidak sesuai. Ekstensi gambar harus PNG, JPG, JPEG, GIF.'.
                          '</div></div></div>';
                    echo	'<div><a class="btn btn-info" href="?page=pelangganadd"><i class="fa fa-chevron-circle-left"></i> Isi ulang data</a></div>';
                  }
                } else {
                  $input = mysqli_query($conn,"INSERT INTO tbl_pelanggan SET
                    id_pelanggan        = '$id',
                    nik_pelanggan       = '$nik',
                    nama_pelanggan      = '$nama',
                    nohp_pelanggan      = '$nohp',
                    email_pelanggan     = '$email',
                    password_pelanggan  = '$password',
                    alamat_pelanggan    = '$alamat'
                    ") or die (mysqli_error($conn));
                  if ($input){
                    echo  '<div class="row"><div class="col-md-12"><div class="alert alert-success alert-dismissible">'.
                          '<h4><i class="icon fa fa-check"></i> Alert!</h4>'.
                          'Tambah data berhasil'.
                          '</div></div></div>';
                    echo "<meta http-equiv='refresh' content='1;
                    url=?page=pelanggan'>";
        				}
              }
            }
          ?>
        </div>
    	</div>
  	</div>
  </div>
</section>