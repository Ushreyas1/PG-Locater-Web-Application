<?php
require_once './session.php';
require_once '../db/db.php';
$owner_name = $_SESSION['owner_name'];
$owner_id = $_SESSION['owner_id'];
$db = new DB();

$sql = "SELECT * FROM `room` WHERE owner_id='$owner_id'";
$room = $db->executeSelect($sql);
?>
<html>
    <head>

    </head>

    <?php require_once '../include/header.php';
    ?>

    <body style="background-image: url('../static/images/index.jpg');background-repeat: no-repeat;background-size: cover;background-position: center;">
        <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: tomato;">
            <a class="navbar-brand font-weight-bold" href="home2.php">Hello <?php echo $owner_name; ?>!</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-white" data-toggle="dropdown" href="#">Room</a>
                        <ul class="dropdown-menu text-center">
                            <li><a class="dropdown-item" href="add_room.php" id="navbarDropdown"  >Add</a></li>
                            <li><a class="dropdown-item" href="view_room.php" id="navbarDropdown"  >View</a></li>

                        </ul>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-white" data-toggle="dropdown" href="#">Gallery</a>
                        <ul class="dropdown-menu text-center">
                            <a class="dropdown-item" href="#" id="navbarDropdown" data-toggle="modal" data-target="#modalGallery">Upload</a>
                            <li><a class="dropdown-item" href="view_gallery.php" id="navbarDropdown"  >View</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-white" data-toggle="dropdown" href="#">Booking</a>
                        <ul class="dropdown-menu text-center">
                            <li><a class="dropdown-item" href="booking_status.php" id="navbarDropdown"  >Status</a></li>
                            <li><a class="dropdown-item" href="view_booking.php" id="navbarDropdown"  >View</a></li>

                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-white" data-toggle="dropdown" href="#">Feedback</a>
                        <ul class="dropdown-menu text-center">
                            <li><a class="dropdown-item" href="view_feedback.php" id="navbarDropdown"  >View</a></li>

                        </ul>
                    </li>
                    <li class="nav-item mx-2">
                        <a class="nav-link text-white" href="logout.php">Logout</a>
                    </li>
                </ul>

            </div>
        </nav>

        <!--image upload modal for gallery-->
        <div id="modalGallery" class="modal" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content" >
                    <div class="modal-header">
                        <h4 class="modal-title">Gallery</h4>
                        <button class="close" type="button" data-dismiss="modal">&times;</button>

                    </div>
                    <div class="modal-body">
                        <form action="o_action.php" accept-charset="" enctype="multipart/form-data" method="post" id="formAddGallery">
                            <input type="hidden" name="command" id="command" value="addGallery"/>
                            <div class="form-group">
                                <label for="room_number" class="form-label mt-2" >Room Number</label>
                                <select class="form-control" name="room_number" id="room_number">
                                    <option>--Select room number--</option>

                                    <?php foreach ($room as $row) { ?>

                                        <option value="<?php echo $row['room_rid']; ?>"><?php echo $row['room_num']; ?></option>

                                    <?php }
                                    ?>
                                </select>
                            </div>
                            <label>Choose imageFile</label>
                            <div class="form-group">
                                <input type="file" name="gallery_image" id="gallery_image"/>
                            </div>
                            <div class="form-group text-right">
                                <button type="submit" id="btnAddGallery"
                                        class="btn btn-dark btn-block" name="btnAddGallery">
                                    Add
                                </button>
                            </div>
                        </form>
                    </div>
                </div></div></div>

        <?php require_once '../include/footer.php'; ?>
        <script src="../static/js/upload.js" type="text/javascript"></script>
    </body>
</html>
