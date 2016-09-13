<?php

include("dbconnect.php");


$firstname=$_POST["fname"];
$lastname=$_POST["lname"];
$email=$_POST["email"];
$hphone=$_POST["hphone"];
$mphone=$_POST["mphone"];
$address=$_POST["address"];
$password=$_POST["pass"];


$personcon=$conn;

$bbsSQL = "INSERT INTO USERS (USERID, FIRSTNAME, LASTNAME, EMAIL, HOMEPHONE, MOBILEPHONE, ADDRESS, PASSWORD) VALUES (S_USER.nextval, '$firstname','$lastname', '$email', '$hphone', '$mphone', '$address', '$password')";

$personinfo=oci_parse($personcon,$bbsSQL);
oci_execute($personinfo);

oci_free_statement($personinfo);
oci_close($personcon);

$subject = "Car Salesman Confirmation";

$message = "You have successfully registered to Car Salesman " . $firstname . " " . $lastname . "

Email: " . $email . "

Password: " . $password . "

Registered Mobile Number: " . $mphone . "







COMP344 Assignment 1, 2016 Jesse Lee-Joe 43679692";


$from = "Car Salesman";

mail ($email, $subject, $message, $from);

header('Location: registered.html');
exit;
?>.
