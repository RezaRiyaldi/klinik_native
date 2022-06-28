<?php include "layout/_header.php"; ?>

<div class="container">
    <h1 class="text-center my-4">Data User</h1>

    <button type="button" class="btn btn-success mb-3" data-bs-toggle="modal" data-bs-target="#exampleModal">
        + User
    </button>
    <table class="table table-bordered table-hover">
        <thead>
            <tr class="text-center">
                <th>No</th>
                <th>Username</th>
                <th>Nama Lengkap</th>
                <th>Password</th>
                <th>Aksi</th>
            </tr>
        </thead>

        <tbody>
            <?php
            $no = 1;
            $query = "SELECT * FROM user";
            $sql = mysqli_query($koneksi, $query);

            while ($user = mysqli_fetch_array($sql)) {
            ?>
                <tr>
                    <td class="text-center align-middle"><?= $no++ ?></td>
                    <td class="align-middle"><?= $user['username'] ?></td>
                    <td class="align-middle"><?= $user['nama_lengkap'] ?></td>
                    <td class="align-middle"><?= $user['password'] ?></td>
                    <td class="text-center align-middle">
                        <a href="edit_user.php?id_user=<?= $user['id_user'] ?>" class="btn btn-warning btn-sm">Edit</a>
                        <a href="__controller.php?id_user=<?= $user['id_user'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah anda yakin ingin menghapus data user <?= $user['nama_user'] ?> ?')">Hapus</a>
                    </td>
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
                <h5 class="modal-title" id="exampleModalLabel">Data user</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="__controller.php" method="post">
                    <div class="mb-3">
                        <label for="" class="form-label">Username</label>
                        <input type="text" name="username" class="form-control" placeholder="Masukan Username" value="<?= $data_user['username'] ?>" required>
                    </div>

                    <div class="mb-3">
                        <label for="" class="form-label">Nama Lengkap</label>
                        <input type="text" name="nama_lengkap" class="form-control" placeholder="Masukan nama lengkap" value="<?= $data_user['nama_lengkap'] ?>" required>
                    </div>

                    <div class="mb-3">
                        <label for="" class="form-label">Password</label>
                        <input type="password" name="password" class="form-control" placeholder="Masukan password">
                    </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-success" name="tambah_user">Save changes</button>
                </form>
            </div>
        </div>
    </div>
</div>
<?php include "layout/_footer.php"; ?>