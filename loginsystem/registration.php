<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="style.css" />
        <title>Registration</title>
    </head>
    <body>

        <!-- Registration Box -->
        <div class="loginBox registrationBox loginBox input register input">
            <h2>Register Below</h2>

            <form class="register" action="includes/registration.inc.php" method="POST">
                <p style="padding: 0">Username</p>
                <input type="text" name="username" placeholder="Enter New Username" required="" />

                <p style="padding: 0">Email Address</p>
                <input type="text" name="email" placeholder="Email" required="" />

                <p style="padding: 0">Password</p>
                <input type="password" name="pass" placeholder="••••••••••" required="" />

                <p style="padding: 0">Confirm password</p>
                <input type="password" name="confirm_pass" placeholder="••••••••••" required="" />
                
                <input type="submit" name="submit" value="Create" />
            </form>

        </div>

    </body>
</html>
