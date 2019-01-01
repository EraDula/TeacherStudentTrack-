<!DOCTYPE html>
<html>

    <head>
        <link rel="stylesheet" href="style.css" />
        <title>Restore Code</title>
    </head>

        <body>

            <!-- Password Code Box -->
            <div class="forgottenPassBox loginBox">
                <h2>Enter your restore code</h2>

                <form class="PasswordCode" action="includes/passCode.inc.php" method="POST">
                    <p>You should have received a restore code within a few minutes in the email address you have entered, if not go back and try again. Make sure to check your spam email!</p>
                    <input type="text" name="code" placeholder="Enter code" required="" />
                    <input type="submit" name="submit" value="Confirm" />
                </form>

            </div>

        </body>
</html>
