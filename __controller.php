<?php
include "__koneksi.php";
session_start();
$username_session = "";

if (isset($_SESSION['userdata']['username'])) {
    $username_session = $_SESSION['userdata']['username'];
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (isset($_POST["login"])) {
        $input = (object) $_POST;
        $sql = "SELECT  * FROM user WHERE username = '$input->username'";
        $getUser = mysqli_query($koneksi, $sql);
        $data_user = mysqli_fetch_array($getUser);
        // var_dump($data_user['nama_lengkap']); die;

        if ($data_user) {
            if (password_verify($input->password, $data_user['password'])) {
                $sql = "INSERT INTO log_user (action_by, aktivitas, waktu) VALUES ('$input->username', 'Login aplikasi', NOW())";
                $query = mysqli_query($koneksi, $sql);

                $data = [
                    'username' => $data_user['username'],
                    'nama_lengkap' => $data_user['nama_lengkap'],
                    'logged_in' => TRUE
                ];

                $_SESSION['userdata'] = $data;
                $_SESSION['success'] = 'Login berhasil! Selamat datang ' . $data['username'];

                // var_dump($_SESSION['userdata']); die;
                header('location:index.php');
                exit;
            } else {
                $_SESSION['error'] = 'Password salah!';
            }
        } else {
            $_SESSION['error'] = 'Username tidak ditemukan';
        }

        header('location:login.php');
    }

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

        $username = strtolower($input->username);
        $nama_lengkap = ucwords(strtolower($input->nama_lengkap));
        $password = $input->password;
        $cpassword = $input->cpassword;

        if ($password == $cpassword) {
            $pass_hash = password_hash($password, PASSWORD_DEFAULT);

            $sql = "INSERT INTO user (username, nama_lengkap, password, added_by) VALUES ('$username', '$nama_lengkap', '$pass_hash', '$username_session')";

            $query = mysqli_query($koneksi, $sql);

            $_SESSION['success'] = 'Berhasil menambah data User';
        } else {
            $_SESSION['error'] = 'Gagal menambah data User, konfirmasi password tidak match';
        }

        header('location:user.php');
    } else if (isset($_POST['edit_user'])) {
        $input = (object) $_POST;
        $id = base64_decode($input->id_user);
        // var_dump($id); die;

        if ($input->password == $input->cpassword) {
            $sql = "UPDATE user SET username = '$input->username', nama_lengkap = '$input->nama_lengkap', update_by = '$username_session'";

            if ($input->password != NULL) {
                $pass = password_hash($input->password, PASSWORD_DEFAULT);
                $sql .= ", password = '$pass'";
            }

            $sql .= " WHERE id_user = '$id'";

            $query = mysqli_query($koneksi, $sql);
            $_SESSION['success'] = 'Berhasil merubah data User';
        } else {
            $_SESSION['error'] = 'Gagal merubah data User, konfirmasi password tidak match';
            header('location:edit_user.php?id_user=' . $input->id_user);
            exit;
        }

        header('location:user.php');
    } // END USER

    // DELETE
} else if ($_SERVER['REQUEST_METHOD'] == "GET") {

    // Logout

    if (isset($_GET['logout'])) {
        $sql = "INSERT INTO log_user (action_by, aktivitas, waktu) VALUES ('$username_session', 'Logout aplikasi', NOW())";
        $query = mysqli_query($koneksi, $sql);

        unset($_SESSION['userdata']);

        $_SESSION['success'] = 'Berhasil logout! Semoga harimu menyenangkan';

        header('location:index.php');
    }

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
        $id_user = base64_decode($_GET['id_user']);

        $sql = "SELECT  * FROM user WHERE id_user = '$id_user'";
        $query = mysqli_query($koneksi, $sql);
        $getUser = mysqli_fetch_array($query);
        $user = $getUser['username'];

        $sql = "INSERT INTO log_user (action_by, aktivitas, waktu) VALUES ('$username_session', 'Menghapus user dengan username: $user', NOW())";
        $query = mysqli_query($koneksi, $sql);
        
        $sql = "DELETE FROM user WHERE id_user = $id_user";
        $query = mysqli_query($koneksi, $sql);


        $_SESSION['success'] = 'Berhasil menghapus data User';
        header('location:user.php');
    }
}
