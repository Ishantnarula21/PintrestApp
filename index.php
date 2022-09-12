<?php session_start();
include('./common/common.php');
include('./Backend.php');
$obj = new Pintrest();
if (!empty($_REQUEST['log'])) {
    session_destroy();
    header('Location:index.php');
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
        <div class="container">
            <div class="flex-container image-display">
                <?php
                $display = $obj->display();
                while ($row = $display->fetch_assoc()) {
                ?>
                    <div class="flex-item card" style="width: 18rem;">
                        <a href="Picinfo.php?info=<?php echo $row['id'] ?>" class="streched-link">
                            <img class="card-img-top rounded" src="./upload/<?php echo $row['imagename'] ?>" alt="Card image cap">
                        </a>
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $row['title'] ?></h5>
                            <a href="#" class="btn btn-outline-secondary"><i class="fa-regular fa-eye"></i> <?php echo $row['views'] ?></a>
                            <a href="Favorite.php?fav=<?php echo $row['id'] ?>" class="btn btn-outline-secondary"><i class="fa-solid fa-star"></i>Add to Favorite</a>
                        </div>
                    </div>
                <?php
                }
                ?>
            </div>
        </div>
</body>

</html>