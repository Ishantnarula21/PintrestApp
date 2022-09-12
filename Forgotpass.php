<?php session_start();
include('./common/common.php');
include('./Backend.php');
$obj = new Pintrest();

if (isset($_REQUEST['verify'])) {
    $obj->Verify($_POST);
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
                    <h1 class="text-center">Verify Its You</h1>
                </div>
                <form method="post">
                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" class="form-control" id="username" name="username" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <input type="submit" class="btn btn-primary" name="verify" value="Verify" />
                </form>
            </div>
        </div>
    </div>
</body>

</html>