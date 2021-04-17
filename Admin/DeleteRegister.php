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
?>
<?php
// fetch data from hidden form

if(isset($_POST['new']) && $_POST['new']==1)
{
echo $id=$_REQUEST['id'];
}


$query =  "DELETE FROM `register` WHERE `register`.`bookingUser_id` = $id";

mysqli_query($con, $query);
$_SESSION['delete']="deleted succesfully...";
header('Location:registerShow.php');


 ?>
