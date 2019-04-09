<?php

    include("../../lib/koneksi.php");

    if ($_GET['nik'] && $_GET['nama'] && $_GET['nohp'] && $_GET['email'] && $_GET['pass'] && $_GET['alamat']) {

        $nik = $_GET['nik'];
        $nama = $_GET['nama'];
        $nohp = $_GET['nohp'];
        $email = $_GET['email'];
        $pass = $_GET['pass'];
        $alamat = $_GET['alamat'];

        $cekemail = mysqli_query($conn, "SELECT * FROM tbl_pelanggan WHERE email_pelanggan='$email'") or die (mysqli_error($conn));
        $hitcekemail = mysqli_num_rows($cekemail);
        
        if ($hitcekemail < 1)
        {
            $get_id = mysqli_query($conn, "SELECT id_pelanggan FROM tbl_pelanggan WHERE SUBSTRING(id_pelanggan,1,9)='PELANGGAN'") or die (mysqli_error($conn));
            $trim_id = mysqli_query($conn, "SELECT SUBSTRING(id_pelanggan,-4,4) as hasil FROM tbl_pelanggan WHERE SUBSTRING(id_pelanggan,1,9)='PELANGGAN' ORDER BY hasil DESC LIMIT 1") or die (mysqli_error($conn));
            $hit    = mysqli_num_rows($get_id);
            if ($hit == 0){
                $id_k   = "PELANGGAN0001";
            } else if ($hit > 0){
                $row    = mysqli_fetch_array($trim_id);
                $kode   = $row['hasil']+1;
                $id_k   = "PELANGGAN".str_pad($kode,4,"0",STR_PAD_LEFT); 
            }

            $insert = mysqli_query($conn, "INSERT INTO tbl_pelanggan SET
                                        id_pelanggan        = '$id_k',
                                        nik_pelanggan       = '$nik',
                                        nama_pelanggan      = '$nama',
                                        nohp_pelanggan      = '$nohp',
                                        email_pelanggan     = '$email',
                                        password_pelanggan  = '$pass',
                                        alamat_pelanggan    = '$alamat'
                                        ") or die (mysqli_error($conn));
            if ($insert){
                $allData = array('status'=> 200,'message'=>'register success');
                $json = json_encode($allData, JSON_PRETTY_PRINT);
                echo $json;
            } else {
                $allData = array('status'=> 403,'message'=>'register failed');
                $json = json_encode($allData, JSON_PRETTY_PRINT);
                echo $json;
            }
        } else {
            $allData = array('status'=> 403,'message'=>'register failed, email already taken');
            $json = json_encode($allData, JSON_PRETTY_PRINT);
            echo $json;
        }

        
    }