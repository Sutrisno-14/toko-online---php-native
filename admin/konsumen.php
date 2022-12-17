<?php
    $koneksi = new mysqli("localhost","root","","resto");

?>

<h2>Data Konsumen</h2>

<table class="table table-bordered ">
   <thead>
    <tr>
        <th>Nomor</th>
        <th>Nama </th>
        <th>Email</th>
        <th>Alamat</th>
        <th>Aksi</th>
    </tr>
   </thead>
   <tbody>
       <?php
            $no=1;
            $ambil = $koneksi->query("SELECT * FROM konsumen");
       ?>
       <?php while($konsumen = $ambil->fetch_assoc()) : ?>
    <tr>
        <td><?=$no;?></td>
        <td><?=$konsumen['nama_kons'];?></td>
        <td><?=$konsumen['email_kons'];?></td>
        <td><?=$konsumen['alamat_kons'];?></td>
        <td>
            <a href="index.php?halaman=hapus_konsumen&id=<?=$konsumen['id_konsumen'];?>" class="btn-danger btn">Delete</a>
            <a href="index.php?halaman=edit_konsumen&id=<?=$konsumen['id_konsumen'];?>" class="btn btn-warning">Edit</a>
        </td>
    </tr>

        <?php
            $no++;
            endwhile;
        ?>
   </tbody>

</table>
<a href="index.php?halaman=tambah_konsumen" class="btn btn-primary">Tambah Konsumen</a>