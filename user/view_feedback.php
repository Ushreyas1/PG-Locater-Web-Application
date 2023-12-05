<?php
require_once './home.php';
require_once '../include/header.php';
require_once '../db/db.php';
$con = new DB();
$user_id = $_SESSION['user_id'];

$fed_sql = "SELECT DISTINCT r.room_rid,r.room_num,f.feedback,u.name,u.contact_no,f.feedback,r.photo FROM booking AS b "
        . "JOIN room AS r ON r.room_rid=b.roomId "
        . "JOIN feedback AS f ON r.room_rid=f.room_id "
        . "JOIN `user` AS u ON u.user_rid=f.user_id "
        . "WHERE b.user_id='$user_id' AND NOT f.user_id='$user_id' ORDER BY `date` DESC LIMIT 6";
//$fed_sql = "SELECT * FROM feedback AS f  "
//        . "JOIN `room` AS r ON r.room_rid=f.room_id "
//        . "JOIN `user` AS u ON u.user_rid=f.user_id "
//        . " WHERE NOT f.user_id='$user_id' AND u.is_enabled=1  ORDER BY `date` DESC LIMIT 3";
$old_feedback = $con->executeSelect($fed_sql);
?>
<html>
    <?php
    require_once './home.php';
    require_once '../include/header.php';
    ?>
    <div style="background-image: url('../static/images/home.jpg');background-repeat: no-repeat;background-size: cover;">
        <div class="text-right"><a href="./add_feedback.php" class="btn-primary mr-5 mt-3  btn btn-md">Add Feedback</a></div>

        <br>
        <div class="container" >

            <div class="row justify-content-center ">
                <?php
                if (!empty($old_feedback)) {
                    foreach ($old_feedback as $row) {
                        ?>
                        <div class="col-md-4 mb-3">
                            <div class="card text-white border-light justify-content-center">
                                <img src="../images/<?php echo "$row[photo]" ?> " style=" filter: blur(2px);" class="card-img" alt="...">
                                <div class="card-img-overlay">
                                    <h5 class="card-title">Room Num: <?php echo "$row[room_num]" ?></h5>
                                    <p class="card-text"><i class="fas fa-pen fa-md me-3 fa-fw"></i> <?php echo "$row[feedback]" ?></p>
                                    <p class="card-text"><i class="fas fa-phone fa-sm me-3 fa-fw"></i>(<?php echo "$row[name]" ?> +<?php echo "$row[contact_no]" ?>)</p>
                                </div>
                            </div>

                        </div>
                        <?php
                    }
                } else {
                    ?>
                    <div class="col-md-12 mb-3">
                        <button class=" btn-danger btn-block">No Feedback Available</button>

                    </div>
                <?php }
                ?>
            </div>
        </div>
    </div>




    <?php
    require_once '../include/footer.php';
    ?>
</html>