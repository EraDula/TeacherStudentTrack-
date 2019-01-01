<?php

function checkUsernamePassMatch($usernameInput, $passwordInput){

    include 'dbh.inc.php';

    $dbPassword = mysqli_fetch_assoc(mysqli_query($conn, "SELECT user_pass FROM users WHERE username='$usernameInput'"))['user_pass'];

    if(password_verify ($passwordInput , $dbPassword)){
        header("Location: ../Main/homePage.php");
    }
    else{
        $message = "The username/Password is incorrect";

        echo "<script type='text/javascript'>alert('$message');</script>";
    }

}

function verifyUsername($usernameInput, $passwordInput){

    include 'dbh.inc.php';

    $usernameCount = mysqli_num_rows(mysqli_query($conn, "SELECT username FROM users WHERE username='$usernameInput'"));

    if($usernameCount > 0) {
        checkUsernamePassMatch($usernameInput, $passwordInput);
    }
    else {
        $message = "This username does not exist!";

        echo "<script type='text/javascript'>alert('$message');</script>";
    }
}

function takeUserInput(){

    session_start();
    include 'dbh.inc.php';

    $usernameInput = mysqli_real_escape_string($conn, $_POST['username']);
    $passwordInput = mysqli_real_escape_string($conn, $_POST['password']);
    $inputData = array($usernameInput, $passwordInput);
    $_SESSION['username'] = $usernameInput; //This will be displayed in the main page once logged in

    return $inputData;
}

function run() {

    $inputData = takeUserInput();
    $usernameInput = $inputData[0]; $passwordInput = $inputData[1];

    verifyUsername($usernameInput, $passwordInput);
}

run();
 ?>
