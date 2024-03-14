<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "php_crud";

$conn = mysqli_connect("localhost", "root","","php_crud");

if($conn)
{
    //echo "Connection okay";
}
else
{
    echo "Connection not okay";
}

?>
