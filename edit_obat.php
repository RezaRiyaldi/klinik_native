<?php
include "layout/_header.php";

$id_obat = $_GET['id_obat'];
$sql = "SELECT * FROM obat WHERE id_obat = $id_obat";
$query = mysqli_query($koneksi, $sql);

while ($data_obat = mysqli_fetch_array($query)) {
?>

    <div class="row m-0 mt-5">
        <div class="col-md-4 mx-auto">
            <div class="card">
                <div class="card-body">
                    <form action="__controller.php" method="post">
                        <input type="hidden" name="id_obat" value="<?= $data_obat['id_obat'] ?>">
                        <div class="mb-3">
                            <label for="" class="form-label">Nama obat</label>
                            <input type="text" name="nama_obat" class="form-control" placeholder="Masukan nama obat" value="<?= $data_obat['nama_obat'] ?>" required>
                        </div>

                        <button type="submit" class="btn btn-warning" name="edit_obat">Save changes</button>
                    </form>
                </div>
            </div>
        </div>

    <?php
}


include "layout/_footer.php";
