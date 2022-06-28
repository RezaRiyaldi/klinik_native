<?php include "layout/_header.php"; ?>

<div class="container">
    <h1 class="text-center my-4">Data Dokter</h1>

    <?php if ($_SESSION['userdata']['logged_in']) : ?>
        <button type="button" class="btn btn-success mb-3" data-bs-toggle="modal" data-bs-target="#exampleModal">
            + Dokter
        </button>
    <?php endif ?>
    <table class="table table-bordered table-hover" id="example">
        <thead>
            <tr class="text-center">
                <th>No</th>
                <th>Nama Dokter</th>
                <?php if ($_SESSION['userdata']['logged_in']) : ?>
                    <th>Aksi</th>
                <?php endif ?>
            </tr>
        </thead>

        <tbody>
            <?php
            $no = 1;
            $query = "SELECT * FROM dokter";
            $sql = mysqli_query($koneksi, $query);

            while ($dokter = mysqli_fetch_array($sql)) {
            ?>
                <tr>
                    <td class="text-center align-middle"><?= $no++ ?></td>
                    <td class="align-middle"><?= $dokter['nama_dokter'] ?></td>
                    <?php if ($_SESSION['userdata']['logged_in']) : ?>
                        <td class="text-center align-middle">
                            <a href="edit_dokter.php?id_dokter=<?= $dokter['id_dokter'] ?>" class="btn btn-warning btn-sm">Edit</a>
                            <a href="__controller.php?id_dokter=<?= $dokter['id_dokter'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah anda yakin ingin menghapus data dokter <?= $dokter['nama_dokter'] ?> ?')">Hapus</a>
                        </td>
                    <?php endif ?>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>

<!-- Modal -->
<div class="modal fade" data-bs-backdrop="static" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Data Dokter</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="__controller.php" method="POST">
                    <div class="mb-3">
                        <label for="" class="form-label">Nama Dokter</label>
                        <input type="text" name="nama_dokter" class="form-control" placeholder="Masukan nama dokter" required>
                    </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-success" name="tambah_dokter">Save changes</button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include "layout/_footer.php"; ?>