<?php

function verifyPassCode($passCodeInput, $realPassCode){
    if($passCodeInput == $realPassCode) {
        header("Location: ../changePassword.php");
        exit();
    }
    else {
        header("Location: ../passCode.php");
        exit();
    }
}

function fetchPassCodeFromDB($email){

    $sqlQuery = "SELECT passCode FROM users WHERE user_email='$email'";
    $result = mysqli_query($conn, $sqlQuery);
    $row = mysqli_fetch_assoc($result);
    $realPassCode = $row['passCode'];

    return $realPassCode;
}

function takeUserInput(){

    $passCodeInput = mysqli_real_escape_string($conn, $_POST['code']);
    $email = mysqli_real_escape_string($conn, $_SESSION['forgotPassEmail']);
    $inputData = array($passCodeInput, $email);

    return $inputData;
}

function run(){

    if (isset($_POST['submit'])) { // Checks if 'submitted' in order to proceed //
        session_start();
        //include_once 'dbh.inc.php';

        $inputData = takeUserInput();
        $passCodeInput = $inputData[0]; $email = $inputData[1];

        $realPassCode = fetchPassCodeFromDB($email);

        verifyPassCode($passCodeInput, $realPassCode);
    }
}

// Runs main code
run();
?>
