<?php
session_start();
// echo "Welcome ".$_SESSION['user_name'];  // TO PRINT THE SESSION VARIABLE NAME 
?>

<html>
    <head>
        <title>Display Records</title>
        <style>
            body
            {
                background:khaki;
            }
            table
            {
                background:white;
            }
            .update
            {
                background-color: green;
                color: white;
                border-radius: 5px;
                width: 58px;
                font-weight: bold;
                cursor:pointer;

            }
            .delete
            {
                background-color: orangered;
                color: white;
                border-radius: 5px;
                width: 58px;
                font-weight: bold;
                cursor:pointer;

            }
        </style>
    </head>
</html>


<?php include "db_connect.php";
error_reporting(0);

$user_profile = $_SESSION['user_name'];
if($user_profile == true)
{

}
else
{
    header('location:login.php');
}

$query = "SELECT * FROM form1"; 

$data = mysqli_query($conn, $query);
$total = mysqli_num_rows($data);

if($total != 0)
{
    ?>

    <h2 align = "center">User Records</h2>
    <?php echo "Welcome ".$_SESSION['user_name'] ?>
    <center><table border = "3" cellspacing="5">
        <tr>
            <th width="5%">FID</th>
            <th width="5%">Std_Image</th>
            <th width="10%">First Name</th>
            <th width="10%">Last Name</th>
            <th width="5%">Gender</th>
            <th width="20%">Email</th>
            <th width="10%">Phone</th>
            <th width="5%">Caste</th>
            <th width="20%">Address</th>
            <th width="15%">Operations</th>
        </tr>

    <?php
    while($result = mysqli_fetch_assoc($data))
    {
        echo "<tr>
                <td>".$result['fid']."</td>
                <td><img src = '".$result['std_image']."' height='70px' width='73px'></td>
                <td>".$result['fname']."</td>
                <td>".$result['lname']."</td>
                <td>".$result['gender']."</td>
                <td>".$result['mail']."</td>
                <td>".$result['phone']."</td>
                <td>".$result['caste']."</td>
                <td>".$result['address']."</td>
                <td><a href = 'update_design.php?id=$result[fid]'><input type='submit' value='Update' class='update'></a>
                <a href = 'delete.php?id=$result[fid]'><input type='submit' value='Delete ' class='delete' onclick = 'return checkdelete()'></a>
                </td>
              </tr>";
    }
}
else
{
    echo "No records Found...";
}

?>
    </table>
</center>

<form action="logout.php" method="POST">  
<a href="login.php">
    <input type="submit" name="logout" value="LogOut" style="background:salmon; color:white; height:30px; width:80px; font-weight:bold; font-size:15px; cursor:pointer; margin-top:10px; border-radius:3px; " >
</a></form>

</html>

<script>
    function checkdelete()
    {
        return confirm("Are you sure and want to delete this record ?");
    }
</script>