<?php

require_once './Response.php';
require_once './../db/db.php';
require_once './session.php';
$con = new DB();
$response = new Response();

try {

    if (isset($_POST['command'])) {
        $command = $_POST['command'];
        if ('bookRoom' == $command) {
            $room_id = $_POST['room_id'];
            $user_id = $_SESSION['user_id'];
            $date = date("Y-m-d");


//            $query = "SELECT * FROM `booking` WHERE roomId='$room_id' AND is_vacate=0";
//            $result = $con->executeSelect($query);
//            if (empty($result)) {
            $sql = "INSERT INTO `booking`(user_id,roomId,booked_date) VALUES('$user_id','$room_id','$date')";
            $res = $con->executeInsertAndGetId($sql);

            if ($res > 0) {
                $sql1 = "UPDATE `room` SET is_booked='yes' WHERE room_rid='$room_id'";
                $updateRoom = $con->executeUpdate($sql1);
                $response->success("Completed successfully...");
            } else {
                throw new Exception("Something went wrong...");
            }
//            } else {
//                $response->error("Room is already booked...");
//            }
        } else if ('confirm_payment' == $command) {
            $booking_id = $_POST['booking_id'];
            $payment_type = $_POST['payment_type'];
            $user_id = $_SESSION['user_id'];
            $date = date("Y-m-d");
            if ($payment_type == 'upi') {
                $sql = "UPDATE `booking` SET payment_type='$payment_type' "
                        . " WHERE book_rid='$booking_id'";
                $res = $con->executeUpdate($sql);

                if ($res > 0) {

                    $val = array($payment_type);
                    $response->success($val);
                } else {
                    throw new Exception("Something went wrong...");
                }
            } else {
                $sql = "UPDATE `booking` SET payment_type='$payment_type',is_paid='yes' "
                        . " WHERE book_rid='$booking_id'";
                $res = $con->executeUpdate($sql);

                if ($res > 0) {

                    $val = array($payment_type);
                    $response->success($val);
                } else {
                    throw new Exception("Something went wrong...");
                }
            }
        } else if ('payment' == $command) {
            $booking_id = $_POST['book_rid'];
            $user_id = $_SESSION['user_id'];

            $sql = "UPDATE `booking` SET is_paid='yes' WHERE book_rid='$booking_id'";
            $res = $con->executeUpdate($sql);

            if ($res > 0) {
                $response->success("Completed successfully...");
            } else {
                throw new Exception("Something went wrong...");
            }
        } elseif ('addFeedback' == $command) {
            $room_id = $_POST['room_id'];
            $feedback_details = $con->escapeString($_POST['feedback_details']);
            $user_id = $_SESSION['user_id'];
            $date = date("Y-m-d");
            $sql = "INSERT INTO feedback(user_id,room_id,feedback,date) VALUES('$user_id','$room_id','$feedback_details','$date')";
            $res = $con->executeInsertAndGetId($sql);

            if ($res > 0) {
                $response->success("Completed successfully...");
            } else {
                throw new Exception("Something went wrong...");
            }
        }
    } else if (isset($_GET['command'])) {
        $command = $_GET['command'];
        if ('get_val' == $command) {
            $query = "SELECT * FROM room WHERE room_type LIKE '{$_GET['search']}%' LIMIT 3";
            $res = $con->executeSelect($query);

            if ($res > 0) {
                $response->success($res);
            } else {
                throw new Exception("Something went wrong...");
            }
        }
    }
} catch (Exception $ex) {
    $response->error($ex->getMessage());
}

$response->writeResponse();

