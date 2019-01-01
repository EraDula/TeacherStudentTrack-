<!DOCTYPE html>
<html>

    <head>
        <link rel="stylesheet" href="style.css" />
    </head>

    <body>

        <!-- Forgot Password Box -->
        <div class="forgottenPassBox loginBox">
            <h2>Forgotten your Password?</h2>

            <form class="forgotPass" action="includes/forgotPassword.inc.php" method="POST">
                <p>No need to worry! Enter your email address and we should
                   respond within a few minutes. Simply follow the instructions
                   and you'll be free to use your Teacher Student Track! </p>
                <input type="text" name="email" placeholder="Enter Email" required="" />
                <input type="submit" name="submit" value="Send" />
            </form>

        </div>

    </body>

</html>
