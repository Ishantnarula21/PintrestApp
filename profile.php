<?php session_start();
include('./common/common.php');
include('./Backend.php');
$obj = new Pintrest();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div class="container-fluid">
        <?php
        include('./common/Header.php');
        ?>
        <section>
            <div class="container py-5">

                <div class="row">
                    <div class="col-lg-4 ">
                        <?php
                        if (!empty($_SESSION['Login'])) {
                            $display = $obj->userdisplay();
                            $male = "avtar-male.png";
                            $female = "women-avtar.png";
                            $gender = "male";
                            while ($row = $display->fetch_assoc()) {
                        ?>
                                <div class="card mb-4 avtar-div">
                                    <div class="card-body text-center">
                                        <img class="rounded-circle img-fluid" style="width: 150px;" src="./images/<?php echo ($row['gender'] == $gender) ? $male : $female  ?>" alt="avatar">
                                        <h5 class="text-muted mb-1">Username: <?php echo $row['username'] ?></h5>
                                        <div class="d-flex justify-content-center mb-2">
                                            <a role="button" class="btn btn-outline-primary ms-1" href="index.php?log=1">Sign Out</a>
                                            <a role="button" class="btn btn-outline-primary ms-1" href="Forgotpass.php">Change Password</a>
                                        </div>
                                    </div>
                                </div>
                        <?php
                            }
                        }
                        ?>
                    </div>
                    <div class="col-lg-8">
                        <?php
                        if (!empty($_SESSION['Login'])) {
                            $display = $obj->userdisplay();
                            while ($row = $display->fetch_assoc()) {
                        ?>
                                <div class="card mb-4">
                                    <div class="card-body avtar-div">
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <p class="mb-0">Full Name</p>
                                            </div>
                                            <div class="col-sm-9">
                                                <p class="text-muted mb-0"><?php echo $row['fullname'] ?></p>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <p class="mb-0">Gender</p>
                                            </div>
                                            <div class="col-sm-9">
                                                <p class="text-muted mb-0"><?php echo ucfirst($row['gender']) ?></p>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <p class="mb-0">Email</p>
                                            </div>
                                            <div class="col-sm-9">
                                                <p class="text-muted mb-0"><?php echo $row['email'] ?></p>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <p class="mb-0">Total Uploads</p>
                                            </div>
                                            <div class="col-sm-9">
                                                <p class="text-muted mb-0">
                                                    <?php
                                                    $count = $obj->uploadcount();
                                                    echo $count;
                                                    ?>
                                                </p>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <p class="mb-0">Total Views</p>
                                            </div>
                                            <div class="col-sm-9">
                                                <p class="text-muted mb-0"><?php $a = 0;
                                                                            $result = $obj->totalviews();
                                                                            while ($count = $result->fetch_assoc()) {
                                                                                $a = $a + $count['views'];
                                                                            }
                                                                            echo $a;
                                                                            ?>
                                            </div>
                                        </div>
                                        <hr>
                                        <a type="button" class="btn btn-warning u-profile" href="Register.php?uid=<?php echo $row['username'] ?>">Update Profile</a>
                                    </div>
                                </div>
                        <?php
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
        </section>
    </div>
</body>

</html>