<?php
    session_start();
    $koneksi = new mysqli("localhost","root","","resto");
    //kalau blm login harus login dulu dan jika keranjang kosong harus pesan dulu
    if(!isset($_SESSION['keranjang']) || empty($_SESSION['keranjang'])) {
        echo "
            <script>
                alert('Keranjang pemesanan Kosong, Harus belanja dulu');
                document.location.href= 'index.php';
            </script> 
        ";
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Keranjang Pemesanan</title>
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

    <!-- Section keranjang menu belanja -->
    <section class="konten">
        <div class="container">
            <h1>Keranjang Menu Belanja</h1>
            <hr>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Menu</th>
                        <th>Harga</th>
                        <th>Jumlah</th>
                        <th>SubHarga</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no=1;
                    foreach($_SESSION['keranjang'] as $id_menu=>$jumlah):
                    ?>
                    <!--===Menampilkan menu yang sedang diperulangkan berdasarkan id_menu=== -->
                    <?php 
                        $ambil=$koneksi->query("SELECT * FROM menu WHERE id_menu='$id_menu'");
                        $menu=$ambil->fetch_assoc();
                        $subharga = $menu['harga_mn']*$jumlah;
                    ?>
                    
                    <tr>
                        <td><?=$no;?></td>
                        <td><?=$menu['nama_mn'];?></td>
                        <td><?=number_format($menu['harga_mn']);?></td>
                        <td><?=$jumlah;?></td>
                        <td><?=$subharga;?></td>
                    </tr>

                    <?php
                        $no++;
                        endforeach;
                    ?>
                </tbody>
            </table>
            <a href="index.php" class="btn btn-default">Lanjutkan Pemesanan</a>
            <a href="index.php" class="btn btn-primary">Checkout</a>
        </div>
    </section>
</body>
</html>