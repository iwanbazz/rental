<section class="content-header">
    <h1>User</h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a>User</a></li>
    </ol>
</section>
<section class="content container-fluid">
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-danger">
                <div class="box-header with-border">
                    <h3 class="box-title"><b>USER</b> | Edit</h3>
                </div>

                <div class="box-body">
                <?php 
                   if (isset($_POST['submit'])){   

                    $iduser         = $_POST['iduser'];
                    $username       = $_POST['username'];
                    $password       = $_POST['password'];
                    $email          = $_POST['email'];
                    $oldimage       = $_POST['oldimage'];

                    $name_image     = $_FILES['image']['name'];
                    $loc_image      = $_FILES['image']['tmp_name'];
                    $type_image     = $_FILES['image']['type'];
                    
                    $cek            = array('png','jpg','jpeg','gif');
                    $x              = explode('.',$name_image);
                    $extension      = strtolower(end($x));
                    $size_image     = $_FILES['image']['size'];

                    if ($name_image != "") {
                        if (in_array($extension, $cek) === TRUE){
                            if ($size_image < 5044070){
                                unlink("../images/user/$oldimage");
                                move_uploaded_file($loc_image,"../images/user/$name_image");
                                try {
                                        $conn ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $pdo = $conn->prepare('UPDATE tbl_user SET
                                                        username        = :user,
                                                        password        = :pwd,
                                                        email           = :email,
                                                        image_user      = :img
                                                        WHERE id_user   = :iduser');
                                        $updatedata = array(':user'=>$username, ':pwd'=>$password, ':email'=>$email, ':img'=>$name_image,':iduser'=>$iduser);
                                        $pdo->execute($updatedata);

                                        echo    '<div class="row"><div class="col-md-12"><div class="alert alert-success alert-dismissible">'.
                                                '<h4><i class="icon fa fa-check"></i> Alert!</h4>'.
                                                'Edit data success'.
                                                '</div></div></div>';
                                        echo "<meta http-equiv='refresh' content='1;
                                        url=?page=profile'>";
                                    
                                    } catch (PDOexception $e) {
                                        print "tambah berita gagal: " . $e->getMessage() . "<br/>";
                                    die();
                                    }
                                    
                            }else{
                                echo    '<div class="row"><div class="col-md-12"><div class="alert alert-danger alert-dismissible">'.
                                                '<h4><i class="icon fa fa-check"></i> Alert!</h4>'.
                                                'Image size more than 50 MB'.
                                                '</div></div></div>';
                                echo    '<div><a class="btn btn-info" href="?page=profile"><i class="fa fa-chevron-circle-left"></i> Resubmit data</a></div>';
                            }
                        } else {
                            echo    '<div class="row"><div class="col-md-12"><div class="alert alert-danger alert-dismissible">'.
                                            '<h4><i class="icon fa fa-check"></i> Alert!</h4>'.
                                            'Extension not allowed. Extension must be like PNG, JPG, JPEG, GIF.'.
                                            '</div></div></div>';
                            echo    '<div><a class="btn btn-info" href="?page=profile"><i class="fa fa-chevron-circle-left"></i> Resubmit data</a></div>';
                        }
                    } else {
                        try {
                            $conn ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                            $pdo = $conn->prepare('UPDATE tbl_user SET
                                            username        = :user,
                                            password        = :pwd,
                                            email           = :email
                                            WHERE id_user   = :iduser');
                            $updatedata = array(':user'=>$username, ':pwd'=>$password, ':email'=>$email, ':iduser'=>$iduser);
                            $pdo->execute($updatedata);

                            echo    '<div class="row"><div class="col-md-12"><div class="alert alert-success alert-dismissible">'.
                                    '<h4><i class="icon fa fa-check"></i> Alert!</h4>'.
                                    'Edit data success'.
                                    '</div></div></div>';
                            echo "<meta http-equiv='refresh' content='1;
                            url=?page=profile'>";
                        
                        } catch (PDOexception $e) {
                            print "tambah berita gagal: " . $e->getMessage() . "<br/>";
                        die();
                        }
                    }
                }
                ?>
                </div>
            </div>
        </div>
    </div>
</section>

