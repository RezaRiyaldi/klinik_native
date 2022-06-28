<?php
include "layout/_header.php";

$id_pasien = $_GET['id_pasien'];
$sql = "SELECT * FROM pasien WHERE id_pasien = $id_pasien";
$query = mysqli_query($koneksi, $sql);

while ($data_pasien = mysqli_fetch_array($query)) {
?>

    <div class="row m-0 mt-5">
        <div class="col-md-4 mx-auto">
            <div class="card">
                <div class="card-body">
                    <form action="__controller.php" method="post">
                        <input type="hidden" name="id_pasien" value="<?= $data_pasien['id_pasien'] ?>">
                        <div class="mb-3">
                            <label for="" class="form-label">Nama Pasien</label>
                            <input type="text" name="nama_pasien" class="form-control" placeholder="Masukan nama pasien" value="<?= $data_pasien['nama_pasien'] ?>" required>
                        </div>

                        <div class="mb-3">
                            <label for="" class="form-label">Jenis Kelamin</label>
                            <select name="jenis_kelamin" id="" class="form-select" required>
                                <option value="">Pilih Jenis Kelamin</option>
                                <option value="L" <?= $data_pasien['jenis_kelamin'] == 'L' ? 'selected' : '' ?>>Laki - laki</option>
                                <option value="P" <?= $data_pasien['jenis_kelamin'] == 'P' ? 'selected' : '' ?>>Perempuan</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="" class="form-label">Umur Pasien</label>
                            <input type="number" name="umur" class="form-control" placeholder="Masukan umur pasien" maxlength="99" value="<?= $data_pasien['umur'] ?>" required>
                        </div>

                        <button type="submit" class="btn btn-warning" name="edit_pasien">Save changes</button>
                    </form>
                </div>
            </div>
        </div>

    <?php
}


include "layout/_footer.php";
