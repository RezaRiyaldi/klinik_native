<?php include "layout/_header.php"; ?>

<div class="container">
    <h1 class="text-center my-4">Data Obat</h1>

    <?php if ($logged_in) : ?>
        <button type="button" class="btn btn-success mb-3" data-bs-toggle="modal" data-bs-target="#exampleModal">
            + Obat
        </button>
    <?php endif ?>
    <div class="table-responsive">
        <table class="table table-bordered table-hover nowrap" id="example">
            <thead>
                <tr class="text-center">
                    <th>No</th>
                    <th>Nama Obat</th>
                    <?php if ($logged_in) : ?>
                        <th>Aksi</th>
                    <?php endif ?>
                </tr>
            </thead>

            <tbody>
                <?php
                $no = 1;
                $query = "SELECT * FROM obat";
                $sql = mysqli_query($koneksi, $query);

                while ($obat = mysqli_fetch_array($sql)) {
                ?>
                    <tr>
                        <td class="text-center align-middle"><?= $no++ ?></td>
                        <td class="align-middle"><?= $obat['nama_obat'] ?></td>
                        <?php if ($logged_in) : ?>
                            <td class="text-center align-middle">
                                <a href="edit_obat.php?id_obat=<?= $obat['id_obat'] ?>" class="btn btn-warning btn-sm">Edit</a>
                                <a href="__controller.php?id_obat=<?= $obat['id_obat'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah anda yakin ingin menghapus data obat <?= $obat['nama_obat'] ?> ?')">Hapus</a>
                            </td>
                        <?php endif ?>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" data-bs-backdrop="static" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form action="__controller.php" method="POST">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Data Obat</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="" class="form-label">Nama obat</label>
                        <input type="text" name="nama_obat" class="form-control" placeholder="Masukan nama obat" required>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success" name="tambah_obat">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php include "layout/_footer.php"; ?>