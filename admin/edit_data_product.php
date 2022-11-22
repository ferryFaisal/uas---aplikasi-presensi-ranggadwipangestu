<?php
require "connect_db.php";

$id1 = $_GET['id'];

$sql1 = "UPDATE products SET name='$name',
description='$desc',
price='$price',
photo='$nama_file',
stock='$stock',
modified = sysdate()
WHERE id ='$id1'";

if (mysqli_query($conn, $sql1)) {

    header('Location: tables-product.php');
    ob_end_flush();

} else {
    echo "gagal mengedit data: " . mysqli_error($conn);
}

mysqli_close($conn);
//test