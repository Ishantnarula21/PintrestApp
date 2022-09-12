<?php session_start();
include('./common/common.php');
include('./Backend.php');
$obj = new Pintrest();

if (!empty($_REQUEST['fav'])) {
    $fav = $_REQUEST['fav'];
    $obj->Favorite($fav);
}
if (!empty($_REQUEST['del'])) {
    $del = $_REQUEST['del'];
    $obj->RemoveFav($del);
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
        function PicClick() {
            console.log("Clicked");
        }
    </script>
</head>

<body>
    <div class="container-fluid">
        <?php
        include('./common/Header.php');
        ?>
        <div class="container">
            <div class="col-md-12 text-center">
                <h1>Favorites</h1>
            </div>
            <div class="flex-container image-display">
                <?php
                $display = $obj->Favdisplay();
                if (!empty($_SESSION['Login'])) {
                    while ($row = $display->fetch_assoc()) {
                ?>
                        <div class="flex-item card" style="width: 18rem;" onclick="PicClick()">
                            <a href="Picinfo.php?info=<?php echo $row['eid'] ?>" class="streched-link"><img class="card-img-top rounded" src="./upload/<?php echo $row['imagename'] ?>" alt="Card image cap"></a>
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $row['title'] ?></h5>
                                <a href="#" class="btn btn-outline-secondary"><i class="fa-regular fa-eye"></i> <?php echo $row['views'] ?></a>
                                <a href="Favorite.php?del=<?php echo $row['id'] ?>" class="btn btn-outline-secondary"><i class="fa-solid fa-star"></i> Remove</a>
                            </div>
                        </div>
                    <?php
                    }
                } else {
                    ?>
                    <div class="col-md-12 text-center">
                        <h4>You Need To Login First to Acess or Add Favorite Images</h4>
                        <br />
                        <a href="Login.php">Login</a> OR <a href="Register.php">Register</a>
                    </div>
                <?php
                }
                ?>
            </div>
        </div>
</body>

</html>