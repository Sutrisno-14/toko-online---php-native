<?php
    session_start();
    $koneksi= new mysqli("localhost","root","","resto");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Konsumen</title>
    <link rel="stylesheet" href="admin/assets/css/bootstrap.css">
</head>
<body>
    <!-- ====Nabvar=== -->
    <nav class="navbar navbar-default">
        <div class="container">

            <ul class="nav navbar-nav">
                <li><a href="index.php">Home</a></li>
                <li><a href="keranjang.php">Keranjang Pemesanan</a></li>
                <!-- Jika konsumen sudah login ada session konsumen -->
                <?php if(isset($_SESSION['konsumen'])):?>

                <li><a href="logout.php">Logout</a></li>
                <?php else:?>
                <li><a href="login.php">Login</a></li>

                <?php endif; ?>
                <li><a href="checkout.php">Checkout Pemesanan</a></li>
            </ul>

        </div>
    </nav>

    <!-- Kontent -->
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h1 class="panel-title">Login Konsumen</h1>
                        <div class="panel-body">
                            <form action="" method="POST">
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" id="email" class="form-control" name="email">
                                </div>
                                <div class="form-group">
                                    <label for="pwd">Password</label>
                                    <input type="text" class="form-control" id="pwd" name="password">
                                </div>
                                <button class="btn btn-primary" type="submit" name="login">Login</button>
                            </form>

                            <!-- Script Login -->
                            <?php
                                // Cek apakah tombol login sudah di tekan atau belum
                                if(isset($_POST['login'])) {

                                    // ambil data dari from login
                                    $email = $_POST['email'];
                                    $pwd = $_POST['password'];

                                    //Lakukan query ngecek akun di tabel konsumen
                                    $ambil = $koneksi->query("SELECT * FROM konsumen WHERE email_kons='$email' && password_kons='$pwd'");
                                        //ngitung akun yang terambil/ jumlah akunnya    
                                    $akunValid=$ambil->num_rows;
                                        // kalau ad aku yg sama maka boleh login
                                        if($akunValid==1) {
                                            //sukses login
                                            //mendapat akun dalam bentuk array
                                            $akun=$ambil->fetch_assoc();
                                            $_SESSION['konsumen']=$akun;

                                            echo "<div class='alert alert-info'>Login Sukses</div>";
                                                    echo "<meta http-equiv='refresh' content='1;url=checkout.php'>";
                                        }else {
                                            echo "<div class='alert alert-info'>Login Gagal</div>";
                                            echo "<meta http-equiv='refresh' content='1;url=login.php'>";
                                        }

                                }
                            ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>