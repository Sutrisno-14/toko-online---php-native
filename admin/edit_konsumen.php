<?php
    $koneksi = new mysqli("localhost","root","","resto");

        $ambil = $koneksi->query("SELECT * FROM konsumen WHERE id_konsumen='$_GET[id]'");
            $konsumen = $ambil->fetch_assoc();


?>

<h2>Ubah Data Konsumen</h2>

<form action="" method="POST" enctype="multipart/form-data">
    <div class="form-group">
        <label for="nama">Nama</label>
        <input type="text" class="form-control" id="nama" name="nama_kons" value="<?=$konsumen['nama_kons'];?>">
    </div>
    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" class="form-control" id="email" name="email_kons" value="<?=$konsumen['email_kons'];?>">
    </div>
    <div class="form-group">
        <label for="password">password</label>
        <input type="text" class="form-control" id="password" name="pass_kons" value="<?=$konsumen['password_kons'];?>">
    </div>
    <div class="form-group">
        <label for="alamat">Alamat</label>
        <input class="form-control" id="alamat" name="alamat" value="<?=$konsumen['alamat_kons'];?>">
    </div>
    <button class="btn btn-primary" type="submit" name="simpan">Simpan</button>
</form>

<?php
    //cek apakah tombol simpan sudah di tekan belum
    if(isset($_POST['simpan'])) {
        // ambil data dari form ubah konsumen
        $nama = $_POST['nama_kons'];
        $email = $_POST['email_kons'];
        $pwd = $_POST['pass_kons'];
        $alamat = $_POST['alamat'];

        // lakukan Update

        $koneksi->query("UPDATE konsumen SET nama_kons='$nama',email_kons='$email', password_kons='$pwd', alamat_kons='$alamat' WHERE id_konsumen='$_GET[id]' ");

        echo "
            <script>
                alert('Data berhasil di Ubah');
                document.location.href = 'index.php?halaman=konsumen';
            </script>
        ";
    }
?>