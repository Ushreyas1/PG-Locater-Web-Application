<html>

    <?php
    require_once '../db/db.php';
    require_once '../include/header.php';
    require_once './home.php';
    ?>

    <div style="background-image: url('../static/images/e6.jpg');background-repeat: no-repeat;background-size: cover;">
        <div class="container">
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <div class="card mb-3 mt-3">
                        <div class="card-header">
                            <h3 class="text-center">
                                Add Rooms
                            </h3>
                        </div>
                        <div class="card-body">
                            <form  method="post" action="o_action.php" id="formAddRoom">
                                <input type="hidden" name="command" value="addRoom">
                                <div class="form-group">

                                    <input class=form-control type="number" id="room_num" name="room_num"
                                           placeholder="Room Number" min="1"  autocomplete="off" />
                                </div>
                                <div class="form-group">

                                    <input class=form-control type="text" id="room_type" name="room_type"
                                           placeholder="Room Type"   autocomplete="off" />

                                </div>
                                <div class="form-group">

                                    <textarea class="form-control" name="room_desc" id="room_desc"
                                              placeholder="Description"   autocomplete="off" rows="2" ></textarea>
                                </div>
                                <div class="form-group">

                                    <textarea class="form-control" name="room_address" id="room_address"
                                              placeholder="Address"   autocomplete="off" rows="2" ></textarea>
                                </div>
                                <div class="form-group">

                                    <input class=form-control type="number" id="room_price" name="room_price"
                                           placeholder="Price details" min="1" autocomplete="off" />
                                </div>
                                <div class="form-group">
                                    <label for="room_price" class="form-group">Upload Image</label>
                                    <input type="file" class="form-control" id="room_image" name="room_image"/>
                                </div>
                                <div class="form-group text-center">
                                    <button type="submit" class="btn btn-dark form-group form-control" id="btnAddRoom" name="btnAddRoom">
                                        Add
                                    </button>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-3"></div>
            </div>
        </div>
        <?php
        require_once '../include/footer.php';
        ?>
        <script src="../static/js/room.js" type="text/javascript"></script>

    </div>
</html>
