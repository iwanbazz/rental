<a href="?page=dashboard" class="logo">
    <span class="logo-mini"><b>A</b>DM</span>
    <span class="logo-lg">
    <i class="fa fa-user-secret"></i> <b>ADMIN</b>
    </span>
</a>
<?php 
    function buatrp($angka) {
    $jadi="Rp. ".number_format($angka,0,',','.');
    return $jadi;
    }
?>
<nav class="navbar navbar-static-top" role="navigation">
    <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
    <span class="sr-only">Toggle navigation</span>
    </a>
    <!-- Navbar Right Menu -->
    <div class="navbar-custom-menu">
    <ul class="nav navbar-nav">
        <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <img src="images/admin.png" class="user-image" alt="User Image">
                <span>ADMINISTRATOR</span>
            </a>
            <ul class="dropdown-menu">
                <li class="user-header">
                    <img src="images/admin.png" class="img-circle" alt="User Image">
                    <p><b>ADMINISTRATOR</b></p>
                </li>
                <li class="user-footer">
                    <a href="?page=logout" class="btn btn-default btn-flat"><i class="fa fa-sign-out"></i> Logout</a>
                </li> 
            </ul>
        </li>
    </ul>
    </div>
</nav>