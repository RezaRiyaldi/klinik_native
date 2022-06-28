<?php include "layout/_header.php"; ?>

<div class="container">
    <h1 class="text-center my-4">Data Pasien</h1>

    <?php if ($_SESSION['userdata']['logged_in']) : ?>
        <button type="button" class="btn btn-success mb-3" data-bs-toggle="modal" data-bs-target="#exampleModal">
            + Pasien
        </button>
    <?php endif ?>
    <table class="table table-bordered table-hover" id="example">
        <thead>
            <tr class="text-center">
                <th>No</th>
                <th>Nama Pasien</th>
                <th>Jenis Kelamin</th>
                <th>Umur</th>
                <?php if ($_SESSION['userdata']['logged_in']) : ?>
                    <th>Aksi</th>
                <?php endif ?>
            </tr>
        </thead>

        <tbody>
            <?php
            $no = 1;
            $query = "SELECT * FROM pasien";
            $sql = mysqli_query($koneksi, $query);

            while ($pasien = mysqli_fetch_array($sql)) {
                if ($pasien != NULL) {
            ?>

                    <tr>
                        <td class="text-center align-middle"><?= $no++ ?></td>
                        <td class="align-middle"><?= $pasien['nama_pasien'] ?></td>
                        <td class="text-center align-middle"><?= $pasien['jenis_kelamin'] ?></td>
                        <td class="text-center align-middle"><?= $pasien['umur'] ?></td>
                        <?php if ($_SESSION['userdata']['logged_in']) : ?>
                            <td class="text-center align-middle">
                                <a href="edit_pasien.php?id_pasien=<?= $pasien['id_pasien'] ?>" class="btn btn-warning btn-sm">Edit</a>
                                <a href="__controller.php?id_pasien=<?= $pasien['id_pasien'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah anda yakin ingin menghapus data pasien <?= $pasien['nama_pasien'] ?> ?')">Hapus</a>
                            </td>
                        <?php endif ?>
                    </tr>
                <?php } else { ?>
                    <tr>
                        <td class="text-center">Data Kosong</td>
                    </tr>
            <?php }
            } ?>
        </tbody>
    </table>
</div>


<!-- Modal -->
<div class="modal fade" data-bs-backdrop="static" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Data Pasien</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="__controller.php" method="POST">
                    <div class="mb-3">
                        <label for="" class="form-label">Nama Pasien</label>
                        <input type="text" name="nama_pasien" class="form-control" placeholder="Masukan nama pasien" required>
                    </div>

                    <div class="mb-3">
                        <label for="" class="form-label">Jenis Kelamin</label>
                        <select name="jenis_kelamin" id="" class="form-select" required>
                            <option value="">Pilih Jenis Kelamin</option>
                            <option value="L">Laki - laki</option>
                            <option value="P">Perempuan</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="" class="form-label">Umur Pasien</label>
                        <input type="number" name="umur" class="form-control" placeholder="Masukan umur pasien" maxlength="99" required>
                    </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-success" name="tambah_pasien">Save changes</button>
                </form>
            </div>
        </div>
    </div>
</div>
<?php include "layout/_footer.php"; ?>