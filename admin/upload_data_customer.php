<?php
require 'connect_db.php';

$encryptPassword = sha1($_POST['password']);

$sql = "INSERT INTO customers (email, firstname, lastname, password, date_created)
VALUES ('$email',
'$name',
'$lname',
'$encryptPassword',
sysdate())";

if (mysqli_query($conn, $sql)) {
    echo "data berhasil dimasukkan ke database";
    header('Location: tables-customer.php');
    ob_end_flush();
} else {
    echo "gagal memasukkan data: " . mysqli_error($conn);
}

mysqli_close($conn);