<?php
    session_start();
    $koneksi = new mysqli("localhost","root","","resto");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BestResto</title>
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

    <!-- ===Konten=== -->
    <div class="konten">
        <div class="container">

            <h1>Aneka Menu Makanan dan Minuman BestResto</h1>
            <hr>
            <div class="row">

                <?php
                    $ambil = $koneksi->query("SELECT * FROM menu");
                ?>
                <?php while($menu=$ambil->fetch_assoc()) : ?>
                    
                <div class="col-md-3">
                    <div class="thumbnail">
                        <img src="gambar menu/<?=$menu['gambar_mn'];?>" width="150px">
                        <div class="caption">
                            <h3><?=$menu['nama_mn'];?></h3>
                            <h5>Rp.<?=number_format($menu['harga_mn']);?></h5>
                            <a href="beli.php?id=<?=$menu['id_menu'];?>" class="btn btn-primary">Beli</a>
                        </div>
                    </div>
                </div>

                <?php
                    endwhile;
                ?>
                
            </div>
        </div>
    </div>

</body>
</html>