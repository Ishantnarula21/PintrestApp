<?php session_start();
include('./common/common.php');
include('./Backend.php');
$obj = new Pintrest();

if (!empty($_REQUEST['info'])) {
    $id = $_REQUEST['info'];
    $display = $obj->Picinfo($id);
    $row = $display;
}
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
                        <div class="card mb-4 avtar-div">
                            <div class="card-body text-center">
                                <img src="./upload/<?php echo $row['imagename'] ?>" alt="avatar" class="rounded img-fluid">
                                <h5 class="my-3"><?php echo ucfirst($row['title']) ?></h5>
                                <p class="text-muted mb-1">Name: <?php echo $row['fullname'] ?></p>
                                <p class="text-muted mb-1">Username: <?php echo $row['username'] ?></p>
                                <div class="d-flex justify-content-center mb-2">
                                    <a href="Favorite.php?fav=<?php echo $row['id'] ?>" class="btn btn-outline-secondary"><i class="fa-solid fa-star"></i>Add to Favorite</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8">
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
                                        <p class="mb-0">Date Uploaded</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <p class="text-muted mb-0"><?php echo $row['date'] ?></p>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">Time Uploaded</p>
                                    </div>
                                    <div class="col-sm-9 time">
                                        <p class="text-muted mb-0"><?php echo $row['time'] ?></p><span><?php echo $row['day'] ?></span>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">Total Views</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <p class="text-muted mb-0"><?php echo $row['views'] ?></p>
                                    </div>
                                </div>
                                <hr>
                                <a role="button" class="btn btn-success" href="javascript:history.go(-1)">Go Back</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</body>

</html>