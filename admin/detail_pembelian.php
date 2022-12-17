<h2>Detail Pembelian</h2>

<?php
    $ambil =$koneksi->query("SELECT * FROM pembelian JOIN konsumen ON pembelian.id_konsumen=konsumen.id_konsumen WHERE pembelian.id_pembelian='$_GET[id]'");

    $detail =  $ambil->fetch_assoc();
?>

<strong>
    Nama : <?= $detail['nama_kons'];?>
</strong>
<p>
    Email : <?= $detail['email_kons'];?> <br>
    Alamat : <?=$detail['alamat_kons'] ?>
</p>
<p> 
    Tanggal Pembelian : <?= $detail['tanggal'];?> <br>
    Total Pembelian : <?=$detail['total_pembelian']; ?>
</p>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>Nomor</th>
            <th>Menu</th>
            <th>Harga</th>
            <th>Jumlah</th>
            <th>Subtotal</th>
        </tr>
    </thead>
    <tbody>
        <?php
            $no=1;
            $ambil= $koneksi->query("SELECT * FROM pembelian_menu JOIN menu ON pembelian_menu.id_menu = menu.id_menu WHERE pembelian_menu.id_pembelian = '$_GET[id]' ");
        ?>
        <?php while($pecah = $ambil->fetch_assoc()): ?>
        <tr>
            <td><?=$no;?></td>
            <td><?=$pecah['nama_mn'];?></td>
            <td><?=$pecah['harga_mn'] ;?></td>
            <td><?=$pecah['jml_pembelian_menu'];?></td>
           <td>
            <?= $pecah['harga_mn']*$pecah['jml_pembelian_menu']; ?>
           </td>
        </tr>
        <?php
            $no++;
            endwhile;
        ?>
    </tbody>
</table>
