<section class="content-header">
</section>
<section class="content container-fluid">
  <div class="row">
    <div class="col-md-12">
      <div class="alert alert-danger alert-dismissible">
        <h4><i class="icon fa fa-ban"></i> Alert!</h4>
        Logout Berhasil
      </div>
      <?php 
        session_destroy();
        echo	"<meta http-equiv='refresh' content='1;
        url=login.php'>";
      ?>
  	</div>
  </div>
</section>