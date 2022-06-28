<?php
include "__koneksi.php";
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // PASIEN
    if (isset($_POST["tambah_pasien"])) {
        $input = (object) $_POST;
        $sql = "INSERT INTO pasien (nama_pasien, jenis_kelamin, umur) VALUES ('$input->nama_pasien', '$input->jenis_kelamin', $input->umur)";

        $query = mysqli_query($koneksi, $sql);
        $_SESSION['success'] = 'Berhasil menambah data pasien';
        header('location:pasien.php');
    } else if (isset($_POST['edit_pasien'])) {
        $input = (object) $_POST;
        $sql = "UPDATE pasien SET nama_pasien = '$input->nama_pasien', jenis_kelamin = '$input->jenis_kelamin', umur = $input->umur WHERE id_pasien = $input->id_pasien";

        $query = mysqli_query($koneksi, $sql);
        $_SESSION['success'] = 'Berhasil merubah data pasien';
        header('location:pasien.php');
    } // END PASIEN

    // DOKTER
    else if (isset($_POST['tambah_dokter'])) {
        $input = (object) $_POST;
        $sql = "INSERT INTO dokter (nama_dokter) VALUES ('$input->nama_dokter')";

        $query = mysqli_query($koneksi, $sql);
        $_SESSION['success'] = 'Berhasil menambah data Dokter';
        header('location:dokter.php');
    } else if (isset($_POST['edit_dokter'])) {
        $input = (object) $_POST;
        $sql = "UPDATE dokter SET nama_dokter = '$input->nama_dokter' WHERE id_dokter = $input->id_dokter";

        $query = mysqli_query($koneksi, $sql);
        $_SESSION['success'] = 'Berhasil merubah data dokter';
        header('location:dokter.php');
    } // END DOKTER

    // OBAT
    else if (isset($_POST['tambah_obat'])) {
        $input = (object) $_POST;
        $sql = "INSERT INTO obat (nama_obat) VALUES ('$input->nama_obat')";

        $query = mysqli_query($koneksi, $sql);
        $_SESSION['success'] = 'Berhasil menambah data Obat';
        header('location:obat.php');
    } else if (isset($_POST['edit_obat'])) {
        $input = (object) $_POST;
        $sql = "UPDATE obat SET nama_obat = '$input->nama_obat' WHERE id_obat = $input->id_obat";

        $query = mysqli_query($koneksi, $sql);
        $_SESSION['success'] = 'Berhasil merubah data Obat';
        header('location:obat.php');
    } // END OBAT

    // USER
    else if (isset($_POST["tambah_user"])) {
        $input = (object) $_POST;
        $sql = "INSERT INTO user (username, nama_lengkap, password) VALUES ('$input->username', '$input->nama_lengkap', '$input->password')";

        $query = mysqli_query($koneksi, $sql);
        $_SESSION['success'] = 'Berhasil menambah data User';
        header('location:user.php');
    } else if (isset($_POST['edit_user'])) {
        $input = (object) $_POST;
        $sql = "UPDATE user SET username = '$input->username', nama_lengkap = '$input->nama_lengkap'";
        if ($input->password != NULL) {
            $sql .= ", password = '$input->password'"; 
        }

        $sql .= " WHERE id_user = $input->id_user";

        $query = mysqli_query($koneksi, $sql);
        $_SESSION['success'] = 'Berhasil merubah data User';
        header('location:user.php');
    } // END USER

    // DELETE
} else if ($_SERVER['REQUEST_METHOD'] == "GET") {

    // PASIEN
    if (isset($_GET['id_pasien'])) {
        $id_pasien = $_GET['id_pasien'];
        $sql = "DELETE FROM pasien WHERE id_pasien = $id_pasien";
        $query = mysqli_query($koneksi, $sql);

        $_SESSION['success'] = 'Berhasil menghapus data pasien';
        header('location:pasien.php');
    }

    // DOKTER
    else if (isset($_GET['id_dokter'])) {
        $id_dokter = $_GET['id_dokter'];
        $sql = "DELETE FROM dokter WHERE id_dokter = $id_dokter";
        $query = mysqli_query($koneksi, $sql);

        $_SESSION['success'] = 'Berhasil menghapus data Dokter';
        header('location:dokter.php');
    }

    // OBAT
    else if (isset($_GET['id_obat'])) {
        $id_obat = $_GET['id_obat'];
        $sql = "DELETE FROM obat WHERE id_obat = $id_obat";
        $query = mysqli_query($koneksi, $sql);

        $_SESSION['success'] = 'Berhasil menghapus data Obat';
        header('location:obat.php');
    }

    // USER
    else if (isset($_GET['id_user'])) {
        $id_user = $_GET['id_user'];
        $sql = "DELETE FROM user WHERE id_user = $id_user";
        $query = mysqli_query($koneksi, $sql);

        $_SESSION['success'] = 'Berhasil menghapus data User';
        header('location:user.php');
    }

}
