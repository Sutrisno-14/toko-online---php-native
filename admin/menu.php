<?php
    $koneksi = new mysqli("localhost","root","","resto");
?>

<h2>Data Menu Resto</h2>

<table class="table table-bordered ">
   <thead>
    <tr>
        <th>Nomor</th>
        <th>Nama Menu</th>
        <th>Harga</th>
        <th>Foto</th>
        <th>Deskripsi</th>
        <th>Aksi</th>
    </tr>
   </thead>
   <tbody>
       <?php
            $no=1;
            $ambil = $koneksi->query("SELECT * FROM menu");
       ?>
       <?php while($menu = $ambil->fetch_assoc()) : ?>
    <tr>
        <td><?=$no;?></td>
        <td><?=$menu['nama_mn'];?></td>
        <td><?=$menu['harga_mn'];?></td>
        <td>
            <img src="../gambar menu/<?=$menu['gambar_mn'];?>" width="100px">
        </td>
        <td><?=$menu['deskripsi_mn'];?></td>
        <td>
            <a href="index.php?halaman=hapus_menu&id=<?=$menu['id_menu'];?>" class="btn-danger btn">Delete</a>
            <a href="index.php?halaman=edit_menu&id=<?=$menu['id_menu'];?>" class="btn btn-warning">Edit</a>
        </td>
    </tr>

        <?php
            $no++;
            endwhile;
        ?>
   </tbody>

</table>
<a href="index.php?halaman=tambah_menu" class="btn btn-primary">Tambah Menu</a>
