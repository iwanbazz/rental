<?php 

    include("../../lib/koneksi.php");
    
    function buatrp($angka) {
    $jadi="Rp. ".number_format($angka,0,',','.');
    return $jadi;
    }
    
    if ($_GET['idpelanggan']) {

        $idpelanggan = $_GET['idpelanggan'];
        
        $cek1 = mysqli_query($conn, "SELECT * FROM tbl_sewa 
                                    JOIN tbl_supir ON tbl_sewa.id_supir=tbl_supir.id_supir
                                    JOIN tbl_mobil ON tbl_supir.id_mobil=tbl_mobil.id_mobil
                                    WHERE id_pelanggan='$idpelanggan' AND selesai=0
                                    ORDER BY tbl_sewa.id_sewa DESC");
        $hit1 = mysqli_num_rows($cek1);
        if ($hit1 > 0) {
            while($data=mysqli_fetch_array($cek1)){
                $datas [] = [
                    'idSewa'           => $data['id_sewa'],
                    'idSupir'          => $data['id_supir'],
                    'nikSupir'         => $data['nik_supir'],
                    'namaSupir'        => $data['nama_supir'],
                    'nohpSupir'        => $data['nohp_supir'],
                    'emailSupir'       => $data['email_supir'],
                    'alamatSupir'      => $data['alamat_supir'],
                    'fotoSupir'        => (!empty($data['foto_supir'])) ? "http://rentalpku.serveblog.net/images/supir/".$data['foto_supir'] : "http://rentalpku.serveblog.net/images/no-photo.png",
                    'idMobil'          => $data['id_mobil'],
                    'tipeMobil'        => $data['tipe_mobil'],
                    'noPolisi'         => $data['no_polisi'],
                    'tahun'            => $data['tahun'],
                    'fotoMobil'        => (!empty($data['foto_mobil'])) ? "http://rentalpku.serveblog.net/images/mobil/".$data['foto_mobil'] : "http://rentalpku.serveblog.net/images/no-car.jpg",
                    'alamatPengantaran'=> $data['alamat_pengantaran'],
                    'tanggalMulai'     => $data['tanggal_mulai'],
                    'tanggalSelesai'   => $data['tanggal_selesai'],
                    'pakaiSupir'       => $data['supir'],
                    'durasiSewa'       => $data['durasi_sewa'],
                    'biaya'            => buatrp($data['biaya']),
                    'selesai'          => $data['selesai'],
                ];
            }
            $allData = array('status'=> 200,'message'=>'success','dataOrder'=>$datas);
            $json = json_encode($allData, JSON_PRETTY_PRINT);
            echo $json;
        } else {
            $allData = array('status'=> 200,'message'=>'success','dataOrder'=>[]);
            $json = json_encode($allData, JSON_PRETTY_PRINT);
            echo $json;
        }
    } 




