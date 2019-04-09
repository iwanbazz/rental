<?php 

    include("../../lib/koneksi.php");
    if ($_GET['nohp'] && $_GET['pass'])
    {
        $nohp = $_GET['nohp'];
        $pass = $_GET['pass'];
        
        $ceklogin1 = mysqli_query($conn, "SELECT * FROM tbl_pelanggan WHERE nohp_pelanggan='$nohp' AND password_pelanggan='$pass'");
        $hit1 = mysqli_num_rows($ceklogin1);
        if ($hit1 > 0) {
            while($data=mysqli_fetch_array($ceklogin1))
                $datas [] = [
                    'typeActor'            => 'pelanggan',
                    'id'          => $data['id_pelanggan'],
                ];
            $allData = array('status'=> 200,'message'=>'login success','dataForm'=>$datas);
            $json = json_encode($allData, JSON_PRETTY_PRINT);
            echo $json;
        } else {
            $ceklogin2 = mysqli_query($conn, "SELECT * FROM tbl_supir 
                                              JOIN tbl_mobil ON tbl_supir.id_mobil=tbl_mobil.id_mobil
                                              WHERE nohp_supir='$nohp' AND password_supir='$pass'");
            $hit2 = mysqli_num_rows($ceklogin2);
            
            if($hit2 > 0){
                while($data=mysqli_fetch_array($ceklogin2)){
                    $datas [] = [
                        'typeActor'        => 'supir',
                        'id'          => $data['id_supir'],
                        
                    ];
                }
                $allData = array('status'=> 200,'message'=>'login success','dataForm'=>$datas);
                $json = json_encode($allData, JSON_PRETTY_PRINT);
                echo $json;
            } else {
                $allData = array('status'=> 403,'message'=>'login failed');
                $json = json_encode($allData, JSON_PRETTY_PRINT);
                echo $json;
            }
        }
}
