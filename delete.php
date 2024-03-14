<?php include("db_connect.php");

$id = $_GET['id'];

$query = "DELETE FROM form1 WHERE fid = '$id' ";
$result = mysqli_query($conn, $query);
if ($result)
{
    echo "<script> alert('Record  Deleted Successfully!') </script) ";
    ?>
    
    <!-- PAGE REDIRECTION -->
    <meta http-equiv = "refresh" content = "1; url = http://localhost/crud/display.php" />  
    <?php 
}
else
{
    echo "<script> alert('Record Cannot be Deleted!') </script) ";
}

?>