<?php
require_once './session.php';
require_once '../db/db.php';
$user_name = $_SESSION['user_name'];
$user_id = $_SESSION['user_id'];
$db = new DB();

$boking_sql = "SELECT * FROM booking AS b JOIN `user` AS u ON u.user_rid=b.user_id "
        . "JOIN `room` AS r ON r.room_rid=b.roomId "
        . " ORDER BY book_rid DESC LIMIT 1";
$latest_booking = $db->executeSelect($boking_sql);

$gallery_sql = "SELECT * FROM booking AS b JOIN `user` AS u ON u.user_rid=b.user_id"
        . " JOIN `room` AS r ON r.room_rid=b.roomId ";
$latest_gallery = $db->executeSelect($gallery_sql);

$feed_sql = "SELECT * FROM booking AS b JOIN `user` AS u ON u.user_rid=b.user_id"
        . " JOIN `room` AS r ON r.room_rid=b.roomId ";
$latest_feedback = $db->executeSelect($feed_sql);
?>
<html>


    <?php
    require_once '../include/header.php';
    require_once './home.php';
    ?>

    <div class="container-fluid" style="background-image: url('../static/images/a_home.jpg');background-repeat: no-repeat;background-size: cover;background-position: center;">

        <div class="row justify-content-center mx-5 rounded">
            <?php
            if (!empty($latest_booking)) {
                foreach ($latest_booking as $row) {
                    ?>
                    <div class="col-md-4  mt-5 ">

                        <div class="card " style="width: 23rem;">
                            <div class="card-header bg-danger">
                                <h5 class="text-white">  Latest Bookings</h5>
                            </div>
                            <img src="../images/<?php echo "$row[photo]" ?> " class="card-img-top" style="height: 50%;" alt="product image">
                            <div class="card-body  text-left">

                                <span> <h5 class="card-title text-center"> <?php echo "$row[name]" ?> </h5>
                                    Contact Number: <?php echo "$row[contact_no]" ?><br>
                                    Room Type: <?php echo "$row[room_type]" ?>
                                    <h6>Price: Rs.<?php echo "$row[room_rate]" ?>/-</p></h6></span>

                                <a href="./view_booking.php" class="">View More...</a>

                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                <!--                                    <button type="button" id="order_btn" class="btn-primary btn-sm px-4 my-1" onclick="make_order(<?php // echo "$row[cart_id]"                                                                    ?>);">Order</button>-->

                            </div>
                        </div>
                    </div>
                    <?php
                }
            }
            ?>

            <div class="col-md-4 mt-5">

                <div class="card  border-light" style="width: 23rem;">
                    <div class="card-header bg-success">
                        <h5 class="text-white">  Latest Bookings</h5>
                    </div>
                    <div class="about-box">

                        <div class="card-body titlepage">
                            <h3>About Us</h3>
                            <span>It is a long established fact that a reader
                                will be distracted by the readable content of a page
                                when looking at its layout.
                                The point of using Lorem Ipsum is that it has a more-or-less normal
                                distribution of letters,   It is a long established fact that a reader will be distracted by the readable
                                content of a page when looking at its layout. </span>
                            <div >
                                <a  href="./index.php">Read More</a>
                            </div>

                        </div>
                        <div class="card-footer">

                            <span>Demo Store .New York  United States</span>
                            <p>(+71 98765348)</p>
                        </div>
                    </div></div>


            </div>

            <div class="col-md-4 mt-5">

                <div class="card  border-light" style="width: 23rem;">
                    <div class="about-box">

                        <div class="card-body titlepage">
                            <h3>About Us</h3>
                            <span>It is a long established fact that a reader
                                will be distracted by the readable content of a page
                                when looking at its layout.
                                The point of using Lorem Ipsum is that it has a more-or-less normal
                                distribution of letters,   It is a long established fact that a reader will be distracted by the readable
                                content of a page when looking at its layout. </span>
                            <div >
                                <a  href="./index.php">Read More</a>
                            </div>

                        </div>
                        <div class="card-footer">

                            <span>Demo Store .New York  United States</span>
                            <p>(+71 98765348)</p>
                        </div>
                    </div></div>


            </div>
        </div>
    </div>
    <?php require_once '../include/footer.php'; ?>
