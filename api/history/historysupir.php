<?php

    include("../../lib/koneksi.php");

    function buatrp($angka) {
    $jadi="Rp. ".number_format($angka,0,',','.');
    return $jadi;
    }

    if ($_GET['idsupir']) {

        $idsupir = $_GET['idsupir'];
        
        $cek1 = mysqli_query($conn, "SELECT * FROM tbl_sewa 
                                    JOIN tbl_pelanggan ON tbl_sewa.id_pelanggan=tbl_pelanggan.id_pelanggan
                                    WHERE tbl_sewa.id_supir='$idsupir' AND tbl_sewa.selesai=1
                                    ORDER BY tbl_sewa.id_sewa DESC");
        $hit1 = mysqli_num_rows($cek1);
        if ($hit1 > 0) {
            while($data=mysqli_fetch_array($cek1)){
                $datas [] = [
                    'idSewa'               => $data['id_sewa'],
                    'idPelanggan'          => $data['id_pelanggan'],
                    'nikPelanggan'         => $data['nik_pelanggan'],
                    'namaPelanggan'        => $data['nama_pelanggan'],
                    'nohpPelanggan'        => $data['nohp_pelanggan'],
                    'emailPelanggan'       => $data['email_pelanggan'],
                    'alamatPelanggan'      => $data['alamat_pelanggan'],
                    'fotoPelanggan'        => (!empty($data['foto_pelanggan'])) ? "http://rentalpku.herokuapp.com/images/pelanggan/".$data['foto_pelanggan'] : "http://rentalpku.herokuapp.com/images/no-photo.png",
                    'alamatPengantaran'    => $data['alamat_pengantaran'],
                    'tanggalMulai'         => $data['tanggal_mulai'],
                    'tanggalSelesai'       => $data['tanggal_selesai'],
                    'tanggalKembali'       => $data['tanggal_kembali'],
                    'pakaiSupir'           => $data['supir'],
                    'durasiSewa'           => $data['durasi_sewa'],
                    'biaya'                => buatrp($data['biaya']),
                    'denda'                => buatrp($data['denda']),
                    'total'                => buatrp(($data['biaya']+$data['denda'])),
                    'selesai'              => $data['selesai'],
                ];
            }
            $allData = array('status'=> 200,'message'=>'success','dataHistorySupir'=>$datas);
            $json = json_encode($allData, JSON_PRETTY_PRINT);
            echo $json;
        } else {
            $allData = array('status'=> 200,'message'=>'success','dataHistorySupir'=>[]);
            $json = json_encode($allData, JSON_PRETTY_PRINT);
            echo $json;
        }
    }