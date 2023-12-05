<?php

session_start();

?>

<!DOCTYPE html>
<html>

<head>
    <style>
        #fp {
            text-decoration: none;
        }

        #navbarsExampleDefault li a {
            color: white;
        }

        #navbarsExampleDefault li a:hover {
            color: black;
        }

        #tb {
            font-size: 20px;
        }
    </style>
</head>

<?php
require_once '../include/header.php';
?>

<body style="background-image: url('../static/images/forgot,php.jpg');background-repeat: no-repeat;background-size: cover;">
    <nav class="navbar navbar-expand-md navbar-dark" style="background-color: tomato">
        <a class="navbar-brand font-weight-bold" href="../index.php">Paying Guest Information System</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarsExampleDefault">
            <ul class="navbar-nav ml-auto ">
                <li class="nav-item mx-4">
                    <a class="nav-link" href="./login.php">Owner</a>
                </li>


            </ul>
        </div>
    </nav>



    <div class="container">
        <div class="row justify-content-center" style="margin-top:150px;">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <h3 class="text-center">Thank You</h3>

                        <hr>
                        <div id="tb" class="text-center">

                            <?php if ($_SESSION['run']) { ?>
                                <p><?php echo $_SESSION['value'] ?></p>

                            <?php } else { ?>
                                <p><?php echo $_SESSION['value'] ?></p>

                            <?php } ?>

                        </div>

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