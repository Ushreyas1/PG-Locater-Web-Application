<?php
require_once '../db/db.php';
require_once './home.php';
require_once '../include/header.php';
$owner_id = $_SESSION['owner_id'];

$query = "SELECT * FROM booking AS b JOIN `user` AS u ON u.user_rid=b.user_id"
        . " JOIN `room` AS r ON r.room_rid=b.roomId WHERE r.owner_id='$owner_id'";
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
                                Booking List
                            </h3>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered table-sm">
                                <thead>
                                    <tr class="text-center">
                                        <th>#</th>
                                        <th>User</th>
                                        <th>Contact No.</th>
                                        <th>Room No.</th>
                                        <th>Room Price</th>
                                        <th>Photo</th>
                                        <th>Payment</th>
                                        <th>Booking Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i = 0;
                                    foreach ($booking as $row) {
                                        ?>
                                        <tr style="text-align: center;" >
                                            <td><?php echo ++$i; ?></td>
                                            <td><?php echo "$row[name]" ?></td>
                                            <td><?php echo "$row[contact_no]" ?></td>
                                            <td><?php echo "$row[room_num]" ?> </td>
                                            <td>Rs.<?php echo "$row[room_rate]" ?>/-</td>
                                            <td><img src=../images/<?php echo "$row[photo]" ?> class="rounded-circle" alt="photo" height="50" width="50"></td>
                                            <?php
                                            $payment = $row['is_paid'];
                                            $check_vacate = $row['is_vacate'];
                                            echo '';
                                            $booking_status = $row['booking_status'];
                                            if ($booking_status == 0) {
                                                ?>
                                                <td style="color: #000"><h6 class="mt-2">------</h6></td>
                                                <td style="color: #6633ff"><h6 class="mt-2">Under Process</h6></td>
                                                <td style="color: #000"><h6 class="mt-2">------</h6></td>


                                            <?php } else if ($booking_status == 1) {
                                                ?>

                                                <?php
                                                if ($payment == 'no') {
                                                    ?>
                                                    <td><button type="button" class="btn-danger btn-sm ml-3  px-2 mt-1" disabled >Not Paid</button></td>
                                                    <?php
                                                } else {
                                                    ?>

                                                    <td><button type="button" class="btn-success btn-sm ml-3 px-4 mt-1" disabled>Paid</button></td>
                                                <?php }
                                                ?>
                                                <td style="color: #00cc00"><h6 class="mt-2">Accepted</h6></td>
                                                <?php
                                                if ($check_vacate == 0) {
                                                    ?>
                                                    <td><button type="button" class="btn btn-primary btn-sm ml-3 mt-1 px-3" id="btn_vacate" onclick="vacate_booking(<?php echo "$row[book_rid]" ?>,<?php echo "$row[roomId]" ?>);">Vacate</button></td>
                                                <?php } else {
                                                    ?>
                                                    <td><button type="button" class="btn btn-primary btn-sm ml-3 mt-1 px-3" disabled>Vacate</button></td>

                                                    <?php
                                                }
                                            } else {
                                                ?>
                                                <td style="color: #000"><h6 class="mt-2">------</h6></td>
                                                <td style="color: #ff0000"><h6 class="mt-2">Rejected</h6></td>
                                                <td style="color: #000"><h6 class="mt-2">------</h6></td>
                                            <?php }
                                            ?>

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
        <script src="../static/js/room.js" type="text/javascript"></script>


    </body></html>