<?php
require_once '../db/db.php';
require_once './home.php';
require_once '../include/header.php';
$owner_id = $_SESSION['owner_id'];
$query = "SELECT * FROM feedback AS f JOIN `user` AS u ON f.user_id=u.user_rid"
        . " JOIN `room` AS r ON r.room_rid=f.room_id WHERE r.owner_id='$owner_id'";
$con = new DB();
$feedback = $con->executeSelect($query);
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
                                Feedback List
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
                                        <th>feedback</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i = 0;
                                    foreach ($feedback as $row) {
                                        ?>
                                        <tr style="text-align: center;" >
                                            <td><?php echo ++$i; ?></td>
                                            <td><?php echo "$row[name]" ?></td>
                                            <td><?php echo "$row[contact_no]" ?></td>
                                            <td><?php echo "$row[room_num]" ?> </td>
                                            <?php
                                            $string = $row['feedback'];
                                            if (strlen($string) > 25) {
                                                $trimstring = substr($string, 0, 25);
                                                ?>
                                                <td><?php echo $trimstring; ?><a style="color: #003eff;" href="#" onclick="getFeedback(<?php echo "$row[feedback_id]" ?>);">Read More</a></td>
                                            <?php } else {
                                                ?>
                                                <td><?php echo "$row[feedback]" ?></td>
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


        <!--view Feedback  modal for  feedback-->
        <div id="modalViewFeedback" class="modal fade in" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content" >
                    <div class="modal-header">
                        <h4 class="modal-title">Feedback Details</h4>
                        <button class="close" type="button" data-dismiss="modal">&times;</button>

                    </div>
                    <div class="modal-body">
                        <form id="formMoreFeed">
                            <textarea class="form-control" id="feedback" name="feedback" style="min-width: 100%"
                                      autocomplete="off" readonly></textarea><br>
                        </form>
                    </div>
                </div></div></div>



        <?php
        require_once '../include/footer.php';
        ?>
        <script src="../static/js/getFeedback.js" type="text/javascript"></script>


    </body></html>