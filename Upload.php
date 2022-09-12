<?php session_start();
include('./common/common.php');
include('./Backend.php');
$obj = new Pintrest();

if (isset($_REQUEST['upload'])) {
    $obj->Upload($_POST);
}
if (!empty($_REQUEST['editid'])) {
    $id = $_REQUEST['editid'];
    $row = $obj->editpost($id);
}
if (!empty($_REQUEST['update'])) {
    $obj->updaterecord($_POST);
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
                    <h1 class="text-center">Let Your Images Reach The World</h1>
                </div>
                <form method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="title" class="form-label">Image Title</label>
                        <input type="text" class="form-control" id="title" name="title" value="<?php if (!empty($row['title'])) echo $row['title'] ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="image" class="form-label">Upload Image</label>
                        <input type="file" accept=".png, .jpg, .jpeg" class="form-control" id="image" name="image" value="<?php if (!empty($row['image'])) echo $row['image'] ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="Password" class="form-label"><i class="fa-regular fa-eye"></i> Set Visibility</label>
                        <select class="form-select" aria-label="Default select example" name="visibility" value="<?php if (!empty($row['visibility'])) echo $row['visibility'] ?>" required>
                            <option selected>Visibility</option>
                            <option value="public">Public</option>
                            <option value="private ">Private</option>
                        </select>
                    </div>
                    <?php
                    if (!empty($_REQUEST['editid'])) {
                    ?>
                        <input type="submit" class="btn btn-primary" name="update" value="Update" />
                    <?php
                    } else {
                    ?>
                        <input type="submit" class="btn btn-primary" name="upload" value="Upload" />
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