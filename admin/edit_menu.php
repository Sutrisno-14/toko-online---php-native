<?php
    $result = $koneksi->query("SELECT * FROM menu WHERE id_menu='$_GET[id]' ");
       $menu = $result->fetch_assoc();

       //cek apakah tombol simpan di tekan 
       if(isset($_POST['simpan'])) {
        
        //Ubah foto
        $gambar = $_FILES['gambar_menu']['name'];
        $lokasiGambar = $_FILES['gambar_menu']['tmp_name'];

        //ambil data dari form
        $nama = $_POST['nama_menu'];
        $harga = $_POST['harga_menu'];
        $desk = $_POST['deskripsi_menu'];

        //jika foto dirubah
        if(!empty($lokasiGambar)) {

            //maka update foto + yg lainnya
            move_uploaded_file($lokasiGambar,"../gambar menu/.$gambar");
            $koneksi->query("UPDATE menu SET nama_mn='$nama', harga_mn='$harga', deskripsi_mn='$desk', gambar_mn='$gambar' WHERE id_menu='$_GET[id]'");
        }else {
            //jika gambar tidak ada/tidak diubah
            $koneksi->query("UPDATE menu SET nama_mn='$nama', harga_mn='$harga', deskripsi_mn='$desk' WHERE id_menu='$_GET[id]' ");
        }

        echo "
            <script>
                alert('Data Berhasil di Ubah');
                document.location.href= 'index.php?halaman=menu';
            </script>
        ";
       }
?>

<h2>Edi Data Menu</h2>

<form action="" method="POST" enctype="multipart/form-data">
    <div class="form-group">
        <label for="nama">Nama Menu</label>
        <input type="text" id="name" class="form-control" name="nama_menu" value="<?=$menu['nama_mn'];?>">
    </div>
    <div class="form-group">
        <label for="harga">Harga (Rp.)</label>
        <input type="text" id="harga" class="form-control" name="harga_menu" value="<?=$menu['harga_mn'];?>">
    </div>
    <div class="form-group">
        <label for="des">Deskripsi</label>
        <input type="text" id="des" class="form-control" name="deskripsi_menu" value="<?=$menu['deskripsi_mn'];?>">
    </div>
    <div class="form-group">
        <img src="../gambar menu/<?=$menu['gambar_mn']; ?>" width="100px">
    </div>
    <div class="form-group">
        <label for="gambar">Gambar</label>
        <input type="file" id="gambar" class="form-control" name="gambar_menu">
    </div>
    <button class="btn btn-primary" type="submit" name="simpan">Simpan</button>
</form>
