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
            <th>Qty</th>
            <th>Harga</th>
            <th>Total</th>
            <th>Tanggal</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $no = 1;
        foreach ($pesanan as $key => $value) {
        ?>
            <tr>
                <th scope="row"><?= $no++; ?></th>
                <td><?= $value->nama_katalog; ?></td>
                <td><?= $value->qty; ?></td>
                <td><?= $value->harga; ?></td>
                <td><?= $value->total; ?></td>
                <td><?= date('D, M Y', $value->tgl_transaksi) ?></td>
                <td><?= $value->status; ?></td>
            </tr>
        <?php
        }
        ?>
    </tbody>
</table>