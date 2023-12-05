<?php
require_once './home.php';
require_once '../include/header.php';
require_once '../db/db.php';
$con = new DB();
$search_result = '';
$user_id = $_SESSION['user_id'];

if (isset($_POST['command']) == 'search_room') {

    $room = $_REQUEST['search'];
    $search = trim($room);
    $sql = "SELECT * FROM `room` AS r JOIN `owner` AS o ON r.owner_id=o.owner_rid "
            . "WHERE r.room_type LIKE '%" . $search . "%' AND r.is_booked='no' AND o.is_enabled=1 "
            . "OR r.description LIKE '%" . $search . "%' AND r.is_booked='no' AND o.is_enabled=1 "
            . "OR r.address LIKE '%" . $search . "%' AND r.is_booked='no' AND o.is_enabled=1 ";
    $search_result = $con->executeSelect($sql);
}
?>
<html>
    <?php
    require_once './home.php';
    require_once '../include/header.php';
    ?>
    <head>
        <style>

            .special_search{
                margin-top: 0px;
                background: #fff;
                color: #000;
            }
            .special_search li{
                padding: 4px;
                cursor: pointer;
                color: black;
            }
            .special_search li:hover{
                background: #f2f2f2;
            }
            form.example input[type=text] {
                padding: 10px;
                font-size: 16px;
                border: 0.5px solid grey;
                float: left;
                width: 60%;
                background: #f1f1f1;
            }

            form.example button {
                float: left;
                width: 20%;
                padding: 10px;
                background: #2196F3;
                color: white;
                font-size: 17px;
                border: 0.5px solid grey;
                border-left: none;
                cursor: pointer;
            }

            form.example button:hover {
                background: #0b7dda;
            }


        </style>
    </head>
    <div style="background-image: url('../static/images/image6.jpg');background-repeat: no-repeat;background-size: cover;">
        <div class="container" >

            <div class="row justify-content-center mt-3">


                <div class="card" style="width: 40rem;height: 5rem;background-color: #fff">
                    <div class="card-body ml-5 ">
                        <form class="row g-3 mx-3 example " method="post" action="#"  >
                            <input type="hidden" name="command" id="command" value="search_room"  />

                            <input class="form-control" type="text" placeholder="Search.."  required="" id="search" name="search" autocomplete="off">

                            <button type="submit"><i class="fa fa-search"></i></button>
                        </form>
                        <ul id="drop" class="special_search"></ul>
                    </div>
                </div>


            </div></div>
        <br><br>
        <div class="container" >

            <div class="row justify-content-center">
                <?php
                if (!empty($search_result)) {
                    foreach ($search_result as $row) {
                        ?>
                        <div class="col-md-4 mb-3">

                            <div class="card " style="width: 23rem;">
                                <img src="../images/<?php echo "$row[photo]" ?> " class="card-img-top" style="height: 50%;" alt="product image">
                                <div class="card-body align-middle text-center">

                                    <h5 class="card-title"> <?php echo "$row[room_type]" ?> </h5>
                                    <h6><p class="card-text">Price: Rs.<?php echo "$row[room_rate]" ?> /-</p></h6>
                                    <h6><p class="card-text">Room Num: <?php echo "$row[room_num]" ?></p></h6>
                                    <button type="button" class="btn btn-md btn-primary pl-3"  id="order_btn" name="order_btn" onclick="book_room(<?php echo "$row[room_rid]" ?>)">Book</button>
                                    <a href="view_gallery.php?room_id=<?php echo $row["room_rid"]; ?>" class="btn btn-primary btn-md pl-2 my-4">View More</a>

                                </div>
                            </div>
                        </div>
                        <?php
                    }
                }
                ?>
            </div>
        </div>
    </div>




    <?php
    require_once '../include/footer.php';
    ?>
    <script src="../static/js/book.js" type="text/javascript"></script>
    <script src="../static/js/search.js" type="text/javascript"></script>
</html>