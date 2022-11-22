<?php
require 'connect_db.php';

session_start();
$name = $_POST['name'];
$desc = $_POST['desc'];
$price = $_POST['price'];

$sql = "INSERT INTO products (name, description, price, photo, stock, created,modified )
    VALUES ('$name',
    '$desc',
    '$price',
    '$nama_file',
    '$stock',
    curdate(),
    SYSDATE()

    )";

if (mysqli_query($conn, $sql)) {
    echo "data berhasil dimasukkan ke database";

    header('Location: tables-product.php');
    ob_end_flush();

} else {
    echo "gagal memasukkan data: " . mysqli_error($conn);
}

mysqli_close($conn);