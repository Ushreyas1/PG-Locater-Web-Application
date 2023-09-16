<?php
require_once '../db/db.php';
require_once './home.php';
require_once '../include/header.php';

$query = "SELECT * FROM `user`";
$con = new DB();
$user = $con->executeSelect($query);
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
                                User List
                            </h3>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered table-sm">
                                <thead>
                                    <tr class="text-center">
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Contact Number</th>
                                        <th>Email Id</th>
                                        <th>Password</th>
                                        <th>Address</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i = 0;
                                    foreach ($user as $row) {
                                        ?>
                                        <tr style="text-align: center;">
                                            <td><?php echo ++$i; ?></td>
                                            <td><?php echo "$row[name]" ?></td>
                                            <td><?php echo"$row[contact_no]" ?></td>
                                            <td><?php echo"$row[email_id]" ?></td>
                                            <td><?php echo "$row[password]" ?></td>
                                            <td><?php echo"$row[address]" ?></td>

                                            <?php
                                            $state = $row['is_enabled'];
                                            if ($state == 0) {
                                                ?>

                                                <td><button type="button" class="btn btn-secondary btn-sm ml-3 px-2 pr-3" id="btn_enable" onclick="enable_user(<?php echo "$row[user_rid]" ?>);">Enable</button></td>
                                            <?php } else {
                                                ?>
                                                <td><button type="button" class="btn btn-primary btn-sm ml-3 px-2" id="btn_disable" onclick="disable_user(<?php echo "$row[user_rid]" ?>);">Disable</button></td>
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






        <?php require_once '../include/footer.php'; ?>

        <script src="../static/js/user_action.js" type="text/javascript"></script>


    </body></html>