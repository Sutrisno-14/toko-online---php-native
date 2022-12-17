<h2>Tambah Menu</h2>

<form action="" method="POST" enctype="multipart/form-data">
    <div class="form-group">
        <label for="nama">Nama Menu</label>
        <input type="text" id="name" class="form-control" name="nama_menu">
    </div>
    <div class="form-group">
        <label for="harga">Harga (Rp.)</label>
        <input type="text" id="harga" class="form-control" name="harga_menu">
    </div>
    <div class="form-group">
        <label for="des">Deskripsi</label>
        <input type="text" id="des" class="form-control" name="deskripsi_menu">
    </div>
    <div class="form-group">
        <label for="gambar">Gambar</label>
        <input type="file" id="gambar" class="form-control" name="gambar_menu">
    </div>
    <button class="btn btn-primary" type="submit" name="simpan">Simpan</button>
</form>

<?php
    //cek apakah tombol simpan sdh di tekan atau belum
    if(isset($_POST['simpan'])) {

        $gambar = $_FILES['gambar_menu']['name'];
        $tmpFile = $_FILES['gambar_menu']['tmp_name'];
        move_uploaded_file($tmpFile, "../gambar menu/".$gambar);

        $nama = $_POST['nama_menu'];
        $harga = $_POST['harga_menu'];
        $desc= $_POST['deskripsi_menu'];

        $koneksi->query("INSERT INTO menu (nama_mn, harga_mn, gambar_mn, deskripsi_mn) VALUES('$nama','$harga','$gambar','$desc')");

        echo "
        <script>
            alert('Data tersimpan');
            document.location.href= 'index.php?halaman=menu';
        </script> 
    ";

    }
?>