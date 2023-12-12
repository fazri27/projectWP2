<!DOCTYPE html>
<html>

<head>
    <title></title>
</head>

<body>
    <style type="text/css">
        .table-data {
            width: 100%;
            border-collapse: collapse;
        }

        .table-data tr th,
        .table-data tr td {
            border: 1px solid black;
            font-size: 11pt;
            font-family: Verdana;
            padding: 10px 10px 10px 10px;
        }

        h3 {
            font-family: Verdana;
        }
    </style>
    <h3>
        <center><b>Laporan Data Bunga</b></center>
    </h3>
    <br />
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
    <script type="text/javascript">
        window.print();
    </script>
</body>

</html>