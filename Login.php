<?php session_start();
include('./common/common.php');
include('./Backend.php');
$obj = new Pintrest();

if (isset($_REQUEST['login'])) {
    $obj->Login($_POST);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>

<body>
    <div class="container-fluid">
        <?php
        include('./common/Header.php');
        ?>
        <div class="container d-flex justify-content-center form">
            <div class="col-md-6 form-border">
                <div class="col-md-12">
                    <h1 class="text-center">Login</h1>
                </div>
                <form method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="username" class="form-label">Username or Email</label>
                        <input type="text" class="form-control" id="username" name="username" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                    <input type="submit" class="btn btn-primary" name="login" value="Login" />
                    <a class="btn btn-warning" role="button" href="Login.php">Reset</a>
                    <br /><br />
                    <div class="col-md-12 text-center">
                        <a class="link" role="button" href="Forgotpass.php">Forgotten Password?</a>
                        <br />
                        <hr />
                        <a class="btn btn-success" role="button" href="Register.php">Create New Account</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>