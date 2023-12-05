<?php
require_once '../db/db.php';
require_once './home.php';
require_once '../include/header.php';
$id = $_GET['room_id'];
$query = "SELECT * FROM `room` WHERE room_rid='$id'";
$con = new DB();
$get_room = $con->executeSelect($query);
?>

<html>
    <?php
    ?>

    <body>
        <div style="background-image: url('../static/images/e6.jpg');background-repeat: no-repeat;background-size: cover;">
            <div class="container">
                <div class="row">
                    <div class="col-md-3"></div>
                    <div class="col-md-6">
                        <div class="card mb-3 mt-2">
                            <div class="card-header">
                                <h3 class="text-center">
                                    Room Details
                                </h3>
                            </div>
                            <div class="card-body">
                                <form  method="post" action="o_action.php" id="formUpdateRoom">
                                    <?php foreach ($get_room as $row) { ?>
                                        <input type="hidden" name="command" value="updateRoom">
                                        <input type="hidden" name="room_id" id="room_id" value="<?php echo $row['room_rid']; ?>">

                                        <div class="form-group">
                                            <label for="rm_num" class="form-group">Room Number</label>
                                            <input class=form-control type="number" id="rm_num" name="rm_num" min="1"
                                                   value="<?php echo $row['room_num']; ?>"    autocomplete="off" />
                                        </div>
                                        <div class="form-group">
                                            <label for="rm_type" class="form-group">Room Type</label>
                                            <input class=form-control type="text" id="rm_type" name="rm_type"
                                                   value="<?php echo $row['room_type']; ?>"      autocomplete="off" />

                                        </div>
                                        <div class="form-group">
                                            <label for="rm_desc" class="form-group">Description</label>
                                            <textarea class="form-control" name="rm_desc" id="rm_desc"
                                                      autocomplete="off" rows="2" ><?php echo $row['description']; ?></textarea>
                                        </div>
                                        <div class="form-group">

                                            <textarea class="form-control" name="rm_address" id="rm_address"
                                                      placeholder="Address"   autocomplete="off" rows="2" ><?php echo $row['address']; ?></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="rm_price" class="form-group">Price details</label>
                                            <input class=form-control type="number" id="rm_price" name="rm_price" min="1"
                                                   value="<?php echo $row['room_rate']; ?>"    autocomplete="off" />
                                        </div>

                                        <div class="form-group text-center">
                                            <button type="submit" class="btn btn-dark form-group form-control" id="btnUpdateRoom" name="btnAddRoom">
                                                Update
                                            </button>
                                        </div>
                                    <?php } ?>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3"></div>
                </div>
            </div>
            <?php require_once '../include/footer.php'; ?>

            <script src="../static/js/room.js" type="text/javascript"></script>


    </body></html>