<?php
    session_start();
    $koneksi= new mysqli("localhost","root","","resto");
    // kalau belum login, harus login dulu
    if(!isset($_SESSION['konsumen'])) {
        echo "
            <script>
                alert('Harus Login Terlebih Dahulu');
                document.location.href= 'login.php';
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
    <title>Checkout</title>
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
    <?php echo "<pre>";
    print_r($_SESSION['konsumen']);
    echo "</pre>";?>
</body>
</html>