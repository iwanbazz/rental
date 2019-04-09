<?php 

    include("../../lib/koneksi.php");
    if ($_GET['nohp'] && $_GET['pass'])
    {
        $nohp = $_GET['nohp'];
        $pass = $_GET['pass'];
        
        $ceklogin1 = mysqli_query($conn, "SELECT * FROM tbl_pelanggan WHERE nohp_pelanggan='$nohp' AND password_pelanggan='$pass'");
        $hit1 = mysqli_num_rows($ceklogin1);
        if ($hit1 > 0) {
            while($data=mysqli_fetch_array($ceklogin1)){
                $datasform [] = [
                    'idPelanggan'          => $data['id_pelanggan'],
                    'nikPelanggan'         => $data['nik_pelanggan'],
                    'namaPelanggan'        => $data['nama_pelanggan'],
                    'nohpPelanggan'        => $data['nohp_pelanggan'],
                    'emailPelanggan'       => $data['email_pelanggan'],
                    'passwordPelanggan'    => $data['password_pelanggan'],
                    'alamatPelanggan'      => $data['alamat_pelanggan'],
                    'fotoPelanggan'        => $data['foto_pelanggan'],
                ];
                $idpelanggan = $data['id_pelanggan'];
            }
                $dataform = $datasform;

                $history = mysqli_query($conn, "SELECT * FROM tbl_sewa 
                                            JOIN tbl_supir ON tbl_sewa.id_supir=tbl_supir.id_supir
                                            JOIN tbl_mobil ON tbl_supir.id_mobil=tbl_mobil.id_mobil
                                            WHERE tbl_sewa.id_pelanggan='$idpelanggan' AND tbl_sewa.selesai=1");
                $hithistory = mysqli_num_rows($history);
                if ($hithistory > 0) {
                    while($data=mysqli_fetch_array($history)){
                        $datashis [] = [
                            'idSewa'           => $data['id_sewa'],
                            'idSupir'          => $data['id_supir'],
                            'nikSupir'         => $data['nik_supir'],
                            'namaSupir'        => $data['nama_supir'],
                            'nohpSupir'        => $data['nohp_supir'],
                            'emailSupir'       => $data['email_supir'],
                            'alamatSupir'      => $data['alamat_supir'],
                            'fotoSupir'        => $data['foto_supir'],
                            'idMobil'          => $data['id_mobil'],
                            'tipeMobil'        => $data['tipe_mobil'],
                            'noPolisi'         => $data['no_polisi'],
                            'fotoMobil'        => $data['foto_mobil'],
                            'tanggalMulai'     => $data['tanggal_mulai'],
                            'tanggalSelesai'   => $data['tanggal_selesai'],
                            'durasiSewa'       => $data['durasi_sewa'],
                            'denda'            => $data['denda'],
                            'selesai'          => $data['selesai'],
                            ];  
                        $datahistory = $datashis;
                    }
                } else {
                    $datahistory = [];
                }

                $order = mysqli_query($conn, "SELECT * FROM tbl_sewa 
                                    JOIN tbl_supir ON tbl_sewa.id_supir=tbl_supir.id_supir
                                    JOIN tbl_mobil ON tbl_supir.id_mobil=tbl_mobil.id_mobil
                                    WHERE id_pelanggan='$idpelanggan' AND tbl_sewa.selesai=0");
                $hitorder = mysqli_num_rows($order);
                if ($hitorder > 0) {
                    while($data=mysqli_fetch_array($order)){
                        $datasorder [] = [
                            'idSewa'           => $data['id_sewa'],
                            'idSupir'          => $data['id_supir'],
                            'nikSupir'         => $data['nik_supir'],
                            'namaSupir'        => $data['nama_supir'],
                            'nohpSupir'        => $data['nohp_supir'],
                            'emailSupir'       => $data['email_supir'],
                            'alamatSupir'      => $data['alamat_supir'],
                            'fotoSupir'        => $data['foto_supir'],
                            'idMobil'          => $data['id_mobil'],
                            'tipeMobil'        => $data['tipe_mobil'],
                            'noPolisi'         => $data['no_polisi'],
                            'fotoMobil'        => $data['foto_mobil'],
                            'tanggalMulai'     => $data['tanggal_mulai'],
                            'tanggalSelesai'   => $data['tanggal_selesai'],
                            'durasiSewa'       => $data['durasi_sewa'],
                            'denda'            => $data['denda'],
                            'selesai'          => $data['selesai'],
                        ];
                    }
                    $dataorder = $datasorder;
                } else {
                    $dataorder = [];
                }

                $allData = array('status'=> 200,'message'=>'login success','dataForm'=>$dataform,'dataHistory'=>$datahistory,'dataOrder'=>$dataorder);
                $json = json_encode($allData, JSON_PRETTY_PRINT);
                echo $json;
        } else {

            $ceklogin2 = mysqli_query($conn, "SELECT * FROM tbl_supir WHERE nohp_supir='$nohp' AND password_supir='$pass'");
            $hit2 = mysqli_num_rows($ceklogin2);
            if ($hit2 > 0) {
                while($data=mysqli_fetch_array($ceklogin2)){
                    $datasform [] = [
                        'idSupir'          => $data['id_supir'],
                        'nikSupir'         => $data['nik_supir'],
                        'namaSupir'        => $data['nama_supir'],
                        'nohpSupir'        => $data['nohp_supir'],
                        'emailSupir'       => $data['email_supir'],
                        'passwordSupir'    => $data['password_supir'],
                        'alamatSupir'      => $data['alamat_supir'],
                        'fotoSupir'        => $data['foto_supir'],
                    ];
                    $idsupir = $data['id_supir'];
                }
                    $dataform = $datasform;
                    $history = mysqli_query($conn, "SELECT * FROM tbl_sewa 
                                    JOIN tbl_pelanggan ON tbl_sewa.id_pelanggan=tbl_pelanggan.id_pelanggan
                                    WHERE tbl_sewa.id_supir='$idsupir' AND tbl_sewa.selesai=1");
                    $hithistory = mysqli_num_rows($history);
                    if ($hithistory > 0) {
                        while($data=mysqli_fetch_array($history)){
                            $datashis [] = [
                                'idSewa'               => $data['id_sewa'],
                                'idPelanggan'          => $data['id_pelanggan'],
                                'nikPelanggan'         => $data['nik_pelanggan'],
                                'namaPelanggan'        => $data['nama_pelanggan'],
                                'nohpPelanggan'        => $data['nohp_pelanggan'],
                                'emailPelanggan'       => $data['email_pelanggan'],
                                'alamatPelanggan'      => $data['alamat_pelanggan'],
                                'fotoPelanggan'        => $data['foto_pelanggan'],
                                'tanggalMulai'         => $data['tanggal_mulai'],
                                'tanggalSelesai'       => $data['tanggal_selesai'],
                                'durasiSewa'           => $data['durasi_sewa'],
                                'denda'                => $data['denda'],
                                'selesai'              => $data['selesai'],
                            ];
                            $datahistory = $datashis;
                        }
                    } else {
                        $datahistory = [];
                    }

                    $order = mysqli_query($conn, "SELECT * FROM tbl_sewa 
                                        JOIN tbl_pelanggan ON tbl_sewa.id_pelanggan=tbl_pelanggan.id_pelanggan
                                        WHERE id_supir='$idsupir' AND tbl_sewa.selesai=0");
                    $hitorder = mysqli_num_rows($order);
                    if ($hitorder > 0) {
                        while($data=mysqli_fetch_array($order)){
                            $datasorder [] = [
                                'idSewa'               => $data['id_sewa'],
                                'idPelanggan'          => $data['id_pelanggan'],
                                'nikPelanggan'         => $data['nik_pelanggan'],
                                'namaPelanggan'        => $data['nama_pelanggan'],
                                'nohpPelanggan'        => $data['nohp_pelanggan'],
                                'emailPelanggan'       => $data['email_pelanggan'],
                                'alamatPelanggan'      => $data['alamat_pelanggan'],
                                'fotoPelanggan'        => $data['foto_pelanggan'],
                                'tanggalMulai'         => $data['tanggal_mulai'],
                                'tanggalSelesai'       => $data['tanggal_selesai'],
                                'durasiSewa'           => $data['durasi_sewa'],
                                'denda'                => $data['denda'],
                                'selesai'              => $data['selesai'],
                            ];
                            $dataorder = $datasorder;
                        }
                    } else {
                        $dataorder = [];
                    }
                    $allData = array('status'=> 200,'message'=>'login success','dataForm'=>$dataform,'dataHistory'=>$datahistory,'dataOrder'=>$dataorder);
                    $json = json_encode($allData, JSON_PRETTY_PRINT);
                    echo $json;

            } else {
                $allData = array('status'=> 403,'message'=>'login failed');
                $json = json_encode($allData, JSON_PRETTY_PRINT);
                echo $json;  
            }
        }
    }