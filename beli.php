<?php
    session_start();
    // mendapat id_menu dari url index pengunjung

    $id_menu = $_GET['id'];

    //Jika sudah ada menu didalam keranjang, maka menunya di jumlah + 1
    
    if(isset($_SESSION['keranjang'][$id_menu])) {
        $_SESSION['keranjang'][$id_menu] += 1;


        //selain itu (belum ada di keranjang), maka menu itu dianggap dibeli 1
    }else {
        $_SESSION['keranjang'][$id_menu] = 1;
    }

    // echo "<pre>";
    //     print_r($_SESSION);
    // echo "</pre>";

    echo "
        <script>
            alert('Menu telah masuk ke keranjang Pemesanan ');
            document.location.href= 'keranjang.php';
        </script> 
    ";
    
?>
