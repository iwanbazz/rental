<?php 

    include("../../lib/koneksi.php");

    $query = mysqli_query($conn, "SELECT tbl_supir.id_supir,tbl_supir.nik_supir,tbl_supir.nama_supir,tbl_supir.nohp_supir,tbl_supir.email_supir,tbl_supir.alamat_supir,tbl_supir.foto_supir,tbl_supir.id_mobil,tbl_supir.no_polisi,tbl_supir.tahun,tbl_mobil.tipe_mobil,tbl_mobil.foto_mobil, COUNT(tbl_sewa.id_supir) as jumlah
                                  FROM tbl_supir
                                  JOIN tbl_mobil ON tbl_supir.id_mobil=tbl_mobil.id_mobil
                                  LEFT JOIN tbl_sewa ON tbl_supir.id_supir=tbl_sewa.id_supir
                                  WHERE tbl_sewa.selesai <> 0 OR NOT EXISTS(SELECT tbl_sewa.id_supir FROM tbl_sewa WHERE tbl_sewa.id_supir=tbl_supir.id_supir)
                                  GROUP BY tbl_supir.id_supir
                                  ORDER BY jumlah ASC");
    while($data=mysqli_fetch_array($query)){
        $datas [] = [
            'idSupir'           => $data['id_supir'],
            'nikSupir'          => $data['nik_supir'],
            'namaSupir'         => $data['nama_supir'],
            'nohpSupir'         => $data['nohp_supir'],
            'emailSupir'        => $data['email_supir'],
            'alamatSupir'       => $data['alamat_supir'],
            'fotoSupir'         => $data['foto_supir'],
            'idMobil'           => $data['id_mobil'],
            'tipeMobil'         => $data['tipe_mobil'],
            'fotoMobil'         => (!empty($data['foto_mobil'])) ? "http://rentalpku.herokuapp.com/images/mobil/".$data['foto_mobil'] : "http://rentalpku.herokuapp.com/images/no-car.jpg",
            'noPolisi'          => $data['no_polisi'],
            'tahun'             => $data['tahun'],
        ];
    }
    $allData = array('status'=> 200,'message'=>'success','dataListBook'=>$datas);
    $json = json_encode($allData, JSON_PRETTY_PRINT);
    echo $json; 