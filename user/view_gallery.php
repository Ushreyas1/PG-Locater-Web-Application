<?php
require_once './home.php';
require_once '../include/header.php';
require_once '../db/db.php';
$con = new DB();

$room_id = $_GET['room_id'];


$sql = "SELECT * FROM gallery AS g JOIN room AS r ON r.room_rid=g.room_id WHERE g.room_id='$room_id'";
$gallery_data = $con->executeSelect($sql);
?>
<html>
    <?php
    require_once './home.php';
    require_once '../include/header.php';
    ?>

    <div style="background-image: url('../static/images/home.jpg');background-repeat: no-repeat;background-size: cover;">

        <br>
        <div class="container" >

            <div class="row justify-content-center ">
                <?php
                if (!empty($gallery_data)) {
                    foreach ($gallery_data as $row) {
                        ?>
                        <div class="col-md-4 mb-3">

                            <div class="card" style="width: 23rem;">
                                <img src="../images/<?php echo "$row[image]" ?> " class="card-img-top" style="height: 50%;" alt="product image">
                                <div class="card-body align-middle text-center">


                                    <h6><p class="card-text">Room Num: <?php echo "$row[room_num]" ?></p></h6>


                                </div>
                            </div>
                        </div>
                        <?php
                    }
                }
                ?>
            </div>
        </div>
    </div>




    <?php
    require_once '../include/footer.php';
    ?>
</html>