<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    
    require '../../vendor/autoload.php';
    include("../../lib/koneksi.php");

    if ($_GET['idpelanggan'] && $_GET['idsupir'] && $_GET['supir'] && $_GET['tglmulai'] && $_GET['tglselesai'] && $_GET['alamat']) {

        $idpelanggan = $_GET['idpelanggan'];
        $idsupir = $_GET['idsupir'];
        $supir = (int) $_GET['supir'];
        $tglmulai = $_GET['tglmulai'];
        $tglselesai = $_GET['tglselesai'];
        $alamat = $_GET['alamat'];

        $datetime1 = new DateTime($tglmulai);
        $datetime2 = new DateTime($tglselesai);
        $interval = $datetime1->diff($datetime2);
        $day = $interval->format('%d');
        $day = (int) $day;
        ($supir != 1) ? $biaya = 400000 : $biaya = 500000;
        ($day > 0) ? $total = $biaya*$day : $total = $biaya;

        //get data supir 
        $getsupir = mysqli_query($conn, "SELECT * FROM tbl_supir WHERE id_supir='$idsupir'") or die (mysqli_error($conn));
        $getarrsupir = mysqli_fetch_array($getsupir);
        
        // get data pelanggan
        $getpelanggan = mysqli_query($conn, "SELECT * FROM tbl_pelanggan WHERE id_pelanggan='$idpelanggan'") or die (mysqli_error($conn));
        $getarrpelanggan = mysqli_fetch_array($getpelanggan);
        
        $get_id = mysqli_query($conn, "SELECT id_sewa FROM tbl_sewa WHERE SUBSTRING(id_sewa,1,4)='SEWA'") or die (mysqli_error($conn));
        $trim_id = mysqli_query($conn, "SELECT SUBSTRING(id_sewa,-4,4) as hasil FROM tbl_sewa WHERE SUBSTRING(id_sewa,1,4)='SEWA' ORDER BY hasil DESC LIMIT 1") or die (mysqli_error($conn));
        $hit    = mysqli_num_rows($get_id);
        if ($hit == 0){
            $id_k   = "SEWA0001";
        } else if ($hit > 0){
            $row    = mysqli_fetch_array($trim_id);
            $kode   = $row['hasil']+1;
            $id_k   = "SEWA".str_pad($kode,4,"0",STR_PAD_LEFT); 
        }

        $insert = mysqli_query($conn, "INSERT INTO tbl_sewa SET
                                    id_sewa            ='$id_k',
                                    id_pelanggan       ='$idpelanggan',
                                    id_supir           ='$idsupir',
                                    alamat_pengantaran ='$alamat',
                                    tanggal_mulai      ='$tglmulai',
                                    tanggal_selesai    ='$tglselesai',
                                    supir              = $supir,
                                    durasi_sewa        = $day,
                                    biaya              = $total,
                                    denda              = 0,
                                    selesai            = 0
                                    ") or die (mysqli_error($conn));
        if ($insert){

            $mail = new PHPMailer(true);
            try {

                $abx = 'putrarentalpku@gmail.com';
                $bxx = 'rental2019';

                $mail->isSMTP();                                      
                $mail->Host = 'smtp.gmail.com';  
                $mail->SMTPAuth = true;                               
                $mail->Username = $abx;                 
                $mail->Password = $bxx;                           
                $mail->SMTPSecure = 'tls';                            
                $mail->Port = 587;                                    

                //Recipients
                $mail->setFrom($abx, 'putrarentalpku');
                $mail->AddAddress($getarrsupir['email_supir']);

                //Content
                $mail->isHTML(true);
                $mail->AddEmbeddedImage('../../images/pesanan_baru.jpg', 'fb');
                $bodyContent = "<img src='cid:fb' width='500'><br/>";
                $bodyContent .= "<p>Data Pelanggan:</p>";
                $bodyContent .= "<p><ul>";
                $bodyContent .= "<li><b>Id Sewa<b> : $id_k</li>";
                $bodyContent .= "<li><b>Nama Pelanggan<b> : $getarrpelanggan[nama_pelanggan]</li>";
                $bodyContent .= "<li><b>Email Pelanggan <b> : $getarrpelanggan[email_pelanggan]</li>";
                $bodyContent .= "<li><b>Alamat Pengantaran<b> : $alamat</li>";
                $bodyContent .= "<ul></p>";
                $bodyContent .= "<hr>";
                $bodyContent .= "<p>Selamat Bekerja ..!!</p>";
                
                $mail->Subject = 'Hay !! Ada Pesanan Baru';
                $mail->Body    = $bodyContent;

                $mail->send();
            } catch (Exception $e) {
                echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
            }

            $allData = array('status'=> 200,'message'=>'booking success');
            $json = json_encode($allData, JSON_PRETTY_PRINT);
            echo $json;
        } else {
            $allData = array('status'=> 403,'message'=>'booking failed');
            $json = json_encode($allData, JSON_PRETTY_PRINT);
            echo $json;
        }
        
        
    }