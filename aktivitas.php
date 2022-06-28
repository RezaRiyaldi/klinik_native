<?php include "layout/_header.php" ?>

<div class="container">
    <h1 class="text-center my-4">Log Aktivitas</h1>

    <table class="table table-bordered table-hover" id="example">
        <thead>
            <tr>
                <th>No</th>
                <th>Aktivitas</th>
                <th>Waktu</th>
            </tr>
        </thead>

        <tbody>
            <?php
            $no = 1;
            $username = $_SESSION['userdata']['username'];
            $sql = "SELECT * FROM log_user WHERE action_by = '$username' ";
            $sql .= "ORDER BY waktu DESC";
            $query = mysqli_query($koneksi, $sql);

            while ($log = mysqli_fetch_array($query)) {
            ?>

                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $log['aktivitas'] ?></td>
                    <td><?= $log['waktu'] ?></td>
                </tr>

            <?php } ?>
        </tbody>
    </table>
</div>
<?php include "layout/_footer.php" ?>