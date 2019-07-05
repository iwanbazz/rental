<section class="sidebar">
  <div class="user-panel">
    <div class="pull-left image">
      <img src="images/admin.png">
    </div>
    <div class="pull-left info">
      <p>ADMINISTRATOR</p>
      <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
    </div>
  </div>
<!-- Sidebar Menu -->
  <ul class="sidebar-menu" data-widget="tree">
    <li class="header">MENU</li>
    <li class="<?php if ($_GET['page'] == 'dashboard'){ echo "active";} ?>">
      <a href="?page=dashboard">
        <i class="fa fa-dashboard"></i> <span>Dashboard</span>
      </a>
    </li>
    <li class="<?php if ($_GET['page'] == 'pelanggan' || $_GET['page'] == 'pelangganadd' || $_GET['page'] == 'pelangganaddpro' || $_GET['page'] == 'pelangganedit'
      || $_GET['page'] == 'pelangganeditpro' || $_GET['page'] == 'pelangganview' || $_GET['page'] == 'pelanggandelete'){ echo "active"; } ?>">
      <a href="?page=pelanggan">
        <i class="fa fa-users"></i><span>Pelanggan</span>
      </a>
    </li>
    <li class="<?php if ($_GET['page'] == 'supir' || $_GET['page'] == 'supiradd' || $_GET['page'] == 'supiraddpro' || $_GET['page'] == 'supiredit'
      || $_GET['page'] == 'supireditpro' || $_GET['page'] == 'supirview' || $_GET['page'] == 'supirdelete'){ echo "active"; } ?>">
      <a href="?page=supir">
        <i class="fa fa-male"></i> <span>Supir</span>
      </a>
    </li>
    <li class="<?php if ($_GET['page'] == 'mobil' || $_GET['page'] == 'mobiladd' || $_GET['page'] == 'mobiladdpro' || $_GET['page'] == 'mobiledit'
      || $_GET['page'] == 'mobileditpro' || $_GET['page'] == 'mobilview' || $_GET['page'] == 'mobildelete'){ echo "active"; } ?>">
      <a href="?page=mobil">
        <i class="fa fa-car"></i> <span>Mobil</span>
      </a>
    </li>
    <li class="header">PESANAN</li>
    <li class="<?php if ($_GET['page'] == 'sewa' || $_GET['page'] == 'sewaview'){ echo "active";} ?>">
      <a href="?page=sewa">
        <i class="fa fa-refresh"></i> <span>Sewa</span>
      </a>
    </li>
  </ul>
</section>