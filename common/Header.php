<?php
include('common.php');
?>
<nav class="navbar navbar-expand-lg">
    <div class="container-fluid">
        <a class="navbar-brand" href="#"><img class="logo" src="./images/logo.png" /></a>
        <div class="navbar-fluid">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="btn btn-outline-secondary" aria-current="page" href="index.php"><i class="fa-solid fa-house"></i> Home</a>
                </li>
                <li class="nav-item">
                    <a class="btn btn-outline-secondary" aria-current="page" href="Favorite.php"><i class="fa-solid fa-star"></i> Favorite</a>
                </li>
                <li class="nav-item">
                    <a class="btn btn-outline-secondary" aria-current="page" href="Upload.php"><i class="fa-solid fa-upload"></i> Upload Images</a>
                </li>
            </ul>
        </div>
        <div class="user-details">
            <h4><?php if (!empty($_SESSION['Login'])) echo ucfirst($_SESSION['Login']) ?></h4>
            <ul class="left">
                <li class="nav-item dropdown dropdown-user">
                    <a class="link dropdown-toggle user" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa-solid fa-user fa-2x"></i></a>
                    <?php
                    if (!empty($_SESSION['Login'])) {
                    ?>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="profile.php">My Profile <i class="fa-solid fa-user"></i></a></li>
                            <li><a class="dropdown-item" href="Myuploads.php">My Uploads <i class="fa-solid fa-upload f-black"></i></a></li>
                        </ul>
                    <?php
                    } else {
                    ?>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="Login.php">Existing User (Login)</a></li>
                            <li><a class="dropdown-item" href="Register.php">New User (Register)</a></li>
                        </ul>
                    <?php
                    }
                    ?>
                </li>
            </ul>
        </div>
    </div>
</nav>