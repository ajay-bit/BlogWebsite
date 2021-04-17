<?php

//session start.....
session_start();

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



if(isset($_REQUEST['email']))
{
    echo $name=$_POST['user_name'];
    echo $email=$_POST['email'];
    echo $message=$_POST['message'];
}


$query="INSERT INTO `contact` (`name`, `email`, `message`) VALUES ('$name', '$email', '$message');"; 

$res = mysqli_query($con , $query);


    if($res){
     echo"inserted";
     $_SESSION['message']="your message has been sent";
     header('Location:index.php');

    }else{
      
      echo "not inserted........";
    }


?>