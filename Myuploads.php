<?php session_start();
include('./common/common.php');
include('./Backend.php');
$obj = new Pintrest();
if (!empty($_REQUEST['info'])) {
    $id = $_REQUEST['info'];
    $obj->Picinfo($id);
}
if (!empty($_REQUEST['did'])) {
    $id = $_REQUEST['did'];
    $obj->deletepost($id);
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
                $display = $obj->Myupload();
                while ($row = $display->fetch_assoc()) {
                ?>
                    <div class="flex-item card" style="width: 18rem;">
                        <a href="Picinfo.php?info=<?php echo $row['id'] ?>" class="streched-link">
                            <img class="card-img-top rounded" src="./upload/<?php echo $row['imagename'] ?>" alt="Card image cap">
                        </a>
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $row['title'] ?></h5>
                            <p><i class="fa-regular fa-eye"></i> <?php echo $row['views'] ?></p>
                            <a href="Upload.php?editid=<?php echo $row['id'] ?>" class="btn btn-outline-primary">Edit</a>
                            <a href="Myuploads.php?did=<?php echo $row['id'] ?>" class="btn btn-outline-danger">Delete</a>
                        </div>
                    </div>
                <?php
                }
                ?>
            </div>
        </div>
</body>

</html>