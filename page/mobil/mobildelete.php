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
          <h3 class="box-title"><b>Mobil</b> | Hapus</h3>
        </div>
          <div class="box-body">
            <div class="row">
              <div class="col-md-12">
                <div class="alert alert-danger alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <h4><i class="icon fa fa-check"></i> Alert!</h4>
                  <p>Anda yakin ingin menghapus data ini ?</p>
                  <form action="?page=mobildelete" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="idmobil" value="<?= $_GET['id'] ?>">
                    <input type="hidden" name="image" value="<?= $_GET['img'] ?>">
                    <input class="btn btn-info" type="submit" name="submit" value="Yes">
                    <a class="btn btn-info" href="?page=mobil"><i class="fa fa-chevron-circle-left"></i> Back</a>
                  </form>
                </div>
              </div>
            </div>
          <?php
            if(isset($_POST['submit'])){
              $id = $_POST['idmobil'];
              $img = $_POST['image'];
              unlink("images/mobil/$img");
              $delete = mysqli_query($conn,"DELETE FROM tbl_mobil WHERE id_mobil='$id'") or die (mysqli_error($conn));
              if ($delete){
                echo  '<div class="row">'.
                        '<div class="col-md-12">'.
                          '<div class="alert alert-success alert-dismissible">'.
                          '<h5><i class="icon fa fa-check"></i> Alert!</h5>'.
                          'Data berhasil dihapus.</div>'.
                        '</div>'.
                      '</div>';
                echo "<meta http-equiv='refresh' content='1;
                url=?page=mobil'>";
              }
            }
          ?>
        </div>
      </div>
    </div>
  </div>
</section>
