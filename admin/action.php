<?php

session_start();


require_once './Response.php';
require_once './../db/db.php';
require_once '../include/util.php';
$con = new DB();
$response = new Response();

try {

    if (isset($_POST['command'])) {
        $command = $_POST['command'];

        if ('enableUser' == $command) {
            $id = $_POST['id'];
            $sql = "UPDATE `user` SET is_enabled=1 WHERE user_rid=$id";
            $res = $con->executeUpdate($sql);

            if ($res > 0) {
                $response->success("Completed successfully...");
            } else {
                throw new Exception("Something went wrong...");
            }
        } else if ('disableUser' == $command) {
            $id = $_POST['id'];
            $sql = "UPDATE `user` SET is_enabled=0 WHERE user_rid=$id";
            $res = $con->executeUpdate($sql);

            if ($res > 0) {
                $response->success("Completed successfully...");
            } else {
                throw new Exception("Something went wrong...");
            }
        } else if ('enableOwner' == $command) {
            $id = $_POST['id'];
            $sql = "UPDATE `owner` SET is_enabled=1 WHERE owner_rid=$id";
            $res = $con->executeUpdate($sql);

            if ($res > 0) {
                $response->success("Completed successfully...");
            } else {
                throw new Exception("Something went wrong...");
            }
        } else if ('disableOwner' == $command) {
            $id = $_POST['id'];
            $sql = "UPDATE `owner` SET is_enabled=0 WHERE owner_rid=$id";
            $res = $con->executeUpdate($sql);

            if ($res > 0) {
                $response->success("Completed successfully...");
            } else {
                throw new Exception("Something went wrong...");
            }
        }
    } else if (isset($_GET['command'])) {
        $command = $_GET['command'];
    }
} catch (Exception $ex) {
    $response->error($ex->getMessage());
}

$response->writeResponse();

