<?php

session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    
  <!-- Template Main CSS File -->
  <link rel="stylesheet" href="../Medilab/assets/css/register-login.css?v=<?php echo time();?>">

<!-- bootstrap  css link -->
 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" 
 integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

<!-- bootstrap js link-->
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" 
 integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <title>Document</title>

</head>
<body>



<?php

$servername="localhost";
$username="root";
$password="";
$dbname="registration";


$conn=new mysqli($servername,$username,$password,$dbname);

if($conn->connect_error){
    echo "connection failed";
}
else{


if(isset($_POST["submit"])){
$name=mysqli_real_escape_string($conn,$_POST["name"]);
$email=mysqli_real_escape_string($conn,$_POST["email"]);
$gender=mysqli_real_escape_string($conn,$_POST["gender"]);
$password=mysqli_real_escape_string($conn,$_POST["password"]);
$cpassword=mysqli_real_escape_string($conn,$_POST["cpassword"]);






if($password==$cpassword){

  $emailquery="SELECT * FROM persons WHERE email='$email'";
  $query=mysqli_query($conn,$emailquery);

  $emailcount=mysqli_num_rows($query);




   if($emailcount > 0){
    ?>
    <script>alert("user already exists");</script>
    <?php
   }
   
   else{
    
$pass=password_hash($password,PASSWORD_BCRYPT);
$cpassword=password_hash($cpassword,PASSWORD_BCRYPT);

    $sql=("INSERT INTO persons (name,email,verify,gender,password,cpassword)VALUES('$name','$email','0','$gender','$pass','$cpassword')");

    if($conn->query($sql)){
      
$_SESSION["email"]=$email;

      ?>

          <script>
          alert("user registered successfully Plz Verify OTP");
          document.location.href="otp.php";
        </script>
      <?php
   


    }else{
      ?>
      <script>alert("Error in registerings");
      document.location.href="register.php";
      </script>
     <?php
    }

   }


}else{

?>
<script>
alert("password does not match");
  document.location.href="register.php";
  </script>
<?php

}
}
}

?>
<div class="header">
<nav class="navbar navbar-expand-sm navbar-light bg-light ">
<div class="container-fluid">
    <a class="navbar-brand" href="#">Medilab</a>
    <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#items"><span class="navbar-toggler-icon"></button>
<div class="collapse navbar-collapse" id="items">
<ul class="navbar-nav ms-auto">
  <li class="navbar-item"><a class="navbar-link" href="#">Home</a></li>
  <li class="navbar-item"><a class="navbar-link" href="#">About</a></li>
  <li class="navbar-item"><a class="navbar-link" href="#">Service</a></li>
  <li class="navbar-item"><a class="navbar-link" href="#">Doctor</a></li>
  <li class="navbar-item"><a class="navbar-link" href="#">Contact</a></li>
  <a  href="login.php" class="btn btn-success">LogIn</a>
</ul>
</div>
</nav>
</div>

 <section id="appointment" class="appointment section-bg">
      <div class="container">
      
      <div class="section-title">
          <h4>PLEASE FILL INFORMATION</h4>
        </div>

        <form action="<?php echo htmlentities($_SERVER['PHP_SELF']);?>" method="post"  class="php-email-form">

          <div class="row">
            <div class="col-md-4 form-group mb-3">
              <input type="text" name="name" class="form-control"  placeholder="Your Name">
            </div>
            </div>


            <div class="row">
            <div class="col-md-4 form-group mt-3 mt-md-0">
              <input type="email" class="form-control" name="email"  placeholder="Your Email">
            </div>
          </div>


          <div class="row">
            <div class="col-md-4 form-group mt-3">
              <select name="gender" id="gender" class="form-select" placeholder="Gender">
                <option value="Male">Male</option>
                <option value="Female">Female</option>
                <option value="prefer not to say">Prefer Not to say</option>
              </select>
            </div>


            
          <div class="row">
            <div class="col-md-4 form-group mt-3">
              <input type="password" name="password" class="form-control " placeholder="Enter Your password">
            </div>
            </div>

            
          <div class="row">
            <div class="col-md-4 form-group mt-3">
              <input type="password" name="cpassword" class="form-control "  placeholder="Confirm password">
            </div>
            </div>
           
           </div>

          <div class="form-group mt-3">
          <div class="text-center">
            <input class="btn btn-success" type="submit" name="submit">
        </div>
        </form>
      </div>
    </section>
</body>
</html>