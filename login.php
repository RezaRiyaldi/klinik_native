<?php
include "__koneksi.php";
session_start();
$uriSegments = explode("/", parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
// var_dump($uriSegments);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Klinik</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
</head>

<body>
    <div class="mt-3">
        <?php
        if (isset($_SESSION['success'])) {
        ?>
            <div class="alert alert-primary alert-dismissible fade show container" role="alert">
                <?= $_SESSION['success'] ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php
            session_unset();
        } else if (isset($_SESSION['error'])) {
        ?>
            <div class="alert alert-danger alert-dismissible fade show container" role="alert">
                <?= $_SESSION['error'] ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php
            session_unset();
        }
        ?>
    </div>

    <div class="row">
        <div class="col-md-4 mx-auto mt-5">
            <div class="card">
                <div class="card-header">
                    <h2 class="my-2 text-center">Login</h2>
                </div>
                <div class="card-body">
                    <form action="__controller.php" method="post">
                        <div class="mb-3">
                            <label for="" class="form-label">Username</label>
                            <div class="input-group">
                                <span class="input-group-text" id="basic-addon1">@</span>
                                <input type="text" class="form-control" placeholder="Username" name="username" aria-label="Username">
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Password</label>
                            <div class="input-group">
                                <span class="input-group-text" id="basic-addon1"><i class="bi bi-key"></i></span>
                                <input type="password" class="form-control" placeholder="Password" name="password" aria-label="Username">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary" name="login">Login</button>
                    </form>
                </div>
                <div class="card-footer">
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>