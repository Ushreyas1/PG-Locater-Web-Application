<?php
require_once '../db/db.php';
require_once './home.php';
require_once '../include/header.php';
$db = new DB();

$sql = "SELECT * FROM `room` AS r JOIN `owner` AS o ON r.owner_id=o.owner_rid "
        . "WHERE is_booked='no' AND o.is_enabled=1";
$room = $db->executeSelect($sql);
?>

<html>
    <head>
        <!--<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">-->
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
        <!--<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>-->
        <link href="../static/css/card.css" type="text/css" rel="stylesheet">

    </head>

    <body style="background-image: url('http://www.webcoderskull.com/img/right-sider-banner.png');background-repeat: no-repeat;background-size: cover;background-position: top;">


        <section class=" padding-lg" style="background-image: url('http://www.webcoderskull.com/img/right-sider-banner.png');background-repeat: no-repeat;background-size: cover;background-position: top;">
            <br><br><br>
            <div class="container" >
                <div class="row">

                    <?php
                    if (!empty($room)) {
                        foreach ($room as $row) {
                            ?>
                            <div class="col-lg-4 ">
                                <div class="our-team-main rounded">

                                    <div class="team-front rounded" >
                                        <img src="../images/<?php echo "$row[photo]" ?>" class="img-fluid" />
                                        <h3> <?php echo "$row[room_type]" ?></h3>
                                        <p><strong>Rs.<?php echo "$row[room_rate]" ?></strong>/-</p>
                                        <p>Room No.<?php echo "$row[room_num]" ?></p>

                                    </div>

                                    <div class="team-back text-center mt-5" rounded>
                                        <span>
                                            <h3>Room Type:<?php echo "$row[room_type]" ?></h3>
                                            <p><strong>Rs.<?php echo "$row[room_rate]" ?></strong>/-</p>
                                            <p><strong>Room No.<?php echo "$row[room_num]" ?></strong></p>
                                            <?php echo "$row[description]" ?><br><br>
                                            <button type="button" class="btn btn-md btn-primary pl-3 my-4"  id="order_btn" name="order_btn" onclick="book_room(<?php echo "$row[room_rid]" ?>)">Book</button>
                                            <a href="view_gallery.php?room_id=<?php echo $row["room_rid"]; ?>" class="btn btn-primary btn-md pl-2 my-4">View More</a>

                                        </span>

                                    </div>

                                </div>
                            </div>

                            <?php
                        }
                    }
                    ?>


                </div><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br></section>
                <?php
                require_once '../include/footer.php';
                ?>
                <script src="../static/js/book.js" type="text/javascript"></script>
                </body>

                </html>


