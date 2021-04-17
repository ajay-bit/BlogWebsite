<?php
//session start......
include "Authen/auth.php";
?>
<?php
$connect = mysqli_connect("localhost", "root", "", "check");

?>
<!-- fetch the data from session -->
<?php  if(isset($_SESSION['bookingUser_id'])): ?>
<?php  $id = $_SESSION['bookingUser_id']; ?>

<?php endif; ?>
<?php



// insertion code...

if(isset($_POST["insert"]))
{     $title=$_POST['title'];
$date_blog=$_POST['date_blog'];
$About=$_POST['About'];
$occup=$_POST['Occupation'];

$place=$_POST['place'];

$blog=$_POST['blog'];


$file = addslashes(file_get_contents($_FILES["image"]["tmp_name"]));
//$query = "INSERT INTO image(`name` ,`user_id`,) VALUES ('$file',$user_id)";

$query ="INSERT INTO blog (`blog_id`, `bookingUser_id`, `title`, `blog_date`, `image`, `About`, `Occupation`, `Place`, `Post`, `blog_time`) VALUES ('', '$id', '$title', '$date_blog','$file','$About','$occup','$place','$blog',current_timestamp())";
if(mysqli_query($connect, $query))
{
// echo '<script>alert("Image Inserted into Database")</script>';
  header('Location:PreviousBlog.php');
}
}
?>

<!-- insertion end -->
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet"href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link href='https://fonts.googleapis.com/css?family=Chelsea Market' rel='stylesheet'>
    <link rel="stylesheet" type="text/css" href="css/myDesign.css">
    <!-- <title>Admin Panel</title> -->
    <!-- image insertion -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <style type="text/css">
    #sty{
    font-size: 20px;
    font-weight: bold;
    }
    body{
    background: -webkit-linear-gradient(to right, #49a09d, #5f2c82);  /* Chrome 10-25, Safari 5.1-6 */
    background: linear-gradient(to right, #49a09d, #5f2c82); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
    }
    #bgty{
    font-size: 20px;
    font-weight: bold;
    }
    </style>
  </head>
  <body>
 
    <div class="container">

    <!--fetch the data from database  to preview.  -->
      
      <?php
      $query="Select * FROM register WHERE bookingUser_id=$id";
      $res=mysqli_query($con,$query);
      $data=mysqli_fetch_array($res)
      
      ?>
   <!-- side nav -->
    <ul class="nav justify-content-end">
      <li class="nav-item">
        <a id="bgty" class="nav-link active text-white" href="#">Hello ! <?php echo $data['name'] ?> </a>
      </li>
      
      <li class="nav-item">
        <a id="bgty" class="nav-link text-info" href="#">Logout</a>
      </li>
      
    </ul>
      <div class="row">
        <div class="col-lg-10 offset-1 ">
          <fieldset disabled>
            <div class="form-group">
              <label id="sty" for="disabledTextInput">Name : </label>
              <input type="text" id="disabledTextInput" class="form-control" value="<?php echo $data['name'] ?>">
            </div>
            
            <div class="form-row">
              <div id="sty" class="col">
                Mobile :<input type="number" class="form-control" value="<?php echo $data['mobile'] ?>">
              </div>
              <div id="sty" class="col">
                Email : <input type="text" class="form-control" value=" <?php echo $data['email_id'] ?>">
              </div>
            </div>
          </div>
        </fieldset>
      </div>
    </div>
  </div>
</form>
<div class="container my-4">
  <div class="row">
    <div class="col-lg-10 offset-1">
      
      <form method="post" enctype="multipart/form-data">
        <div class="form-group">
        </div>
        <div class="form-group">
          <div class="form-row">
            <div id="sty"class="col">
              Title :<input type="text" class="form-control" placeholder="Enter title" name="title" required>
            </div>
            <div  id="sty" class="col">
              Date : <input type="date" class="form-control" name="date_blog" required>
            </div>
            <div  id="sty" class="col">
              Select Image : <input type="file" name="image" id="image" class="form-control" required/>
            </div>
          </div>
        </div>
        <div class="form-row">
          <div id="sty" class="col ">
            About your self :<textarea class="form-control"  rows="2" name="About" required></textarea>
          </div>
          <div id="sty" class="col ">
            Place : :<textarea class="form-control"  rows="2" name="place" required></textarea>
          </div>
          <div id="sty" class="col ">
            <!-- Image: :<textarea class="form-control"  rows="2" name="occup" required></textarea> -->
            Occupation :<textarea class="form-control"  rows="2" name="Occupation" required></textarea>
            
          </div>
        </div>
        <div class="form-group">
          <label for="exampleFormControlTextarea1" id="sty">Add Post :</label>
          <textarea class="form-control"  rows="4" name="blog" required></textarea>
        </div>
        <div class="form-row text-center">
          <div id="sty"class="col">
            <?php
            //set the seesion from the session
             $_SESSION['bookingUser_id']=$_SESSION['bookingUser_id'];
             $_SESSION['name']= $data['name'];
            ?>
            <input type="submit" name="insert" id="insert" value="Submit" class="btn btn-info" />
          </div>
          
        </form>


         <div  id="sty" class="col">
              <form action="PreviousBlog.php" method="post">
                <input type="hidden" name="id" >
                <input type="submit" value="Previous Blog" name="bdata" id="btn-get-started" class="btn btn-danger justify-content-end">
              </form>
            </div>

        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
      </body>
    </html>