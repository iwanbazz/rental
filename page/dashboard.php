<?php 
  $pelanggan  = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM tbl_pelanggan"));
  $supir      = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM tbl_supir"));
  $mobil      = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM tbl_mobil"));  
  $sewa       = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM tbl_sewa")); 
?>
<section class="content-header">
  <h1>Dashboard</h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
  </ol>
</section>
<section class="content container-fluid">
  <div class="row">
    <div class="col-md-12">
      <div class="row">
        <div class="col-md-3">
          <div class="small-box bg-red">
            <div class="inner">
              <h3><?= $pelanggan ?></h3>
              <p>Pelanggan</p>
            </div>
            <div class="icon">
              <i class="fa fa-users"></i>
            </div>
            <a href="?page=pelanggan" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <div class="col-md-3">
          <div class="small-box bg-blue">
            <div class="inner">
              <h3><?= $supir ?></h3>
              <p>Supir</p>
            </div>
            <div class="icon">
              <i class="fa fa-male"></i>
            </div>
            <a href="?page=supir" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
      	<div class="col-md-3">
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3><?= $mobil ?></h3>
              <p>Mobil</p>
            </div>
            <div class="icon">
              <i class="fa fa-car"></i>
            </div>
            <a href="?page=mobil" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <div class="col-md-3">
          <div class="small-box bg-green">
            <div class="inner">
              <h3><?= $sewa ?></h3>
              <p>Sewa</p>
            </div>
            <div class="icon">
              <i class="fa fa-check-square-o"></i>
            </div>
            <a href="?page=sewa" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>