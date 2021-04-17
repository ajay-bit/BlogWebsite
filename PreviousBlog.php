<?php
include "Authen/auth.php";
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
<!-- fetch the data from session -->
<?php  if(isset($_SESSION['bookingUser_id'])): ?>
<?php   $id = $_SESSION['bookingUser_id']; ?>
<?php   $name = $_SESSION['name']; ?>
<?php endif; ?>
<!-- image insertion query  -->
<?php
// $connect = mysqli_connect("localhost", "root", "", "testing");
if(isset($_POST["insert"]))
{
$file = addslashes(file_get_contents($_FILES["image"]["tmp_name"]));
$rs=mysqli_query($con,"SELECT * FROM `image` WHERE `image`.`user_id`='$id'");
if (mysqli_num_rows($rs)>0)
{
$query = "UPDATE `image` SET `name`='$file',`user_id`='$id' WHERE `image`.`user_id` = $id";
$query_run = mysqli_query($con, $query);
header('Location:PreviousBlog.php');
exit;
}
$query = "INSERT INTO `image` (`id`,`name`, `user_id`) VALUES ('', '$file','$id');";
if(mysqli_query($con, $query))
{
}
}
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet"href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <link href='https://fonts.googleapis.com/css?family=Chelsea Market' rel='stylesheet'>
    <!-- <link rel="stylesheet" type="text/css" href="css/myDesign.css"> -->
    <title>Bloging</title>
    <style type="text/css">
    .img-profile{
    border-radius: 50%;
    }
    body,#profile{
    background: -webkit-linear-gradient(to right, #49a09d, #5f2c82);  /* Chrome 10-25, Safari 5.1-6 */
    background: linear-gradient(to right, #49a09d, #5f2c82); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
    }
    </style>
  </head>
  
  <body class="bg-right">
    
    <div class="container-fluid mt-3">
      <div class="row  mb-2">
        <div class="col-md-10 col-11 mx-auto">
          <nav aria-label="breadcrumb" class="mb-3 bg-common">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="#"><i class="fa fa-envelope-open mr-2" aria-hidden="true"></i>Home</a></li>
              <li class="breadcrumb-item"><a href="blog.php  ?>">User</a></li>
              <li class="breadcrumb-item active" aria-current="page">Profile settings</li>
              <a href="logout.php" class="justify-content-end text-danger font-weight-bold ml-auto">logout</a>
            </ol>
          </nav>
        </div>
      </div>
    </div>
    <div class="row mx-4">
      <!-- right side data -->
      <div class="col-lg-3 col-md-4d-md-block my-2">
        <div class="card bg-common card-left ">
          <div class="card-body">
            <nav class="nav d-md-block d-inline-block">
              <?php
              $query = "SELECT * FROM `image` WHERE `image`.`user_id`='$id'";
              $result = mysqli_query($con, $query);
              while($row = mysqli_fetch_array($result))
              {
              echo '
              <tr>
                <td>
                  <img src="data:image/jpeg;base64,'.base64_encode($row['name'] ).'" height="200" width="200" class="img-profile" />
                </td>
              </tr>
              ';
              }
              ?>
              <a data-toggle ="tab" class="nav-link active" aria-current="page" href="#profile"><i class="fa fa-user mr-1" aria-hidden="true"></i> Profile</a>
              <a data-toggle ="tab" class="nav-link" href="#account"><i class="fa fa-shield mr-1" aria-hidden="true"></i> Account</a>
              <form class="form-group-danger-file py-3" method="post" enctype="multipart/form-data">
                <input type="file" class="form-control-file bg-warning" name="image" id="image" required />
                <br />
                <div class="text-center">
                  <input type="submit" name="insert" id="insert" value="Profile Update" class="btn btn-info" />
                </div>
              </form>
            </nav>
          </div>
        </div>
      </div>
      <div class="col-lg-8 col-md-4d-md-block my-2">
        <div class="card bg-common card-left">
          <div class="card-body" id="profile">
            <!-- user profile started -->
            <div class="card-body tab-content border-0">
              <!-- actual profile data -->
              <div class="tab-pane active  " id="profile">
                <h4>Your Profile : <span class="text-warning  font-weight-bold"><?php  echo $name ?></h4></span>
                <hr>
                <form>
                  <?php
                  $id = $_SESSION['bookingUser_id'];
                  $query="Select * from blog WHERE `blog`.`bookingUser_id` = $id;";
                  $res=mysqli_query($con,$query);
                  $count=mysqli_num_rows($res);
                  while ($row=mysqli_fetch_array($res)) {
                  ?>
                  <div class="card mb-4">
                    <div class="card-header ">
                      <nav class="navbar navbar-light bg-light">
                        <div class="text-align-left"><h4><?php  echo $row['title']; ?></h4></div>
                        <form class="form-inline">
                          <div class="justify-content-end text-justify"> <h5>Blog Post on  : <?php  echo $row['blog_date']; ?></h5></div>
                          
                        </form>
                      </nav>
                      <!--  -->
                      <!--  -->
                    </div>
                    <div class="card-body">
                      <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-12">
                          <div class="mb-4 mr-4">
                            <?php
                            
                            
                            echo '
                            
                            
                            <img src="data:image/jpeg;base64,'.base64_encode($row['image'] ).'" height="200" width="200" />
                            
                            ';
                            
                            ?>
                          </div>
                          <h6> Post At : <?php  echo $row['blog_time']; ?></h6>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12 justify-content-end">
                          
                          <!-- <h2>Post :</h2><div class="d-inline-block text-truncate"></p> -->
                          <p class="text-justify text-nowrap" >
                            <h4>Your Post :</h4><?php  echo $row['Post']; ?>
                          </p>
                          <br>
                          <br>
                          <h4>Your Self : </h4> <?php echo $row['About']; ?>
                        </div>
                      </div>
                    </div>
                  </div>
                  <?php } ?>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    
  </div>
</body>
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</html>