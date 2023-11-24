<?php 
session_start();
include '../koneksi.php';
 ?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>login</title>
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
        <div class="row text-center ">
            <div class="col-md-12">
                <br /><br />
                <h2> Indoapril : Login</h2>
               
                <h5>( Login yourself to get access )</h5>
                 <br />
            </div>
        </div>
         <div class="row ">
               
                  <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                        <strong>   Enter Details To Login </strong>  
                            </div>
                            <div class="panel-body">
                                <form role="form" method="POST">
                                       <br />
                                     <div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-user" ></i></span>
                                            <input type="text" class="form-control" placeholder="Your Username" name="user" required  />
                                        </div>
                                        <div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-lock"  ></i></span>
                                            <input type="password" class="form-control"  placeholder="Your Password" name="password" />
                                        </div>
                                        <div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-home" ></i></span>
                                            <select name="level" class="form-control">
                                                <option>Pilih Level</option>
                                                <option value="admin">Admin</option>
                                                <option value="pelanggan">Pelanggan</option>
                                            </select>
                                       </div>
                                     
                                     <button class="btn btn-primary" name="login">Login</button>
                                    <hr />
                                    Not register ? <a href="registeration.php" >click here </a> 
                                    </form>

                                    <?php 
                                    if (isset($_POST['login'])) {
                                        $user = $_POST['user'];
                                        $password = md5($_POST['password']);
                                        $level = $_POST['level'];

                                        if ($level=='admin') {
                                            $ambil = $koneksi->query("SELECT * FROM admin where username='$user' and password='$password' ");
                                           $cocok = $ambil->num_rows;
                                           if ($cocok==1) {
                                             $_SESSION['admin']=$ambil->fetch_assoc();
                                             echo "<div class='alert alert-info'>Login sukses</div>";
                                             echo "<meta http-equiv='refresh' content='1;url=index.php'>";
                                           }
                                           else {
                                             echo "<div class='alert alert-danger'>Login gagal</div>";
                                             echo "<meta http-equiv='refresh' content='1;url=login.php'>";
                                           }
                                        }
                                        elseif ($level=='pelanggan') {
                                            $ambil = $koneksi->query("SELECT * FROM pelanggan where username='$user' and password='$password' ");

                                            //ngitung akun yang terambil
                                            $cocok = $ambil->num_rows;

                                            if ($cocok==1) {
                                                $akun = $ambil->fetch_assoc();

                                                //simpan di session pelanggan
                                                $_SESSION['pelanggan'] = $akun;

                                                echo "<div class='alert alert-info'>Login sukses</div>";

                                                //jika sudah belanja
                                                if (isset($_SESSION['keranjang']) OR !empty($_SESSION['keranjang'])) {
                                                    
                                                    echo "<meta http-equiv='refresh' content='1;url=../checkout.php'>";
                                                }
                                                else {
                                                    echo "<meta http-equiv='refresh' content='1;url=../riwayat.php'>";
                                                }
                                                
                                            }
                                            else {
                                                //gagal login
                                                echo "<div class='alert alert-danger'>Login gagal</div>";
                                               echo "<meta http-equiv='refresh' content='1;url=login.php'>";
                                            }
                                        }
                                       
                                    } ?>
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
