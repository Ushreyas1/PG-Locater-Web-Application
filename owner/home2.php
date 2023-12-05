<?php
require_once './session.php';
require_once '../db/db.php';
$owner_name = $_SESSION['owner_name'];
$owner_id = $_SESSION['owner_id'];
$db = new DB();

$boking_sql = "SELECT * FROM booking AS b JOIN `user` AS u ON u.user_rid=b.user_id "
        . "JOIN `room` AS r ON r.room_rid=b.roomId WHERE r.owner_id='$owner_id'"
        . " ORDER BY book_rid DESC LIMIT 1";
$latest_booking = $db->executeSelect($boking_sql);

$gallery_sql = "SELECT * FROM `gallery` AS g JOIN `room` AS r ON g.room_id=r.room_rid "
        . "WHERE ownerId='$owner_id' ORDER BY gallery_rid DESC LIMIT 1";
$latest_gallery = $db->executeSelect($gallery_sql);

$feed_sql = "SELECT * FROM feedback AS f JOIN `user` AS u ON f.user_id=u.user_rid"
        . " JOIN `room` AS r ON r.room_rid=f.room_id WHERE r.owner_id='$owner_id' ORDER BY feedback_id DESC LIMIT 1";
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
                                <h5 class="text-white">Latest Bookings</h5>
                            </div>
                            <img src="../images/<?php echo "$row[photo]" ?> " class="card-img-top" style="height: 50%;" alt="product image">
                            <div class="card-body  text-left">

                                <span><div style="font-size: 18px;font-weight: bold"><i class="fas fa-user fa-lg me-3 fa-fw"></i> <?php echo "$row[name]" ?></div>
                                    Contact Number: <?php echo "$row[contact_no]" ?><br>
                                    Room No.: <?php echo "$row[room_num]" ?>
                                    <h6>Price: Rs.<?php echo "$row[room_rate]" ?>/-</p></h6></span>

                                <a href="./view_booking.php">View More...</a>

                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                <!--                                    <button type="button" id="order_btn" class="btn-primary btn-sm px-4 my-1" onclick="make_order(<?php // echo "$row[cart_id]"                                                                                                                          ?>);">Order</button>-->

                            </div>
                        </div>
                    </div>
                    <?php
                }
            }
            ?>
            <?php
            if (!empty($latest_feedback)) {
                foreach ($latest_feedback as $row) {
                    ?>
                    <div class="col-md-4 mt-5">

                        <div class="card  border-light" style="width: 23rem;">
                            <div class="card-header bg-success">
                                <h5 class="text-white">Latest Feedbacks</h5>
                            </div>
                            <div class="about-box">

                                <div class="card-body titlepage">

                                    <span><?php echo "$row[feedback]" ?></span>
                                    <div >
                                        <a  href="./view_feedback.php">Read More</a>
                                    </div>

                                </div>
                                <div class="card-footer">

                                    <span><i class="fas fa-user fa-lg me-3 fa-fw"></i><?php echo "$row[name]" ?></span>
                                    <p><i class="fas fa-phone fa-sm me-3 fa-fw"></i>(+<?php echo "$row[contact_no]" ?>)<br>
                                        <i class="fas  fa-address-card fa-sm me-3 fa-fw"></i>      <?php echo "$row[address]" ?></p>

                                </div>
                            </div></div>


                    </div>
                    <?php
                }
            }
            ?>
            <?php
            if (!empty($latest_gallery)) {
                foreach ($latest_gallery as $row) {
                    ?>
                    <div class="col-md-4  mt-5 ">

                        <div class="card " style="width: 23rem;">
                            <div class="card-header bg-primary">
                                <h5 class="text-white">Latest Gallery</h5>
                            </div>
                            <img src="../images/<?php echo "$row[image]" ?> " class="card-img-top" style="height: 50%;" alt="product image">
                            <div class="card-body  text-left">

                                <span>
                                    Room Type: <?php echo "$row[room_type]" ?>
                                    <h6><p>Room Num: <?php echo "$row[room_num]" ?></p></h6></span>
                                <a href="./view_gallery.php">View More...</a>

                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                <!--                                    <button type="button" id="order_btn" class="btn-primary btn-sm px-4 my-1" onclick="make_order(<?php // echo "$row[cart_id]"                                                                                                                          ?>);">Order</button>-->

                            </div>
                        </div>
                    </div>
                    <?php
                }
            }
            ?>
        </div>
    </div>
    <?php require_once '../include/footer.php'; ?>
