<?php session_start();
include('./common/common.php');
include('./Backend.php');
$obj = new Pintrest();

if (empty($_SESSION['verify'])) {
?>
    <script>
        alert("First Verify Its You");
        window.location.href = 'Forgotpass.php';
    </script>
<?php
}

if (!empty($_REQUEST['createpass'])) {
    $obj->Createpass($_POST);
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
                        <label for="pass" class="form-label">New Password</label>
                        <input type="text" class="form-control" id="pass" name="pass" required>
                    </div>
                    <div class="mb-3">
                        <label for="newpass" class="form-label">Confirm New Password</label>
                        <input type="password" class="form-control" id="newpass" name="newpass" required>
                    </div>
                    <input type="submit" class="btn btn-primary" name="createpass" value="Create New Password" />
                </form>
            </div>
        </div>
    </div>
</body>

</html>