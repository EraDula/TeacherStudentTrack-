<!DOCTYPE html>

<html>

  <head>
    <link rel="stylesheet" href="style.css" />
  </head>

  <body>

    <!-- LOGIN BOX -->
    <div class="loginBox">
      <img class="logo" src="Images/newLogo.png" alt="Teacher student track"/>
      <h2>Log In</h2>

      <form class="logIn" action="includes/logIn.inc.php" method="POST">
        <p style="padding: 0">Username</p>
        <input type="text" name="username" placeholder="Enter Username" required="" />

        <p style="padding: 0">Password</p>
        <input type="password" name="password" placeholder="••••••••••" required=""/>
        <input type="submit" name="submit" value="Sign In" />

        <a href="forgotPassword.php">Forgot Password?</a>

        <a href="registration.php" style="margin-left: 5em">Register</a>
      </form>

    </div>

  </body>

</html>
