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
                <th>Bunga</th>
                <th>Kategori</th>
                <th>Harga</th>
                <th>Deskripsi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            foreach ($member as $key => $value) {
            ?>
                <tr>
                    <th scope="row"><?= $no++; ?></th>
                    <td><?= $value->nama; ?></td>
                    <td><?= $value->email; ?></td>
                    <td><?php
                        if ($value->role_id == 1) {
                            echo 'Admin';
                        } else {
                            echo 'Member';
                        }
                        ?></td>
                    <td><?= date('D, M Y', $value->tanggal_input) ?></td>
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