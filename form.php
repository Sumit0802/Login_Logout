<?php include("db_connect.php"); ?>

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
        <form action="#" method="POST" enctype="multipart/form-data">
            <div class="title">
                Registration Form
            </div>
            <div class="form">
                
                <div class="input_field">
                    <label>Upload Image</label>
                    <input type="file" name="uploadfile" style="width: 100% ;">
                </div>

                <div class="input_field">
                    <label>First Name</label>
                    <input type="text" class="input" name="fname" required>
                </div>

                <div class="input_field">
                    <label>Last Name</label>
                    <input type="text" class="input" name="lname" required>
                </div>

                <div class="input_field">
                    <label>Password</label>
                    <input type="password" class="input" name="pass" required>
                </div>

                <div class="input_field">
                    <label>Confirm Password</label>
                    <input type="password" class="input" name="cpass" required>
                </div>

                <div class="input_field">
                    <label>Gender</label>
                    <select class="selectbox" name="gender" required>
                        <option value="">Select</option>
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                        <option value="others">Others</option>
                    </select>
                </div>

                <div class="input_field">
                    <label>Email Address</label>
                    <input type="text" class="input" name="email" required>
                </div>

                <div class="input_field">
                    <label>Phone No</label>
                    <input type="text" class="input" name="mobile" required>
                </div>

                <div class="input_field">
                    <label style="margin-right:90px";>Caste</label>
                    <input type="radio" name="r1" value="General" required><label style="margin-left: 5px";>General</label>
                    <input type="radio" name="r1" value="OBC" required><label style="margin-left: 10px";>OBC</label>
                    <input type="radio" name="r1" value="SC" required><label style="margin-left: 10px";>SC</label>
                    <input type="radio" name="r1" value="ST" required><label style="margin-left: 10px";>ST</label>
                </div>

                <div class="input_field">
                    <label>Address</label>
                    <textarea type="textarea" name="address" required></textarea>
                </div>

                <div class="input_field terms">
                    <label class="check">
                        <input type="checkbox" required>
                        <span class="checkmark"></span>
                    </label>
                    <p>Agree to Terms and Conditions.</p>
                </div>

                <div class="input_field">
                    <input type="Submit" value="Register" class="btn" name="register">
                </div>
            </div>
        </Form>
    </div>
</body>

</html>


<!-- To Insert The Data Which is Filled by the User to the Database. -->

<?php

if (isset($_POST['register'])) 
{
    
    $filename = $_FILES["uploadfile"]["name"];
    $tempname = $_FILES["uploadfile"]["tmp_name"];

    $folder = "images/".$filename; // folder to save uploaded files in it.
    // echo " <img src = $folder height='200px'  width='150px' > ";
    move_uploaded_file($tempname, $folder);
 
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $pass = $_POST['pass'];
    $cpass = $_POST['cpass'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $caste = $_POST[ 'r1'];
    $address = $_POST['address'];

    $query = "INSERT INTO form1 (std_image, fname, lname, pass, cpass, gender, mail, phone, caste, address) values('$folder', '$fname', '$lname', '$pass', '$cpass','$gender', '$email', '$mobile', '$caste', '$address')";

    $data = mysqli_query($conn, $query);

    if ($data) 
    {
        echo " <script> alert('Data Inserted Successfully.') </script>";
    } 
    else 
    {
        echo " <script> alert('Data Cannot be Inserted.') </script>";
    }
}
?>