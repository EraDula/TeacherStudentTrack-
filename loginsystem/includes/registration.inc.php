<?php

function insertUserRecordToDB($username, $email, $pass){

    include 'dbh.inc.php';
    $hashedPass = password_hash($pass, PASSWORD_DEFAULT);

    $passCode = substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 5);
    $sqlinsert = "INSERT INTO users (username, user_email, user_pass, passCode) VALUES ('$username', '$email', '$hashedPass', '$passCode');";
    mysqli_query($conn, $sqlinsert);

    header("Location: ../registration.php?registration=success"); //Otherwise it returns user to register page//
    exit();
}

function refreshPage($debugComment){

    // ARGUMENT SHOULD BE REMOVED BEFORE DEPLOYMENT
    header("Location: ../registration.php?registration=".$debugComment);//$debugComment);
    exit();
}

function validateInputs($numberOfEmails, $numberOfUsernames, $username, $email, $pass){

    if ($numberOfEmails > 0) {
        refreshPage("emailTaken");
    }
    elseif (!preg_match("/^[a-zA-Z]*$/", $username)){
        // Check if input characters are valid
        refreshPage("Invalid");
    }
    elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)){

        // Check if email is invalid
        refreshPage("emailInvalid");
    }
    elseif ($numberOfUsernames > 0){
        refreshPage("userTaken");
    }
    elseif ($_POST['confirm_pass'] !== $pass) {
        refreshPage("passNotEqual");
    }
    else {
        insertUserRecordToDB($username, $email, $pass);
    }
}

function countRowsOfData($data){
    include 'dbh.inc.php';
    $sqlDataQuery = "SELECT * FROM users WHERE username='$data'";
    $dataResult = mysqli_query($conn, $sqlDataQuery);
    $numberOfData = mysqli_num_rows($dataResult); // POTENTIAL TO OPTIMISE THIS WITH CHECKING FOR EXISTENCE
}

function takeUserInput(){
    include 'dbh.inc.php';
    // Function considers code as string
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $pass = mysqli_real_escape_string($conn, $_POST['pass']);

    $inputData = array($username, $email, $pass);

    return $inputData;
}

function run(){

    if (isset($_POST['submit'])) { // Checks if 'submitted' in order to proceed

        $inputData = takeUserInput();
        $username = $inputData[0]; $email = $inputData[1]; $pass = $inputData[2];

        $numberOfEmails = countRowsOfData($email);
        $numberOfUsernames = countRowsOfData($username);

        validateInputs($numberOfEmails, $numberOfUsernames, $username, $email, $pass);
    }
}

// Runs main code

run();
?>
