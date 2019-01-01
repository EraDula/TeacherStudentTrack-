<!DOCTYPE html>
<html>

    <head>
        <link rel="stylesheet" href="style.css" />
        <title>Change your password</title>
    </head>

        <body>

            <!-- Password Code Box -->
            <div class="forgottenPassBox loginBox">
                <h2>Enter New Password</h2>

                <form class="ChangePassword" action="includes/changePass.inc.php" method="POST">
                    <p>Make sure to enter a password you will remember!</p>
                    <input type="password" name="newPassword" placeholder="Enter New Password" required="" />
                    <input type="submit" name="submit" value="Confirm" />
                </form>

            </div>

        </body>
</html>
