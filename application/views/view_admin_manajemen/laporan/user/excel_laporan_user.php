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
            <th>Nama</th>
            <th>Email</th>
            <th>Role</th>
            <th>Member Sejak</th>
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