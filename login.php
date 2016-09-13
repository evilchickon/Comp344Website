<?php

include("dbconnect.php");

$email=$_POST["email"];
$pass=$_POST["pass"];

$logincon=$conn;

$login = oci_parse($loginconn, "SELECT * FROM USERS WHERE EMAIL = '$email' AND PASSWORD = '$pass'");
oci_execute($login);
if(oci_num_rows($result)==1){
    session_start();
    $arr = oci_fetch_array($result);
    $_SESSION['username'] = $arr['EMAIL']; ociresult($arr, "EMAIL");
}

?>.