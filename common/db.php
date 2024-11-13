<?php  
$hostname = "localhost";
$username = "root";
$password = "";
$database = "discuss";

$conn = new mysqli($hostname, $username, $password, $database);
if($conn->connect_error)
{
    die("Not connected with DB". $conn->connect_error);
}
?>