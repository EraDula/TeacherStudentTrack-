<!DOCTYPE html>

<html>

    <head>

        <title>Welcome</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet"  href="../style.css"/>
        <!-- jQuery library -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <!-- Latest compiled JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    </head>

    <body>

        <nav class="navbar navbar-inverse">

            <div class="container-fluid">

                <div class="navbar-header">
                    <a class="navbar-brand" href="homePage.php"><img src="../Images/newLogo.png" width="65em" height="60em" style="max-width:6em; margin-top: -1.4em;"/></a>
                </div>

                <ul class="nav navbar-nav navbar-center">
                    <?php
                        include "../includes/dbh.inc.php";
                        session_start();
                        $username = mysqli_real_escape_string($conn, $_SESSION['username']);
                    ?>
                    <li><a><?php echo $username;?></a></li>
                </ul>

                <ul class="nav navbar-nav navbar-right">
                    <li><a href="#"><span class="glyphicon glyphicon-user"></span> Settings</a></li>
                    <li><a href="../index.php"><span class="glyphicon glyphicon-log-out"></span> LogOut</a></li>
                </ul>

            </div>
        </nav>

    </body>

</html>
