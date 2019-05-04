<?php 
    
    include("../../lib/koneksi.php");
    if ($_GET['id'])
    {
        $id = $_GET['id'];
        
        $cek = mysqli_query($conn, "SELECT * FROM tbl_supir 
                                  JOIN tbl_mobil ON tbl_supir.id_mobil=tbl_mobil.id_mobil
                                  WHERE id_supir='$id'");
        $hit = mysqli_num_rows($cek);
        
        if($hit > 0){
            while($data=mysqli_fetch_array($cek)){
                $datas [] = [
                    'typeActor'        => 'supir',
                    'idSupir'          => $data['id_supir'],
                    'nikSupir'         => $data['nik_supir'],
                    'namaSupir'        => $data['nama_supir'],
                    'nohpSupir'        => $data['nohp_supir'],
                    'emailSupir'       => $data['email_supir'],
                    'passwordSupir'    => $data['password_supir'],
                    'alamatSupir'      => $data['alamat_supir'],
                    'fotoSupir'        => (!empty($data['foto_supir'])) ? "http://rentalpku.herokuapp.com/images/supir/".$data['foto_supir'] : "http://rentalpku.herokuapp.com/images/no-photo.png",
                    'idMobil'          => $data['id_mobil'],
                    'tipeMobil'        => $data['tipe_mobil'],
                    'noPolisi'         => $data['no_polisi'],
                    'tahun'            => $data['tahun'],
                    'fotoMobil'        => (!empty($data['foto_mobil'])) ? "http://rentalpku.herokuapp.com/images/mobil/".$data['foto_mobil'] : "http://rentalpku.herokuapp.com/images/no-car.jpg",
                ];
            }
            $allData = array('status'=> 200,'message'=>'success','dataFormSupir'=>$datas);
            $json = json_encode($allData, JSON_PRETTY_PRINT);
            echo $json;
        } else {
            $allData = array('status'=> 403,'message'=>'data not found','dataFormSupir'=>[]);
            $json = json_encode($allData, JSON_PRETTY_PRINT);
            echo $json;
        }
    }