<?php
require_once '../db/db.php';
require_once './home.php';
require_once '../include/header.php';
$user_id = $_SESSION['user_id'];
$query = "SELECT * FROM booking AS b JOIN room AS r ON r.room_rid=b.roomId JOIN `owner` AS o ON o.owner_rid=r.owner_id WHERE b.user_id='$user_id' ";
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
                                My Booking
                            </h3>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered table-sm">
                                <thead>
                                    <tr class="text-center">
                                        <th>#</th>
                                        <th>Room Type</th>
                                        <th>Room No.</th>
                                        <th>Price</th>
                                        <th>Owner Name</th>
                                        <th>Contact Num</th>
                                        <th>Photo</th>
                                        <th>Status</th>
                                        <th style="text-align: center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i = 0;
                                    foreach ($booking as $row) {
                                        ?>
                                        <tr style="text-align: center;">
                                            <td><br><?php echo ++$i; ?></td>
                                            <td><br><?php echo "$row[room_type]" ?></td>
                                            <td><br><?php echo "$row[room_num]" ?> </td>
                                            <td><br>Rs.<?php echo "$row[room_rate]" ?> /-</td>
                                            <td><br><?php echo "$row[name]" ?></td>
                                            <td><br><?php echo "$row[contact_no]" ?></td>

                                            <td><img src=../images/<?php echo "$row[photo]" ?> class="rounded-circle" alt="photo" height="65" width="65"></td>
                                            <?php
                                            $booking_status = $row['booking_status'];
                                            $state = $row['is_paid'];
                                            if ($booking_status == '1') {
                                                ?>
                                                <td style="color: #00cc00"><br>Accepted</td>
                                                <?php if ($state == 'no') {
                                                    ?>
                                                    <td>
                                                        <a href="payment.php?booking_id=<?php echo $row["book_rid"]; ?>&&room_rate=<?php echo $row["room_rate"]; ?>"
                                                           class=" btn btn-primary btn-sm mt-3 px-4">Pay</a>
                                                           <?php
                                                       } else {
                                                           ?>

                                                    <td><button type="button" class="btn-success btn-sm ml-3 px-4 mt-3" disabled>Paid</button></td>
                                                    <?php
                                                }
                                            } else if ($booking_status == '2') {
                                                ?>
                                                <td style="color: #ff0000"><br><h6>Rejected</h6></td>
                                                <td><br>-------</td>
                                            <?php } else { ?>
                                                <td style="color: #6633ff"><br><h6>Under Process</h6></td>
                                                <td><button type="button" class="btn btn-primary btn-sm ml-3 px-4 mt-3" disabled>Pay</button></td>
                                            <?php } ?>

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


    </body></html>