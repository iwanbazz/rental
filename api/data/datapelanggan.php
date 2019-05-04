<?php 
    
    include("../../lib/koneksi.php");
    if ($_GET['id'])
    {
        $id = $_GET['id'];
        
        $ceklogin1 = mysqli_query($conn, "SELECT * FROM tbl_pelanggan WHERE id_pelanggan='$id'");
        $hit1 = mysqli_num_rows($ceklogin1);
        if ($hit1 > 0) {
            while($data=mysqli_fetch_array($ceklogin1))
                $datas [] = [
                    'typeActor'            => 'pelanggan',
                    'idPelanggan'          => $data['id_pelanggan'],
                    'nikPelanggan'         => $data['nik_pelanggan'],
                    'namaPelanggan'        => $data['nama_pelanggan'],
                    'nohpPelanggan'        => $data['nohp_pelanggan'],
                    'emailPelanggan'       => $data['email_pelanggan'],
                    'passwordPelanggan'    => $data['password_pelanggan'],
                    'alamatPelanggan'      => $data['alamat_pelanggan'],
                    'fotoPelanggan'        => (!empty($data['foto_pelanggan'])) ? "http://rentalpku.herokuapp.com/images/pelanggan/".$data['foto_pelanggan'] : "http://rentalpku.herokuapp.com/images/no-photo.png",
                ];
            $allData = array('status'=> 200,'message'=>'success','dataFormPelanggan'=>$datas);
            $json = json_encode($allData, JSON_PRETTY_PRINT);
            echo $json;
        } else {
            $allData = array('status'=> 403,'message'=>'data not found','dataFormPelanggan'=>[]);
            $json = json_encode($allData, JSON_PRETTY_PRINT);
            echo $json;
        }
    }