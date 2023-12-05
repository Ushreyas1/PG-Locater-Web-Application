<?php
require_once '../db/db.php';
require_once './home.php';
require_once '../include/header.php';
$db = new DB();
$owner_id = $_SESSION['owner_id'];
$sql = "SELECT * FROM `gallery` AS g JOIN `room` AS r ON g.room_id=r.room_rid WHERE ownerId='$owner_id'";
$gallery = $db->executeSelect($sql);
?>

<html>
    <head>
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">

        <link href="../static/css/card2.css" type="text/css" rel="stylesheet">

    </head><body>


        <div class="container">
            <div class="row my-3">
                <?php
                if (!empty($gallery)) {
                    foreach ($gallery as $row) {
                        ?>

                        <div class="col-md-4 my-2">

                            <div>

                                <div class="our-team-main">
                                    <div class="my-3">
                                        <img src="../images/<?php echo "$row[image]" ?>" class="img-fluid" />
                                        <h3><?php echo "$row[room_type]" ?></h3>

                                        <h6>Room No:<?php echo "$row[room_num]" ?></h6>
                                        <button type="button"  id="delete_btn" class="btn px-3 btn-sm btn-primary"
                                                onclick="delete_gallery(<?php echo $row["gallery_rid"]; ?>);">Delete</button></td>

                                    </div>
                                </div>

                            </div>

                        </div>


                        <?php
                    }
                }
                ?>

            </div>
        </div>
        <?php
        require_once '../include/footer.php';
        ?>
<!--<script src="../static/js/order_product.js" type="text/javascript"></script>-->

    </body>
</html>