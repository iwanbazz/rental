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
          <h3 class="box-title"><b>MOBIL</b> | Edit</h3>
        </div>
        <div class="box-body">
        <?php
          if (isset($_POST['submit'])){
            $id             = $_POST['idmobil'];
            $nama           = $_POST['tipemobil'];
            $imgold         = $_POST['oldimage'];
            $nama_img       = $_FILES['foto']['name'];
            $loc_img        = $_FILES['foto']['tmp_name'];
            $type_img       = $_FILES['foto']['type'];
            $cek            = array('png','jpg','jpeg','gif');
            $x              = explode('.',$nama_img);
            $extension      = strtolower(end($x));
            if (!empty($nama_img)) {
              if (in_array($extension,$cek) === TRUE){
                $newfilename = $id.".".$extension;
                if (!empty($imgold)){
                  unlink("images/mobil/$imgold");
                }
                move_uploaded_file($loc_img,"images/mobil/$newfilename");
                $input = mysqli_query($conn,"UPDATE tbl_mobil SET
                  tipe_mobil          = '$nama',
                  foto_mobil          = '$newfilename'
                  WHERE id_mobil      = '$id'
                  ") or die (mysqli_error($conn));
                if ($input){
                  echo  '<div class="row"><div class="col-md-12"><div class="alert alert-success alert-dismissible">'.
                        '<h4><i class="icon fa fa-check"></i> Alert!</h4>'.
                        'Edit data berhasil'.
                        '</div></div></div>';
                  echo "<meta http-equiv='refresh' content='1;
                  url=?page=mobil'>";
                }
              } else {
                echo  '<div class="row"><div class="col-md-12"><div class="alert alert-danger alert-dismissible">'.
                      '<h4><i class="icon fa fa-check"></i> Alert!</h4>'.
                      'Ekstensi tidak sesuai. Ekstensi gambar harus PNG, JPG, JPEG, GIF.'.
                      '</div></div></div>';
                echo  '<div><a class="btn btn-info" href="?page=mobiledit&id='.$id.'"><i class="fa fa-chevron-circle-left"></i> Isi ulang data</a></div>';
              }
            } else {
                $input = mysqli_query($conn,"UPDATE tbl_mobil SET
                  tipe_mobil          = '$nama'
                  WHERE id_mobil      = '$id'
                  ") or die (mysqli_error($conn));
                if ($input){
                  echo  '<div class="row"><div class="col-md-12"><div class="alert alert-success alert-dismissible">'.
                        '<h4><i class="icon fa fa-check"></i> Alert!</h4>'.
                        'Edit data berhasil'.
                        '</div></div></div>';
                  echo "<meta http-equiv='refresh' content='1;
                  url=?page=mobil'>";
                }
              }
            }
          ?>
        </div>
      </div>
    </div>
  </div>
</section>
