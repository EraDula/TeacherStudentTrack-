<!DOCTYPE html>

<html>

    <head>
        <?php include "navBar.php"; ?>

    </head>

    <body>
        <div class="loginBox Base">
            <h2 class="heading">Classes</h2>
            <div id="container">
                <?php
                    function run($username) {

                        include "../includes/dbh.inc.php";
                        $sql = "SELECT class_name FROM classes, users
                        WHERE users.user_id = classes.user_id AND users.username = '$username';";
                        $result = mysqli_query($conn, $sql);

                        echo "<table class='table table-dark table-hover rowlink' data-link='row' border='1'>";

                        while($row = mysqli_fetch_array($result)) {
                            echo "<tr>";
                            echo "<td><a href='#'>" . $row['class_name'] . "</a></td>";
                            echo "</tr>";
                        }
                        echo "</table>";
                    }

                    run($username);
                ?>
            </div>

        </div>



    </body>

</html>
