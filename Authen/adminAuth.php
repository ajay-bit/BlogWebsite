<?php

$server ="localhost";
$username ="root";
$password ="";
$db = "check";


$con = mysqli_connect($server,$username,$password,$db);

if($con){
  
}
else{
    echo"no connection";
    die("no connection". mysqli_connect_error());
}


session_start();
if(!isset($_SESSION['auth'])) 
{

header('Location:AdminLogin.php');

}

?>