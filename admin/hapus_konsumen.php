<?php

    //Hapus Data Konsumen
    $koneksi->query("DELETE FROM konsumen WHERE id_konsumen='$_GET[id]'");

    echo "
        <script>
            alert('Data Konsumen berhasil dihapus');
            document.location.href = 'index.php?halaman=konsumen';
        </script>
    ";

?>