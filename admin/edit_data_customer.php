<?php
require "connect_db.php";

$email1 = $_GET['email'];

$sql1 = "UPDATE customers SET
firstname='$name',
lastname='$lastname',
password='$password'
WHERE email ='$email1'";

if (mysqli_query($conn, $sql1)) {

    header('Location: tables-customer.php');
    ob_end_flush();

} else {
    echo "gagal mengedit data: " . mysqli_error($conn);
}

mysqli_close($conn);
//test