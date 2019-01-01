<?php

function changePassword($newPasswordInput, $email){

    include 'dbh.inc.php';

    $newPassCode = substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 5);
    $newHashedPass = password_hash($newPasswordInput, PASSWORD_DEFAULT);

    $passwordSql = "UPDATE users SET user_pass='$newHashedPass' WHERE user_email='$email'";
    $passCodeSql = "UPDATE users SET passCode='$newPassCode' WHERE user_email='$email'";
    $conn->query($passwordSql);
    $conn->query($passCodeSql);

    header("Location: ../index.php");
}

function takeUserInput(){

    include 'dbh.inc.php';
    $newPasswordInput = mysqli_real_escape_string($conn, $_POST['newPassword']);
    $email = mysqli_real_escape_string($conn, $_SESSION['email']);
    $inputData = array($newPasswordInput, $email);

    return $inputData;
}

function run(){

    if (isset($_POST['submit'])) { // Checks if 'submitted' in order to proceed //
        session_start();
        //include_once 'dbh.inc.php';

        $inputData = takeUserInput();
        $newPasswordInput = $inputData[0]; $email = $inputData[1];

        changePassword($newPasswordInput, $email);
    }
}

// Runs main code
run();
?>
