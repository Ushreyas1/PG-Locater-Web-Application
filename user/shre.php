<?php
session_start();
require_once './../db/db.php';
$con = new DB();
$error = '';

if (isset($_GET['error'])) {
    $error = $_GET['error'];
}

if (isset($_POST['command'])) {
    $user_name = $_POST['user_name'];
    $password = $_POST['password'];
    $sql = "SELECT * FROM `user` WHERE user_name='$user_name' AND password='$password'";
    $res = $con->executeSelect($sql);
    if (!empty($res)) {
        $sql = "SELECT * FROM `user` WHERE user_name='$user_name' AND password='$password' AND is_enabled=1";
        $result = $con->executeSelect($sql);
        if (!empty($result)) {

            $_SESSION['login'] = true;
            $_SESSION['user_id'] = $res[0]['user_rid'];
            $_SESSION['user_name'] = $res[0]['user_name'];
            header('location: home2.php');
        } else {
            $error = "Invalid user!";
        }
    } else {
        $error = "Invalid login credentials!";
    }
}
?>

<!DOCTYPE html>
<html>
    <?php
    require_once '../include/header.php';
    ?>

    <body style="background-image: url('../static/images/login.jpg');background-repeat: no-repeat;background-size: cover;background-position: center;">

        <nav class="navbar navbar-expand-md navbar-dark" style="background-color: tomato">
            <a class="navbar-brand font-weight-bold" href="./../index.php">Paying Guest Information System</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault"
                    aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarsExampleDefault">
                <ul class="navbar-nav ml-auto ">
                    <li class="nav-item">
                        <a class="nav-link text-white" href="login.php">User</a>
                    </li>

                </ul>
            </div>
        </nav>



        <div class="container">
            <div class="row justify-content-center mt-3">
                <div class="col col-md-4">
                    <div class="card mt-5">
                        <div class="card-body">
                            <h3 class="text-center">Password recovery</h3>
                            <hr>
                            <form method="post" action="forgot.php">
                                <input type="hidden" name="command" value="recover">
                                <div class="form-group">
                                    <input class=form-control type="email" id="mail" name="mail"
                                           placeholder="Enter your email" autocomplete="off" required/>
                                </div>
                                <div class="form-group">
                                   
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-dark btn-block">submit</button>
                                </div>

                                <?php if (!empty($error)) { ?>
                                    <div class="alert alert-danger text-center">
                                        <?php echo $error; ?>
                                    </div>
                                <?php } ?>
                            </form>
                               </div>
         

               </div>
                </div>
            </div>
        </div>

        <?php
        require_once '../include/footer.php';
        ?>
    </body>
</html>
