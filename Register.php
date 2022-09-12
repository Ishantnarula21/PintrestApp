<?php session_start();
include('./common/common.php');
include('./Backend.php');
$obj = new Pintrest();

if (isset($_REQUEST['register'])) {
    $obj->Register($_POST);
}
if (isset($_REQUEST['updateprofile'])) {
    $obj->updateprofile($_POST);
}

if (!empty($_REQUEST['uid'])) {
    $id = $_REQUEST['uid'];
    $display = $obj->profiledisplay($id);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <script>
        function showPass() {
            var x = document.getElementById("Password");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        }
    </script>
</head>

<body>
    <div class="container-fluid">
        <?php
        include('./common/Header.php');
        ?>
        <div class="container d-flex justify-content-center form">
            <div class="col-md-6 form-border">
                <div class="col-md-12">
                    <h1 class="text-center">Registration</h1>
                </div>
                <form method="post">
                    <div class="mb-3">
                        <label for="fullname" class="form-label">Full Name</label>
                        <input type="text" class="form-control" id="fullname" name="fullname" value="<?php if (!empty($display['fullname'])) echo $display['fullname'] ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" class="form-control" id="username" name="username" value="<?php if (!empty($display['username'])) echo $display['username'] ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="Email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="Email" value="<?php if (!empty($display['email'])) echo $display['email'] ?>" name="email" required>
                    </div>
                    <div class="mb-3">
                        <label for="Email" class="form-label">Gender</label>
                        <select class="form-select" aria-label="Default select example" name="gender" value="<?php if (!empty($display['gender'])) echo $display['gender'] ?>" required>
                            <option selected>Select Gender</option>
                            <option value="male">Male</option>
                            <option value="female ">Female</option>
                        </select>
                    </div>
                    <?php
                    if (!empty($_REQUEST['uid'])) {
                    ?>
                        <input type="submit" class="btn btn-primary" name="updateprofile" value="Update Profile" />
                        <a class="btn btn-warning" role="button" href="Register.php">Reset</a>
                    <?php
                    } else {
                    ?>
                        <div class="mb-3">
                            <label for="Password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="Password" name="password" required>
                            <input type="checkbox" onclick="showPass()" id="pass" />
                            <label for="pass" class="form-label">show password</label>
                        </div>
                        <input type="submit" class="btn btn-primary" name="register" value="Register" />
                        <a class="btn btn-warning" role="button" href="Register.php">Reset</a>
                    <?php
                    }
                    ?>

                </form>
            </div>
        </div>
    </div>
</body>

</html>