<?php include '../koneksi.php'; ?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>register</title>
	<!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
        <!-- CUSTOM STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />
     <!-- GOOGLE FONTS-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />

</head>
<body>

    
    <div class="container">
        <div class="row text-center  ">
            <div class="col-md-12">
                <br /><br />
                <h2> Indoapril : Register</h2>
               
                <h5>( Register yourself to get access )</h5>
                 <br />
            </div>
        </div>
         <div class="row">
               
                <div class="col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                        <strong>  New User ? Register Yourself </strong>  
                            </div>
                            <div class="panel-body">
                                <form role="form" method="POST">
<br/>
                                        <div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-circle-o-notch"  ></i></span>
                                            <input type="text" class="form-control" placeholder="Your Name" name="nama" required />
                                        </div>
                                     <div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-user" ></i></span>
                                            <input type="text" class="form-control" placeholder="Desired Username" name="user" required  />
                                        </div>
                                         <div class="form-group input-group">
                                            <span class="input-group-addon">@</span>
                                            <input type="text" class="form-control" placeholder="Your Email" name="email" required />
                                        </div>
                                        <div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-phone" ></i></span>
                                            <input type="text" class="form-control" placeholder="Your Contact Person" name="kontak" required />
                                        </div>
                                        <div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-home" ></i></span>
                                            <textarea class="form-control" name="alamat" placeholder="Your Address" required></textarea>
                                       </div>
                                      <div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-lock"  ></i></span>
                                            <input type="password" class="form-control" placeholder="Enter Password" name="password1" required />
                                        </div>
                                     <div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-lock"  ></i></span>
                                            <input type="password" class="form-control" placeholder="Retype Password" name="password2" required />
                                        </div>
                                        <div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-home" ></i></span>
                                            <select name="level" class="form-control">
                                                <option>Pilih Level</option>
                                                <option value="admin">Admin</option>
                                                <option value="pelanggan">Pelanggan</option>
                                            </select>
                                       </div>
                                     
                                     <button class="btn btn-success" name="register">Register Me</button>
                                     <input type="reset" class="btn btn-primary" value="Reset">
                                    <hr />
                                    Already Registered ?  <a href="login.php" >Login here</a>
                                    </form>


                                    <?php 
                                    if (isset($_POST['register'])) {
                                        $nama = $_POST['nama'];
                                        $user = $_POST['user'];
                                        $email = $_POST['email'];
                                        $kontak = $_POST['kontak'];
                                        $alamat = $_POST['alamat'];
                                        $password1 = md5($_POST['password1']);
                                        $password2 = md5($_POST['password2']);
                                        $level = $_POST['level'];

                                        if ($password1 == $password2) {
                                            if ($level == 'admin') {
                                                $sql = "INSERT INTO admin (username, password, nama_lengkap, email, kontak, alamat) VALUES ('".$user."', '".$password1."', '".$nama."', '".$email."', '".$kontak."', '".$alamat."')";
                                                $query = $koneksi->query($sql);

                                                if ($query == true) {
                                                    echo "
                                                    <script>
                                                    alert('Anda sukses register');
                                                    window.location.href = ('login.php');
                                                    </script>
                                                    ";
                                                } else {
                                                    echo "
                                                    <script>
                                                    alert('Register gagal, coba kembali');
                                                    window.location.href = ('registeration.php');
                                                    </script>
                                                    ";
                                                }
                                            } elseif ($level == 'pelanggan') {
                                                $sql = "INSERT INTO pelanggan (username, password, nama_lengkap, email, kontak, alamat_pelanggan) VALUES ('".$user."', '".$password1."', '".$nama."', '".$email."', '".$kontak."', '".$alamat."')";
                                                $query = $koneksi->query($sql);

                                                if ($query == true) {
                                                    echo "
                                                    <script>
                                                    alert('Anda sukses register');
                                                    window.location.href = ('login.php');
                                                    </script>
                                                    ";
                                                } else {
                                                    echo "
                                                    <script>
                                                    alert('Register gagal, coba kembali');
                                                    window.location.href = ('registeration.php');
                                                    </script>
                                                    ";
                                                }
                                            }
                                            
                                            
                                        } else {
                                                echo "
                                                <script>
                                                alert('Ulangi, Password Anda tidak sama');
                                                window.location.href = ('registeration.php');
                                                </script>
                                                ";
                                        }
                                    }

                                    

                                    
                                     ?>
                            </div>
                           
                        </div>
                    </div>
                
                
        </div>
    </div>


     <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="assets/js/jquery-1.10.2.js"></script>
      <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="assets/js/jquery.metisMenu.js"></script>
      <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>
   
</body>
</html>
