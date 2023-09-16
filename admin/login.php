<?php
session_start();

$error = '';

if (isset($_GET['error'])) {
    $error = $_GET['error'];
}

if (isset($_POST['command'])) {
    $userName = $_POST['username'];
    $password = $_POST['password'];

    if ('admin' == $userName && 'admin' == $password) {
        $_SESSION['admin'] = true;
        $_SESSION['login'] = true;
        header('location: home.php');
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

    <body style="background-image: url('../static/images/admin_login.jpg');background-repeat: no-repeat;background-size: cover;background-position: center;">
        <nav class="navbar navbar-expand-md navbar-dark" style="background-color: tomato">
            <a class="navbar-brand font-weight-bold" href="./login.php">Paying Guest Information System</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault"
                    aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarsExampleDefault">
                <ul class="navbar-nav ml-auto ">
                    <li class="nav-item">
                        <a class="nav-link text-white" href="login.php">Admin</a>
                    </li>

                </ul>
            </div>
        </nav>



        <div class="container mt-4" >
            <div class="row justify-content-center mt-5">
                <div class="col col-md-4">
                    <div class="card mt-4" >
                        <div class="card-body">
                            <h3 class="text-center">Admin Login</h3>
                            <hr>
                            <form method="post" action="#">
                                <input type="hidden" name="command" value="adminlogin">
                                <div class="form-group">
                                    <input class=form-control type="text" id="username" name="username"
                                           placeholder="Username" autocomplete="off" required/>
                                </div>
                                <div class="form-group">
                                    <input class=form-control type="password" id="password" name="password"
                                           placeholder="Password" autocomplete="off" required/>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-dark btn-block">Sign In</button>
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
