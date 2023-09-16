<?php
require_once './session.php';
require_once '../db/db.php';
?>
<html>
    <head>

    </head>

    <?php require_once '../include/header.php';
    ?>

    <body style="background-image: url('../static/images/f_home.jpg');background-repeat: no-repeat;background-size: cover;background-position: center;">
        <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: tomato">
            <a class="navbar-brand font-weight-bold" href="home.php">Paying Guest Information System</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">


                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-white" data-toggle="dropdown" href="#">User</a>
                        <ul class="dropdown-menu text-center">
                            <li><a class="dropdown-item" href="view_user.php" id="navbarDropdown"  >View</a></li>

                        </ul>
                    </li>


                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-white" data-toggle="dropdown" href="#">Owner</a>
                        <ul class="dropdown-menu text-center">
                            <li><a class="dropdown-item" href="view_owner.php" id="navbarDropdown"  >View</a></li>

                        </ul>
                    </li>

                    <li class="nav-item mx-2">
                        <a class="nav-link text-white" href="logout.php">Logout</a>
                    </li>
                </ul>

            </div>
        </nav>

        <?php require_once '../include/footer.php'; ?>

    </body>
</html>
