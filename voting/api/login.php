<?php
session_start();
include("connect.php");

$mobile = $_POST['mobile'];
$password = $_POST['password'];
$role = $_POST['role'];

$b = mysqli_query($a, "SELECT * FROM user WHERE mobile='$mobile' AND password='$password' AND role='$role' ");
if(mysqli_num_rows($b)>0)
{

    $userdata = mysqli_fetch_array($b);
    $groups = mysqli_query($a, "SELECT * FROM user WHERE role=2");
    $groupsdata = mysqli_fetch_all($groups, MYSQLI_ASSOC);

    $_SESSION['userdata'] = $userdata;
    $_SESSION['groupsdata'] = $groupsdata;

    echo'
    <script>
    window.location="../routes/dashboard.php";
    
     </script>
     ';
}
else
{
    echo'
    <script>
    alert("Invalid credential or user not not found!");
    window.location="../";
    
     </script>
     ';
}
?>