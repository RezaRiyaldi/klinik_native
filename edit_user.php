<?php
include "layout/_header.php";

$id_user = $_GET['id_user'];
$sql = "SELECT * FROM user WHERE id_user = $id_user";
$query = mysqli_query($koneksi, $sql);

while ($data_user = mysqli_fetch_array($query)) {
?>

    <div class="row m-0 mt-5">
        <div class="col-md-4 mx-auto">
            <div class="card">
                <div class="card-body">
                    <form action="__controller.php" method="post">
                        <input type="hidden" name="id_user" value="<?= $data_user['id_user'] ?>">
                        <div class="mb-3">
                            <label for="" class="form-label">Username</label>
                            <input type="text" name="username" class="form-control" placeholder="Masukan Username" value="<?= $data_user['username'] ?>" required>
                        </div>

                        <div class="mb-3">
                            <label for="" class="form-label">Nama Lengkap</label>
                            <input type="text" name="nama_lengkap" class="form-control" placeholder="Masukan nama lengkap" value="<?= $data_user['nama_lengkap'] ?>" required>
                        </div>

                        <div class="mb-3">
                            <label for="" class="form-label">Password Baru</label>
                            <input type="password" name="password" class="form-control" placeholder="Masukan password baru jika ingin merubahnya">
                        </div>

                        <button type="submit" class="btn btn-warning" name="edit_user">Save changes</button>
                    </form>
                </div>
            </div>
        </div>

    <?php
}


include "layout/_footer.php";
