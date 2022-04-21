<?php
// defining host
$host = "localhost";
$username = "root";
$password ="123";
$database = "userregister";

$conn = mysqli_connect($host,$username,$password,$database);

if (!$conn) {
    die("Database connection faild". mysqli_error($conn));
} else {
   // echo "Database connection sucessfull";
}

?>