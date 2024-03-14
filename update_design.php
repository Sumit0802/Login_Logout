<?php include("db_connect.php");
error_reporting(0);
session_start();

$fid = $_GET['id']; // TO GET THE ID FOR EACH ENTRIES.

/*  USED TO CHECK IF THE SESSION IS ACTIVE AND IF TRUE THEN OPEN THE CURRENT PAGE OTHERWISE IT WILL
REDIRECT TO LOGIN PAGE (login.php).  */ 

$user_profile = $_SESSION['user_name'];
if($user_profile == true)
{

}
else
{
    header('location:login.php');
}

$query = "SELECT * FROM form1 WHERE fid = '$fid' "; 

$data = mysqli_query($conn, $query);
$total = mysqli_num_rows($data);

$result = mysqli_fetch_assoc($data);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP CRUD PROJECT</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <form action="#" method = "POST">
        <div class="title">
            Update Student Details
        </div>

        <!-- PRE FILLED FORM -->

        <div class="form">
            <div class="input_field">
                <label>First Name</label>
                <input type="text" class="input" value="<?php echo $result['fname']; ?>" name="fname" required>
            </div>

            <div class="input_field">
                <label>Last Name</label>
                <input type="text" class="input" value="<?php echo $result['lname']; ?>" name="lname" required>
            </div>
            
            <div class="input_field">
                <label>Password</label>
                <input type="password" class="input" value="<?php echo $result['pass']; ?>" name="pass" required>
            </div>
            
            <div class="input_field">
                <label>Confirm Password</label>
                <input type="password" class="input" value="<?php echo $result['cpass']; ?>" name="cpass" required>
            </div>
            
            <div class="input_field">
                <label>Gender</label>
                <select class="selectbox" name="gender" required>
                    <option value="">Select</option>
                    <option value="male" 
                    <?php
                    if($result['gender'] == 'male')
                    {
                        echo "selected";
                    }
                    ?>
                    >Male</option>

                    <option value="female" 
                    <?php
                    if($result['gender'] == 'female')
                    {
                        echo "selected";
                    }
                    ?>
                    >Female</option>

                    <option value="others"
                    <?php
                    if($result['gender'] == 'others')
                    {
                        echo "selected";
                    }
                    ?>
                    >Others</option>
                </select>
            </div>
            
            <div class="input_field">
                <label>Email Address</label>
                <input type="text" class="input" name="email" value="<?php echo $result['mail']; ?>" required>
            </div>

            <div class="input_field">
                <label>Phone No</label>
                <input type="text" class="input" name="mobile" value="<?php echo $result['phone'];?>" required>
            </div>

            <div class="input_field">
                    <label style="margin-right:90px";>Caste</label>

                    <input type="radio" name="r1" value="General" required
                    <?php
                    if($result['caste'] == 'General')
                    {
                        echo "checked";
                    }
                    ?>
                    ><label style="margin-left: 5px";>General</label>

                    <input type="radio" name="r1" value="OBC" required
                    <?php
                    if($result['caste'] == 'OBC')
                    {
                        echo "checked";
                    }
                    ?>
                    ><label style="margin-left: 10px";>OBC</label>

                    <input type="radio" name="r1" value="SC" required
                    <?php
                    if($result['caste'] == 'SC')
                    {
                        echo "checked";
                    }
                    ?>
                    ><label style="margin-left: 10px";>SC</label>

                    <input type="radio" name="r1" value="ST" required
                    <?php
                    if($result['caste'] == 'ST')
                    {
                        echo "checked";
                    }
                    ?>
                    ><label style="margin-left: 10px";>ST</label>

                </div>

            <div class="input_field">
                <label>Address</label>
                <textarea type="textarea" name="address" required><?php echo $result['address']; ?>
                </textarea>
            </div>

            <div class="input_field terms">
                <label class="check">
                    <input type="checkbox" required>
                    <span class="checkmark"></span>
                </label>
                <p>Agree to Terms and Conditions.</p>
            </div>

            <div class="input_field">
                <input type="Submit" value="Update Details" class="btn" name="update">
            </div>
        </div>
        </Form>
    </div>
</body>
</html>


<!-- DATA UPDATION IN THE DB AFTER EDITING -->

<?php
error_reporting(0);

if(isset($_POST['update']))
{
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $pass = $_POST['pass'];
    $cpass = $_POST['cpass'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $caste = $_POST['r1'];
    $address = $_POST['address'];

    $query = "UPDATE form1 SET fname='$fname', lname='$lname', pass='$pass', cpass='$cpass', gender='$gender', mail='$email', phone='$mobile', caste='$caste', address='$address' WHERE fid = $fid ";

    $data = mysqli_query($conn, $query);

    if($data)
    {
        echo " <script> alert('Data Updated Successfully.') </script>"; 
        
        ?>
        <meta http-equiv = "refresh" content = "1; url = http://localhost/crud/display.php" />
        <?php 
    }
    else
    {
        echo " <script> alert('Data not Updated') </script>";
    }
}

?>