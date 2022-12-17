<?php
    $koneksi = new mysqli("localhost","root","","resto");

?>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>Nomor</th>
            <th>Nama Konsumen</th>
            <th>Tanggal</th>
            <th>Total (RP.)</th>
            <th>Detail</th>
        </tr>
    </thead>
    <tbody>
        <?php 
            $no=1;
            $ambil = $koneksi->query("SELECT * FROM pembelian JOIN konsumen ON pembelian.id_konsumen=konsumen.id_konsumen");
            while($pembelian = $ambil->fetch_assoc()) :
        ?>
        <tr>
            <td><?=$no;?></td>
            <td><?=$pembelian['nama_kons'];?></td>
            <td><?=$pembelian['tanggal'];?></td>
            <td><?=$pembelian['total_pembelian'];?></td>
            <td>
                <a href="index.php?halaman=detail_pembelian&id=<?=$pembelian['id_pembelian'];?>"  class="btn btn-info">Detail</a>
            </td>
        </tr>
        <?php
            $no++;
            endwhile;
        ?>
    </tbody>
</table>