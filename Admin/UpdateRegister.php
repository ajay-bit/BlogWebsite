<?php
include "../Authen/adminAuth.php";
$server ="localhost";
$username ="root";
$password ="";
$db = "check";
$con = mysqli_connect($server,$username,$password,$db);
if($con){
// echo "datbase connect";
}
else{
echo"no connection";
die("no connection". mysqli_connect_error());
}

if(isset($_POST['submit']))
{
  $id=$_REQUEST['id'];                  
  $name=$_POST['name'];
  $email=$_POST['email'];
  $mobile=$_POST['mobile'];
  $password=$_POST['password'];
}

$query = "UPDATE `register` SET `name` = '$name',`email_id` = '$email',`mobile` = '$mobile',`password` = '$password' WHERE `register`.`bookingUser_id` = $id;";

  $query_run = mysqli_query($con, $query);

    if($query_run)
    {
     "Your Data is Updated";
     
       $_SESSION['success']="updated succesfully...";
       header('Location:registerShow.php'); 
    }
    else
    {
     "Your Data is NOT Updated";
     
        header('Location:registerShow.php');
    }


?>