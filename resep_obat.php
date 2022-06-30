<?php include "layout/_header.php"; ?>

<div class="container">
    <h1 class="text-center my-4">Data Resep Obat</h1>

    <div class="table-responsive">
        <table class="table table-bordered table-hover nowrap" id="example">
            <thead>
                <tr class="text-center">
                    <th>No</th>
                    <th>ID Resep</th>
                    <th>ID Berobat</th>
                    <th>Nama Obat</th>
                </tr>
            </thead>

            <tbody>
                <?php
                $no = 1;
                $sql = "SELECT * FROM resep_obat ";
                $sql .= "INNER JOIN berobat ON resep_obat.id_berobat = berobat.id_berobat ";
                $sql .= "INNER JOIN obat ON resep_obat.id_obat = obat.id_obat";

                $query = mysqli_query($koneksi, $sql);

                while ($resep_obat = mysqli_fetch_array($query)) {
                    if ($resep_obat != NULL) {
                ?>
                        <tr>
                            <td class="text-center"><?= $no++ ?></td>
                            <td class="text-center"><?= $resep_obat['id_resep'] ?></td>
                            <td class="text-center"><?= $resep_obat['id_berobat'] ?></td>
                            <td><?= $resep_obat['nama_obat'] ?></td>
                        </tr>
                    <?php } else { ?>
                        <tr>
                            <td class="text-center">Data masih kosong</td>
                        </tr>
                <?php }
                } ?>
            </tbody>
        </table>
    </div>
</div>


<?php include "layout/_footer.php"; ?>