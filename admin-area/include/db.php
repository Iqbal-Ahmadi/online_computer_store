<?php
$hostname='localhost';
$username='root';
$password='';
$dbname='ecommerce';
$conn='';

$conn=mysqli_connect($hostname,$username,$password,$dbname);
if(mysqli_connect_errno()){
    echo "failed to connect to MYSQLI:" .mysqli_connect-errno();
}

?>