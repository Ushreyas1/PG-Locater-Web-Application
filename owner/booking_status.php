<?php
require_once '../db/db.php';
require_once './home.php';
require_once '../include/header.php';
$owner_id = $_SESSION['owner_id'];

$query = "SELECT * FROM booking AS b JOIN `user` AS u ON u.user_rid=b.user_id"
        . " JOIN `room` AS r ON r.room_rid=b.roomId WHERE b.booking_status=0 AND r.owner_id='$owner_id'";
$con = new DB();
$booking = $con->executeSelect($query);
?>
<html>
    <?php
    ?>

    <body class="home">
        <br>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="text-center">
                                Booking Status
                            </h3>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered table-sm">
                                <thead>
                                    <tr class="text-center">
                                        <th>#</th>
                                        <th>User name</th>
                                        <th>Contact No.</th>
                                        <th>Room No.</th>
                                        <th>Room Price</th>
                                        <th>Photo</th>

                                        <th style="text-align: center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i = 0;
                                    foreach ($booking as $row) {
                                        ?>
                                        <tr style="text-align: center;" >
                                            <td><br><?php echo ++$i; ?></td>
                                            <td><br><?php echo "$row[name]" ?></td>
                                            <td><br><?php echo "$row[contact_no]" ?></td>
                                            <td><br><?php echo "$row[room_num]" ?></td>
                                            <td><br>Rs.<?php echo "$row[room_rate]" ?>/-</td>
                                            <td><img src=../images/<?php echo "$row[photo]" ?> class="rounded-circle" alt="photo" height="50" width="50"></td>

                                            <td>
                                                <select id="state" name="state" class="form-control alert-success mt-2" onchange="updateBookingStatus(<?php echo "$row[book_rid]" ?>,<?php echo "$(this).val()" ?>,<?php echo "$row[roomId]" ?>);">
                                                    <?php
                                                    echo '';
                                                    $booking_status = $row['booking_status'];
                                                    if ($booking_status == 0) {
                                                        ?>
                                                        <option value="0" selected>Under process</option>
                                                    <?php } else {
                                                        ?>
                                                        <option value="0">Under process</option>
                                                    <?php }
                                                    ?>
                                                    <?php if ($booking_status == 1) { ?>
                                                        <option value="1" selected>Accepted</option>
                                                    <?php } else {
                                                        ?>
                                                        <option value="1">Accepted</option>
                                                    <?php }
                                                    ?>
                                                    <?php if ($booking_status == 2) { ?>
                                                        <option value="2" selected>Rejected</option>
                                                    <?php } else {
                                                        ?>
                                                        <option value="2">Rejected</option>
                                                    <?php }
                                                    ?>

                                                </select>

                                            </td>
                                        </tr>
                                        <?php
                                    }
                                    if ($i == 0) {
                                        ?>
                                        <tr>
                                            <td colspan="100%" class="alert text-center">
                                                No records
                                            </td>
                                        </tr>
                                    <?php }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>





        <?php
        require_once '../include/footer.php';
        ?>
        <script src="../static/js/booking_status.js" type="text/javascript"></script>


    </body></html>