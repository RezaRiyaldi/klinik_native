<?php
include "layout/_header.php";

$id_dokter = $_GET['id_dokter'];
$sql = "SELECT * FROM dokter WHERE id_dokter = $id_dokter";
$query = mysqli_query($koneksi, $sql);

while ($data_dokter = mysqli_fetch_array($query)) {
?>

    <div class="row m-0 mt-5">
        <div class="col-md-4 mx-auto">
            <div class="card">
                <div class="card-body">
                    <form action="__controller.php" method="post">
                        <input type="hidden" name="id_dokter" value="<?= $data_dokter['id_dokter'] ?>">
                        <div class="mb-3">
                            <label for="" class="form-label">Nama Dokter</label>
                            <input type="text" name="nama_dokter" class="form-control" placeholder="Masukan nama dokter" value="<?= $data_dokter['nama_dokter'] ?>" required>
                        </div>

                        <button type="submit" class="btn btn-warning" name="edit_dokter">Save changes</button>
                    </form>
                </div>
            </div>
        </div>

    <?php
}


include "layout/_footer.php";
