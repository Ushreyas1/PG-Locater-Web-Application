<?php
require_once '../db/db.php';
require_once './home.php';
require_once '../include/header.php';
$db = new DB();
$owner_id = $_SESSION['owner_id'];
$sql = "SELECT * FROM `room` WHERE owner_id='$owner_id'";
$room_result = $db->executeSelect($sql);
?>

<html>
    <head>
        <style>
            table td { color: #000000; font-size:12pt; }
        </style>
    </head>


    <body class="home">
        <br>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="text-center">
                                Room Details
                            </h3>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered table-sm">
                                <thead>
                                    <tr class="text-center">
                                        <th>#</th>
                                        <th>Room No.</th>
                                        <th>Room Type</th>
                                        <th>Description</th>
                                        <th>Address</th>
                                        <th>Price(in Rs.)</th>
                                        <th>Photo</th>
                                        <th colspan="2">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i = 0;

                                    if (!empty($room_result)) {
                                        foreach ($room_result as $row) {
                                            ?>
                                            <tr style="text-align: center;">
                                                <td><br><br><br><br><?php echo ++$i; ?>.</td>
                                                <td><br><br><br><br><?php echo "$row[room_num]" ?></td>
                                                <td><br><br><br><br><?php echo"$row[room_type]" ?></td>
                                                <td><br><br><br><br><?php echo"$row[description]" ?></td>
                                                <td><br><br><br><br><?php echo"$row[address]" ?></td>
                                                <td><br><br><br><br>Rs.<?php echo"$row[room_rate]" ?>/-</td>
                                                <td><br><img src=../images/<?php echo "$row[photo]" ?> class="rounded-circle" id="change_image" alt="photo" height="150" width="150" ></td>
                                                <td style="text-align: center"><br><br><br><a href="update_room.php?room_id=<?php echo $row["room_rid"]; ?>" class="btn btn-primary btn-sm">Update</a></td>

                                                <td align="center"><br><br><br>
                                                    <button type="button"  id="delete_btn" class="btn btn-sm btn-primary" onclick="delete_room(<?php echo $row["room_rid"]; ?>);">Delete</button></td>


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






        <?php
        require_once '../include/footer.php';
        ?>
        <script src="../static/js/room.js" type="text/javascript"></script>

    </body>
</html>