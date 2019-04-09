<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    
    require '../../vendor/autoload.php';
    include("../../lib/koneksi.php");

    if ($_GET['idsewa'] && $_GET['tgl'] ){

        $idsewa = $_GET['idsewa'];
        $tgl = $_GET['tgl'];

        $getdata = mysqli_query($conn, "SELECT * FROM tbl_sewa WHERE id_sewa='$idsewa'");
        $getdatas = mysqli_fetch_array($getdata);

        $getpelanggan = mysqli_query($conn, "SELECT * FROM tbl_pelanggan WHERE id_pelanggan='$getdatas[id_pelanggan]'") or die (mysqli_error($conn));
        $getarrpelanggan = mysqli_fetch_array($getpelanggan);

        $getsupir = mysqli_query($conn, "SELECT * FROM tbl_supir WHERE id_supir='$getdatas[id_supir]'") or die (mysqli_error($conn));
        $getarrsupir = mysqli_fetch_array($getsupir);

        $biaya = $getdatas['biaya'];
        $datetime1 = new DateTime($getdatas['tanggal_selesai']);
        $datetime2 = new DateTime($tgl);
        if($datetime2 >= $datetime1)
        {
            $interval = $datetime1->diff($datetime2);
            $day = $interval->format('%d');
            $hour = $interval->format('%H');
            $day = (int) $day;
            $hour= (int) $hour;
            
            if($day!=0 && $hour!=0 || $day!=0 && $hour==0 || $day==0 && $hour!=0){
                $denda = ((($day*24)+($hour))*50000);
            }elseif ($day==0 && $hour==0){
                $denda = 0;
            }
        } else {
            $denda = 0;
        }

        $hasil = $getdatas['biaya']+$denda;
        

        $update = mysqli_query($conn, "UPDATE tbl_sewa SET
                                    tanggal_kembali = '$tgl',
                                    denda           = $denda,
                                    selesai         = 1
                                    WHERE id_sewa = '$idsewa'
                                    ") or die (mysqli_error($conn));
        if ($update){
            $mail = new PHPMailer(true);
            try {

                $abx = 'humboldtbayrentcar@gmail.com';
                $bxx = 'rental2019';

                $mail->isSMTP();                                      
                $mail->Host = 'smtp.gmail.com';  
                $mail->SMTPAuth = true;                               
                $mail->Username = $abx;                 
                $mail->Password = $bxx;                           
                $mail->SMTPSecure = 'tls';                            
                $mail->Port = 587;                                    

                //Recipients
                $mail->setFrom($abx, 'humboldtbayrentcar');
                $mail->AddAddress($getarrsupir['email_supir']);

                //Content
                $mail->isHTML(true);
                $mail->AddEmbeddedImage('../../images/pesanan_selesai.jpg', 'fb');
                $bodyContent = "<img src='cid:fb' width='500'><br/>";
                $bodyContent .= "<p>Data Pelanggan:</p>";
                $bodyContent .= "<p><ul>";
                $bodyContent .= "<li><b>Id Sewa<b> : $idsewa</li>";
                $bodyContent .= "<li><b>Nama Pelanggan<b> : $getarrpelanggan[nama_pelanggan]</li>";
                $bodyContent .= "<li><b>Email Pelanggan <b> : $getarrpelanggan[email_pelanggan]</li>";
                $bodyContent .= "<li><b>Alamat Pengantaran<b> : $getdatas[alamat_pengantaran]</li>";
                $bodyContent .= "<li><b>Tanggal Mulai<b> : $getdatas[tanggal_mulai]</li>";
                $bodyContent .= "<li><b>Tanggal Selesai<b> : $getdatas[tanggal_selesai]</li>";
                $bodyContent .= "<li><b>Tanggal Kembalikan<b> : $tgl</li>";
                $bodyContent .= "<li><b>Durasi Sewa<b> : $getdatas[durasi_sewa]</li>";
                $bodyContent .= "<li><b>Biaya<b> : $getdatas[biaya]</li>";
                $bodyContent .= "<li><b>Denda<b> : $denda</li>";
                $bodyContent .= "<li><b>Total<b> : $hasil</li>";
                $bodyContent .= "<ul></p>";
                $bodyContent .= "<hr>";
                $bodyContent .= "<p>Selamat Bekerja ..!!</p>";
                
                $mail->Subject = 'Pesanan Anda Telah Selesai';
                $mail->Body    = $bodyContent;

                $mail->send();
            } catch (Exception $e) {
                echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
            }

            $allData = array('status'=> 200,'message'=>'finish booking success');
            $json = json_encode($allData, JSON_PRETTY_PRINT);
            echo $json;
        } else {
            $allData = array('status'=> 403,'message'=>'finish booking failed');
            $json = json_encode($allData, JSON_PRETTY_PRINT);
            echo $json;
        }
    }