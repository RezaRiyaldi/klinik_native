<?php include "layout/_header.php"; ?>

<div class="container">
    <h1 class="text-center my-4">Data Berobat</h1>

    <table class="table table-bordered table-hover">
        <thead>
            <tr class="text-center">
                <th>No</th>
                <th>ID Berobat</th>
                <th>Nama Pasien</th>
                <th>Keluhan Pasien</th>
                <th>Hasil Diagnosa</th>
                <th>Penatalaksana</th>
                <th>Tanggal Berobat</th>
                <th>Nama Dokter</th>
            </tr>
        </thead>

        <tbody>
            <?php
            $no = 1;
            $query = "SELECT * FROM berobat ";
            $query .= "INNER JOIN pasien ON berobat.id_pasien = pasien.id_pasien ";
            $query .= "INNER JOIN dokter ON berobat.id_dokter = dokter.id_dokter";

            $sql = mysqli_query($koneksi, $query);

            while ($berobat = mysqli_fetch_array($sql)) {
            ?>
                <tr>
                    <td class="text-center"><?= $no++ ?></td>
                    <td class="text-center"><?= $berobat['id_berobat'] ?></td>
                    <td><?= $berobat['nama_pasien'] ?></td>
                    <td><?= $berobat['keluhan_pasien'] ?></td>
                    <td><?= $berobat['hasil_diagnosa'] ?></td>
                    <td><?= $berobat['penatalaksana'] ?></td>
                    <td class="text-center"><?= $berobat['tgl_berobat'] ?></td>
                    <td><?= $berobat['nama_dokter'] ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>


<?php include "layout/_footer.php"; ?>