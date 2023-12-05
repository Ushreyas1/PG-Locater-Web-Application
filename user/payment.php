<?php
require_once '../db/db.php';
require_once './home.php';
require_once '../include/header.php';
$booking_id = $_GET['booking_id'];
$room_rate = $_GET['room_rate'];
?>
<html>
    <?php
    ?>

    <body >
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-5">
                    <div class="card my-5">
                        <div class="card-body">
                            <h3 class="text-center">Order Details</h3>

                            <form action="u_action.php" method="post" id="formProductOrder" enctype="multipart/form-data">
                                <input type="hidden" name="command" value="confirm_payment"/>
                                <input type="hidden" name="booking_id" id="booking_id" value="<?php echo $booking_id; ?>"/>
                                <input type="hidden" name="room_cost" id="room_cost" value="<?php echo $room_rate; ?>"/>



                                <div class="form-group mt-3">
                                    <input class="form-control" value="Total cost Rs.<?php echo $room_rate; ?>/-"
                                           readonly="readonly"  autocomplete="off"/>
                                </div>

                                <div class="form-group my-3">
                                    <select class="form-control" name="payment_type" id="payment_type">
                                        <option>--Choose Payment Type--</option>

                                        <option value="upi">UPI</option>
                                        <!--<option value="cod">COD</option>-->

                                    </select>
                                </div>


                                <div class="form-group">
                                    <button class="btn btn-dark btn-block" id="btnConfirmProductOrder">Confirm Pay</button>
                                </div>
                                <div class="form-group">
                                    <a id="btnPay" href="https://paytm.com/" onclick="pay_product()" target="_blank"
                                       class="btn btn-danger btn-block d-none">Pay Rs.<?php echo $room_rate; ?> /-</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php require_once '../include/footer.php'; ?>

        <script src="../static/js/payment.js" type="text/javascript"></script>



    </body></html>