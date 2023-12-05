<?php
require_once './../db/db.php';
$con = new DB();
$error = '';

if (isset($_GET['error'])) {
    $error = $_GET['error'];
}

if (isset($_POST['command'])) {
    $name = $_POST['name'];
    $contact_no = $_POST['contact'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $username = $_POST['user_name'];
    $password = $_POST['password'];

    $query1 = "SELECT * FROM `user` WHERE email_id='$email'";
    $email_exists = $con->executeSelect($query1);
    $query2 = "SELECT * FROM `user` WHERE contact_no='$contact_no'";
    $contact_exists = $con->executeSelect($query2);

    if (!empty($email_exists)) {
        ?>
        <script>   alert("Email Id already exists!");
                    window.location = 'register.php';</script>
        <?php
    } else if (!empty($contact_exists)) {
        ?>
        <script>   alert("Contact number already exists!");
                    window.location = 'register.php';</script>
        <?php
    } else {
        $sql = "INSERT INTO `user`(name,contact_no,email_id,address,user_name,password) VALUES('$name','$contact_no','$email','$address','$username','$password')";
        $res = $con->executeInsertAndGetId($sql);
        if ($res > 0) {
            ?>
            <script> alert("Registered successfully");
                window.location = 'login.php';
            </script>
        <?php } else { ?>
            <script>   alert("Something went wrong!");
                            window.location = 'register.php';</script>
            <?php
        }
    }
}
?>
<html>
    <head><link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <link href="../static/css/register.css" type="text/css" rel="stylesheet">

    </head>
    <body style="background-color: #ccffcc;">

        <div class="container register" >
            <div class="row">
                <div class="col-md-3 register-left">
                    <img src="https://image.ibb.co/n7oTvU/logo_white.png" alt=""/>
                    <h3>Welcome</h3>
     <h4 class="register-heading">User Register</h4>
               <a class="font-weight-bold btn btn-light btn-md mt-5 px-4" href="./login.php">Login</a>
                </div>
                <div class="col-md-9 register-right">

                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <h3 class="register-heading">User Register</h3>
                            <form  method="post" action="#" id="form_register"  onsubmit="return validateUser()">
                                <input type="hidden" name="command" value="user_register">
                                <div class="row register-form">

                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <input type="text" v class="form-control" placeholder="Name *" id="name" autocomplete="off"  name="name" />
                                        </div>
                                        <div class="form-group">
                                            <input type="text" autocomplete="off" class="form-control" placeholder="Contact Number *" id="contact"  name="contact" />
                                        </div>
                                        <div class="form-group">
                                            <input type="email" autocomplete="off" class="form-control" placeholder="Email Id *" id="email" name="email" aria-describedby="emailHelp" />
                                        </div>
                                        <div class="form-group">
                                            <textarea class=form-control rows="2" id="address" name="address"
                                                      autocomplete="off"      placeholder="Address *"       autocomplete="off"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" autocomplete="off" class="form-control" placeholder="Username *" id="user_name" name="user_name" />
                                        </div>
                                        <div class="form-group">
                                            <input type="password" autocomplete="off" class="form-control" placeholder="Password *" id="password" name="password" />
                                        </div>
                                        <div>
                                            <button type="submit" class=" btn btnRegister">Register</button>

                                        </div>
                                    </div>



                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>

        </div><br>
        <?php
        require_once '../include/footer.php';
        ?>
        <script src="../static/js/user.js" type="text/javascript"></script>
    </body>
</html>
