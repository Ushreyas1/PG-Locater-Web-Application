<?php

require_once './Response.php';
require_once './../db/db.php';
require_once './session.php';
require_once '../include/util.php';
$con = new DB();
$response = new Response();

try {

    if (isset($_POST['command'])) {
        $command = $_POST['command'];
        if ('addRoom' == $command) {
            $room_num = $_POST['room_num'];
            $room_type = $con->escapeString($_POST['room_type']);
            $room_desc = $con->escapeString($_POST['room_desc']);
            $room_address = $con->escapeString($_POST['room_address']);
            $room_price = $_POST['room_price'];
            $owner_id = $_SESSION['owner_id'];


            $query = "SELECT * FROM `room` WHERE room_num='$room_num' AND owner_id='$owner_id'";
            $result = $con->executeSelect($query);
            if (empty($result)) {
                $room_image = uploadImage('room_image');
                $sql = "INSERT INTO `room`(room_num,room_type,description,room_rate,address,photo,owner_id) "
                        . "VALUES('$room_num','$room_type','$room_desc','$room_price','$room_address','$room_image','$owner_id')";
                $res = $con->executeInsertAndGetId($sql);


                if ($res > 0) {
                    $response->success("Completed successfully...");
                } else {
                    throw new Exception("Something went wrong...");
                }
            } else {
                $response->error("You already added this room...");
            }
        } elseif ('updateRoom' == $command) {
            $room_id = $_POST['room_id'];
            $rm_num = $_POST['rm_num'];
            $rm_type = $con->escapeString($_POST['rm_type']);
            $rm_desc = $con->escapeString($_POST['rm_desc']);
            $rm_address = $con->escapeString($_POST['rm_address']);
            $rm_price = $_POST['rm_price'];
            $owner_id = $_SESSION['owner_id'];

            $sql = "UPDATE `room` SET room_num='$rm_num',room_type='$rm_type',"
                    . "description='$rm_desc',room_rate='$rm_price',address='$rm_address' WHERE room_rid='$room_id'";
            $res = $con->executeUpdate($sql);


            if ($res > 0) {
                $response->success("Completed successfully...");
            } else {
                throw new Exception("Something went wrong...");
            }
        } elseif ('addGallery' == $command) {
            $room_number = $_POST['room_number'];
            $gallery_image = uploadImage('gallery_image');
            $owner_id = $_SESSION['owner_id'];

            $sql = "INSERT INTO gallery(ownerId,room_id,image) VALUES('$owner_id','$room_number','$gallery_image')";
            $res = $con->executeInsertAndGetId($sql);

            if ($res > 0) {
                $response->success("Completed successfully...");
            } else {
                throw new Exception("Something went wrong...");
            }
        } else if ('updateBookingStatus' == $command) {
            $booking_id = $_POST['booking_id'];
            $room_id = $_POST['room_id'];
            $state = $_POST['status'];
            if ($state == 2) {
                $sql1 = "UPDATE `room` SET is_booked='no' WHERE room_rid='$room_id'";
                $res = $con->executeUpdate($sql1);
                if ($res > 0) {
                    $sql2 = "UPDATE `booking`  SET booking_status='$state' WHERE book_rid='$booking_id'";
                    $resp = $con->executeDelete($sql2);
                    $response->success("Completed successfully...");
                } else {
                    throw new Exception("Something went wrong...");
                }
            } else {
                $sql = "UPDATE `booking`  SET booking_status='$state' WHERE book_rid='$booking_id'";
                $res = $con->executeUpdate($sql);
                if ($res > 0) {
                    $response->success("Completed successfully...");
                } else {
                    throw new Exception("Something went wrong...");
                }
            }
        } elseif ('deleteRoom' == $command) {
            $room_id = $_POST['room_id'];
            $sql = "DELETE FROM `room` WHERE room_rid='$room_id'";
            $res = $con->executeDelete($sql);
            if ($res > 0) {
                $response->success("Completed successfully...");
            } else {
                throw new Exception("Something went wrong...");
            }
        } elseif ('deleteGallery' == $command) {
            $gallery_id = $_POST['gallery_id'];
            $sql = "DELETE FROM `gallery` WHERE gallery_rid='$gallery_id'";
            $res = $con->executeDelete($sql);
            if ($res > 0) {
                $response->success("Completed successfully...");
            } else {
                throw new Exception("Something went wrong...");
            }
        } else if ('vacateRoom' == $command) {
            $booking_id = $_POST['booking_id'];
            $room_id = $_POST['room_id'];
            $sql1 = "UPDATE `room` SET is_booked='no' WHERE room_rid='$room_id'";
            $res = $con->executeUpdate($sql1);

            if ($res > 0) {
                $sql2 = "UPDATE `booking` SET is_vacate='1' WHERE book_rid='$booking_id'";
                $resp = $con->executeUpdate($sql2);
                $response->success("Completed successfully...");
            } else {
                throw new Exception("Something went wrong...");
            }
        }
    } else if (isset($_GET['command'])) {
        $command = $_GET['command'];
        if ('getFeedback' == $command) {
            $feed_id = $_GET['feed_id'];
            $sql = "SELECT feedback FROM feedback WHERE feedback_id='$feed_id'";
            $res = $con->executeSelect($sql);
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

