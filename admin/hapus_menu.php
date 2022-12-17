<?php

    //ambil data dari data bases

    $result = $koneksi->query("SELECT * FROM menu WHERE id_menu='$_GET[id]'");
       $menu = $result->fetch_assoc();

       $foto_menu = $menu['gambar_mn'];

       if(file_exists("../gambar menu/$foto_menu")) {
           unlink("../gambar menu/$foto_menu");
       }

    $koneksi->query("DELETE FROM menu WHERE id_menu='$_GET[id]'");

    echo "
       <script>
            alert('Data berhasil di happus');
            document.location.href='index.php?halaman=menu';
       </script>
    ";
?>