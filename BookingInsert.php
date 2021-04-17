<?php
//session start.....
session_start();

$server ="localhost";
$username ="root";
$password ="";
$db = "check";


$con = mysqli_connect($server,$username,$password,$db);

if($con){
   echo "datbase connect";
}
else{
    echo"no connection";
    die("no connection". mysqli_connect_error());
}



if(isset($_REQUEST['email']))
{
    echo $name=$_POST['name'];
    echo $email=$_POST['email'];
    echo $mobile=$_POST['mobile'];
    echo $gender=$_POST['gender'];
    echo $password=$_POST['password'];
}

extract($_POST);
$rs=mysqli_query($con,"SELECT * FROM `register` WHERE `register`.`email_id`='$email'");
if (mysqli_num_rows($rs)>0)
{
  $_SESSION['error']="You are already Registered !!! Please Login to Continue....";
  exit;
header('Location:index.php');

}


$query="INSERT INTO `register` (`bookingUser_id`, `name`, `email_id`, `mobile`, `gender`, `password`) VALUES ('', '$name', '$email', '$mobile', '$gender', '$password')";

$res = mysqli_query($con , $query);


    if($res){
     echo"inserted";
     header('Location:bookingLogin.php');

    }else{
      
      echo "not inserted........";
    }


?>