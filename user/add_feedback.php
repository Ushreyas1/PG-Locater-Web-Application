<?php
require_once '../db/db.php';
require_once './home.php';
require_once '../include/header.php';
$db = new DB();
$user_id = $_SESSION['user_id'];
$sql = "SELECT DISTINCT r.room_rid,r.room_num FROM booking AS b "
        . "JOIN room AS r ON r.room_rid=b.roomId WHERE b.user_id='$user_id' AND b.booking_status=1";
$room_data = $db->executeSelect($sql);
?>


<body >

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <div class="card">
                    <div class="card-body">
                        <h3 class="text-center">Add Feedback</h3>
                        <hr>
                        <form  action="u_action.php" method="post" id="formAddFeedback" enctype="multipart/form-data">
                            <input type="hidden" name="command" value="addFeedback"/>
                            <div class="form-group">
                                <select class="form-control p-2" name="room_id" id="room_id">
                                    <option>--Choose Room--</option>
                                    <?php foreach ($room_data as $row) { ?>

                                        <option value="<?php echo $row['room_rid']; ?>"><?php echo $row['room_num']; ?></option>


                                    <?php }
                                    ?>
                                </select>
                            </div>

                            <div class="form-group">
                                <textarea class="form-control pl-2" name="feedback_details" id="feedback_details" placeholder="Feedback"
                                          autocomplete="off" rows="5" ></textarea>

                            </div>

                            <div class="form-group">
                                <button class="btn btn-dark btn-block" id="btnAddFeedback" name="btnAddFeedback">Add</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
    require_once '../include/footer.php';
    ?>
    <script src="../static/js/feedback.js" type="text/javascript"></script>

</body>
</html>