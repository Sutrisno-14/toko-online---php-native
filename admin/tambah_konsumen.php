<h2>Tambah Data Konsumen</h2>

<form action="" method="POST" enctype="multipart/form-data">
    <div class="form-group">
        <label for="nama">Nama</label>
        <input type="text" class="form-control" id="nama" name="nama_kons">
    </div>
    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" class="form-control" id="email" name="email_kons">
    </div>
    <div class="form-group">
        <label for="password">password</label>
        <input type="password" class="form-control" id="password" name="pass_kons">
    </div>
    <div class="form-group">
        <label for="alamat">Alamat</label>
        <input class="form-control" id="alamat" name="alamat">
    </div>
    <button class="btn btn-primary" type="submit" name="simpan">Simpan</button>
</form>

<?php

    //cek apakah tombol simpan sudah ditekan 
    if(isset($_POST['simpan'])) {
    
        //ambil name dari form
        $nama = $_POST['nama_kons'];
        $email = $_POST['email_kons'];
        $pwd = $_POST['pass_kons'];
        $alamat = $_POST['alamat'];

        //masukan ke database
        $koneksi->query("INSERT INTO konsumen (nama_kons, email_kons, password_kons, alamat_kons) VALUES ('$nama','$email','$pwd','$alamat')");

        echo "
            <script>
                alert('Data Berhasil di simpan');
                document.location.href='index.php?halaman=konsumen';
            </script>
        ";
    }


?>