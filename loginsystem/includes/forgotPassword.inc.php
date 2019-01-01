<?php

function setServerSettings($mail){

    $mail->SMTPDebug = 0;                                 // Enable verbose debug output
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'smtp.gmail.com';                       // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'teacherstudenttrack@gmail.com';    // SMTP username
    $mail->Password = 'project123?';                      // SMTP password
    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587;                                    // TCP port to connect to

    return $mail;
}

function sendMail($code, $email){

    require 'PHPMailer/PHPMailerAutoload.php';

    $mail = new PHPMailer(true); // Passing `true` enables exceptions
    try {
        $mail = setServerSettings($mail);

        //Recipients
        $mail->setFrom('teacherstudenttrack@gmail.com', 'TeacherStudentTrack');
        $mail->addAddress($email, 'You'); // Add a recipient

        //Content
        $mail->isHTML(true); // Set email format to HTML
        $mail->Subject = 'Recover password';
        $mail->Body    = "It looks like you've forgotten your password, Enter this code in the page you were directed to on our website: <b>".$code."</b>. If this wasn't you who requested a password code to reset your password, then ignore this email, thank you.";

        $mail->send();
        header("Location: ../passCode.php?");
    }
    catch (Exception $e) { // FIX DISPLAY FOR ERROR SENDING THE EMAIL
        echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
    }
}

function sendMailIfEmailExists($numOfEmails, $code, $email){

    if ($numOfEmails == 0) {
        header("Location: ../forgotPassword.php?forgotPassword=EmailNonExistent"); //Otherwise it returns user to register page//
        exit();
    }
    else {
        sendMail($code, $email);
    }
}

function takeDBValues($email){

    include 'dbh.inc.php';
    $sqlQuery = "SELECT * FROM users WHERE user_email='$email'";
    $numOfEmails = mysqli_num_rows(mysqli_query($conn, $sqlQuery));

    $code  = mysqli_fetch_assoc(mysqli_query($conn, "SELECT passCode FROM users WHERE user_email='$email'"))['passCode'];

    $DBValues = array($code, $numOfEmails);

    return $DBValues;
}

function takeUserInput(){

    include 'dbh.inc.php';
    session_start();
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $_SESSION['forgotPassEmail'] = $email;

    return $email;
}

function run(){

    if (isset($_POST['submit'])) { //Checks if 'submitted' in order to proceed//
        //include_once 'dbh.inc.php';
        $email = takeUserInput();
        $DBValues = takeDBValues($email);
        $numOfEmails = $DBValues[1]; $code = $DBValues[0];

        sendMailIfEmailExists($numOfEmails, $code, $email);
    }
}

// Runs main code
run();
?>
