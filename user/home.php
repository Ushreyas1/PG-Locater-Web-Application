<?php
require_once './session.php';
require_once '../db/db.php';
$user_name = $_SESSION['user_name'];
$user_id = $_SESSION['user_id'];
?>
<html>
    <head>

    </head>

    <?php require_once '../include/header.php';
    ?>

    <body style="background-image: url('../static/images/home.jpg');background-repeat: no-repeat;background-size: cover;background-position: top;">
        <nav class="navbar navbar-expand-lg navbar-dark"  style="background-color: tomato">
            <a class="navbar-brand font-weight-bold" href="book_room.php">Hello <?php echo $user_name; ?>!</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">

                    <li class="nav-item ">
                        <a class="nav-link text-white" href="book_room.php">Book</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="search_room.php">Search</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-white" data-toggle="dropdown" href="#">My Booking</a>
                        <ul class="dropdown-menu text-center">
                            <li><a class="dropdown-item" href="my_booking.php" id="navbarDropdown"  >Status</a></li>

                        </ul>
                    </li>
                    <li class="nav-item mx-2">
                        <a class="nav-link text-white" href="view_feedback.php">Feedback</a>
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
