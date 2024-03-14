<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="login.css">
    <title>Admin Login</title>
</head>
<body>
    <div class="center">
        <h1>Login</h1>
        <form action="" method="POST">
        <div class="form">
            <input type="text" name="username" class="textfield" placeholder="Username">
            <input type="password" name="password" class="textfield" placeholder="Password">

            <div class="forgetpass"><a href="#" class="link" onclick="return forgetpass()">Forget Password ?</a></div>
            
            <input type="submit" name="login" value="Login" class="btn">

            <div class="signup">New Member! <a href="" class="link">Sign-up Here</a></div>
        </div>
    </div>
    </form>
</body>
</html>

<script>
    function forgetpass()
    {
    return alert("Please remember your password!");
    }
</script>

<?php include "db_connect.php";

if(isset($_POST['login']))
{
    $uname = $_POST['username'];
    $pwd = $_POST['password'];

    $query = "SELECT * FROM form1 WHERE mail = '$uname' && pass = '$pwd' ";
    $sql = mysqli_query($conn, $query);

    $total = mysqli_num_rows($sql);
    // echo "$total"; WILL PRINT TOTAL NO.OF ENTRIES MATCHED

    if($total == 1)
    {
        $_SESSION['user_name'] = $uname;
        header('location:display.php');
    }
    else
    {
        echo "Login Failed";
    }
}

?>
