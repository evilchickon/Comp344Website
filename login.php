<?php
session_start();
include("dbconnect.php");

$email=$_POST["email"];
$pass=$_POST["pass"];

$logincon=$conn;

if($email&&$pass){
    $login = oci_parse($logincon, "SELECT * FROM USERS WHERE EMAIL = '$email'");
    oci_execute($login);
    $rows = oci_num_rows($login);
    if($rows!=0){
        while($row=oci_fetch_assoc($login)){
            $dbemail = $row['EMAIL'];
            $dbpass = $row['PASSWORD'];
        }

        if($email=$dbemail&&$pass=$dbpass){
            $_SESSION['email']==$dbemail;
            header('Location: index.php');
            exit;
        }
        else{
            echo "incorrect password";
        }
    }
}
else{
    die("Please enter a username and password");
}
?>.