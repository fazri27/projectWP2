<?php
header('Content-type: application/vnd-ms-excel');
header('Content-Disposition: attachment; filename=' . $title . '.xls');
header('Pragma: no-cache');
header('Expires: 0');
?>
<h3>
    <center>Laporan Data Buku Perputakaan Online</center>
</h3>

<table class="table-data">
    <thead>
        <tr>
            <th>No</th>
            <th>sepatu</th>
            <th>Kategori</th>
            <th>Harga</th>
            <th>Deskripsi</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $no = 1;
        foreach ($bunga as $key => $value) {
        ?>
            <tr>
                <th scope="row"><?= $no++; ?></th>
                <td><?= $value->nama_katalog; ?></td>
                <td><?= $value->nama_kategori; ?></td>
                <td><?= $value->harga; ?></td>
                <td><?= $value->deskripsi; ?></td>
            </tr>
        <?php
        }
        ?>
    </tbody>
</table>