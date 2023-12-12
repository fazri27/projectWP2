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
        <center>Laporan Data Buku Perputakaan Online</center>
    </h3>
    <br />
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
</body>

</html>