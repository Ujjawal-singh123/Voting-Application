<?php
    include("connect.php");

    $name = $_POST['name'];
    $mobile = $_POST['mobile'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];
    $address = $_POST['address'];
    $image = $_FILES['photo']['name'];
    $temp_name = $_FILES['photo']['temp_name'];
    $role = $_POST['role'];

    if($password==$cpassword)
    {
        move_uploaded_file($temp_name, "../uploads/$image");
        $insert=mysqli_query($a,"INSERT INTO user (name, mobile, address, password, photo, role, status, votes) VALUES ('$name', '$mobile', '$address', '$password', '$image', '$role', '0', '0' )");
        if($insert)
        {
            echo'
            <script>
            alert("Registration successful");
            window.location="../";
            
             </script>
             ';

        }
        else
        {
            echo'
            <script>
            alert("Some error occured!");
            window.location="../routes/register.html";
            
             </script>
             ';
        }
    }
    else
    {
        echo'
        <script>
        alert("password and Confirm password does not match!");
        window.location="../routes/register.html";
        
         </script>
         ';
    }
?>