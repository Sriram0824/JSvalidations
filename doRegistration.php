<?php
session_start();
require 'PHPMailer/PHPMailerAutoload.php';
// define variables and set to empty values
$fnameErr =$lnameErr = $emailErr = $phoneErr ="";
$fname =$lname = $email = $phone = $comment =  "";
$_SESSION["errMsg"]="";
$flag=true;
//chceking firs name field
  if (empty($_POST["firstName"])) {
	  $flag=false;
    $fnameErr = "First Name is required";
	$_SESSION["errMsg"]=$_SESSION["errMsg"]."<br/>".$fnameErr;
  } else {
    $fname = test_input($_POST["firstName"]);
   }
//checking last name field
  if (empty($_POST["lastName"])) {
	  $flag=false;
    $lnameErr = "Last Name is required";
	$_SESSION["errMsg"]=$_SESSION["errMsg"]."<br/>".$lnameErr;
  } 
  else {
    $lname = test_input($_POST["lastName"]);
   }
//checking email field
  if (empty($_POST["email"])) {
	  $flag=false;
    $emailErr = "Email is required";
	$_SESSION["errMsg"]=$_SESSION["errMsg"]."<br/>".$emailErr;
  } else {
    $email = test_input($_POST["email"]);
// check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		$flag=false;
      $emailErr = "Invalid email format (Ex:abc@gmail.com)"; 
	  $_SESSION["errMsg"]=$_SESSION["errMsg"]."<br/>".$emailErr;
    }
  }
  
  //checking phone field
  if (empty($_POST["phone"])) {
	  $flag=false;
    $phoneErr = "phone number required";
	$_SESSION["errMsg"]=$_SESSION["errMsg"]."<br/>".$phoneErr;
	}
  else{
	  if(preg_match("/^[0-9]{3}-[0-9]{3}-[0-9]{4}$/", $_POST["phone"])) {
      $phone = test_input($_POST["phone"]);
     }
     else{
    $flag=false;
	$phoneErr = "Invalid Phone number (Ex: 800-123-123)";
	$_SESSION["errMsg"]=$_SESSION["errMsg"]."<br/>".$phoneErr;
	}
  } 
 
//comment field 
if (empty($_POST["comments"])){
	$comment= "No Comments";
}
else{
	$comment=test_input($_POST["comments"]);
}
//test_input function to trim unnecessary spaces
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
//condition check if any of the inputs invalid go back to Registration page else send an emial
if($flag==false){
header('Location:Registration.php');
}
else{
session_destroy();
$receiver1="daniel.wesley@golocalinteractive.com";
$receiver2="jbenson@golocalinteractive.com";
$mail = new PHPMailer;
$mail->SMTPDebug = 2;                               // Enable verbose debug output
$mail->IsSMTP();
$mail->Host = "smtp.gmail.com";
$mail->SMTPAuth = true;
$mail->SMTPSecure = "ssl";

//change the sender email and password 
$mail->Username = "abc@gmail.com";  //change the email through which the form fields should be sent
$mail->Password = "******";           //change the password based on the email used

$mail->Port = "465";                         // Enable TLS encryption, `ssl` also accepted
$mail->setFrom('from@example.com', 'Mailer');
$mail->addAddress($receiver1, 'Daniel');       //Add first recepient
$mail->addAddress($receiver2, 'Benson');     // Add second recipient
$mail->isHTML(true);                                  // Set email format to HTML
$mail->Subject = 'These are the form fields';
$mail->Body    = 'First Name : '.$fname.'<br/>Last Name : '.$lname.'<br/>Email : '.$email.
                  '<br/>Phone : '.$phone.'<br/>Comments : '.$comment;
$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
if($mail->send()) {
	header('Location:Success.php');
    } 
else{
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
  }
}
?>