<?php

if (isset($_GET['page'])) $page=$_GET['page'];
else $page="dashboard";

if ($page == "dashboard") include("page/dashboard.php");
elseif ($page == "logout") include("page/logout.php");

    // -------------------------- pelanggan --------------------------
    elseif ($page == "pelanggan")           include("page/pelanggan/pelanggan.php");
    elseif ($page == "pelangganadd")        include("page/pelanggan/pelangganadd.php");
    elseif ($page == "pelangganaddpro")     include("page/pelanggan/pelangganaddpro.php");
    elseif ($page == "pelangganedit")       include("page/pelanggan/pelangganedit.php");
    elseif ($page == "pelangganeditpro")    include("page/pelanggan/pelangganeditpro.php");
    elseif ($page == "pelangganview")       include("page/pelanggan/pelangganview.php");
    elseif ($page == "pelanggandelete")     include("page/pelanggan/pelanggandelete.php");

    // -------------------------- mobil --------------------------
    elseif ($page == "mobil")               include("page/mobil/mobil.php");
    elseif ($page == "mobiladd")            include("page/mobil/mobiladd.php");
    elseif ($page == "mobiladdpro")         include("page/mobil/mobiladdpro.php");
    elseif ($page == "mobiledit")           include("page/mobil/mobiledit.php");
    elseif ($page == "mobileditpro")        include("page/mobil/mobileditpro.php");
    elseif ($page == "mobilview")           include("page/mobil/mobilview.php");
    elseif ($page == "mobildelete")         include("page/mobil/mobildelete.php");

    // -------------------------- supir --------------------------
    elseif ($page == "supir")               include("page/supir/supir.php");
    elseif ($page == "supirview")           include("page/supir/supirview.php");
    elseif ($page == "supiradd")            include("page/supir/supiradd.php");
    elseif ($page == "supiraddpro")         include("page/supir/supiraddpro.php");
    elseif ($page == "supiredit")           include("page/supir/supiredit.php");
    elseif ($page == "supireditpro")        include("page/supir/supireditpro.php");
    elseif ($page == "supirdelete")         include("page/supir/supirdelete.php");

    // -------------------------- sewa --------------------------
    elseif ($page == "sewa")               include("page/sewa/sewa.php");
    elseif ($page == "sewaview")           include("page/sewa/sewaview.php");
    elseif ($page == "sewaadd")            include("page/sewa/sewaadd.php");


else echo"Konten tidak ada";

?>
