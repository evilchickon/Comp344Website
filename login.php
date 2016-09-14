<?php
session_start();
include("dbconnect.php");

$email=$_POST["email"];
$pass=$_POST["pass"];

$logincon=$conn;

if($email&&$pass){
    $login = oci_parse($logincon, "SELECT * FROM USERS WHERE EMAIL = '$email' AND PASSWORD = '$pass'");
    oci_execute($login);
    $rows = oci_num_rows($login);
    if($rows==1){

        $arr = oci_fetch_array($login);
        $_SESSION['username'] = $arr['EMAIL'];
        header('Location: registered.html');
        exit;
    }
    else{
        echo oci_num_rows($login);
    }
}
else{
    die("Please enter a username and password");
}
?>.