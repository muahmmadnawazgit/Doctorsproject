<?php

session_start();

if(!isset($_SESSION["email"]) ){
  header("location:otp.php");
}



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    
  <!-- Template Main CSS File -->
  <link rel="stylesheet" href="../Medilab/assets/css/login.css?v=<?php echo time();?>">

<!-- bootstrap  css link -->
 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" 
 integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

<!-- bootstrap js link-->
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" 
 integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <title>Document</title>

</head>
<body>


<!-- <?php
//   $phone=$_SESSION["number"];



// $servername="localhost";
//  $username="root";
//  $password="";
//  $dbname="registration";
 
 
//  $conn=new mysqli($servername,$username,$password,$dbname);
 
//  if($conn->connect_error){
//      echo "connection failed";
//  }
//  else{

//   $update = "UPDATE persons SET verify='1' WHERE phone='$phone'";
//   if ($conn->query($update) === TRUE) {
//    ?>
//    <script>
//    alert("<?php //echo $email ?>");
//     </script>
//    <?php

//   }
//   else{
//    ?>
//    <script>
//    alert($email);
//    </script>
//    <?php
//   }

// }
 ?> -->




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


  if(isset($_POST["login"])){

  $phone=$_POST["phone"];
  $password=$_POST["password"];



$email_check="SELECT * FROM persons WHERE phone='$phone'";
$query=mysqli_query($conn,$email_check);
$email_count=mysqli_num_rows($query);



if($email_count){
  $email_pass=mysqli_fetch_assoc($query);
// if($email_pass['verify']=="1"){
  $db_pass=$email_pass['password'];
  $pass_decode=password_verify($password,$db_pass);


  if($pass_decode){

  ?>
  <script>alert('Welcome Back');
   document.location.href='../index.php';
     </script>
     <?php


}  
 else{
  ?>
 <script>alert('INvalid phone or password');
 document.location.href='login.php';
 </script>

  <?php
}
 }
}

}
//}

?>


<div class="header">
<nav class="navbar navbar-expand-sm navbar-light bg-light">
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
  <a  href="register.php" class="btn btn-success">Register</a>
</ul>
</div>
</nav>
</div>


 <section id="appointment" class="appointment section-bg">
      <div class="container">
      
      <div class="section-title">
          <h4>PLEASE LogIn</h4>
        </div>

        <form action="<?php echo htmlentities($_SERVER['PHP_SELF']);?>" method="post"  class="php-email-form">

            <div class="row">
            <div class="col-md-4 form-group mt-3 mt-md-0">
              <input type="tel" class="form-control" name="phone"  placeholder="Enter Your number" required>
            </div>
          </div>

            
          <div class="row">
            <div class="col-md-4 form-group mt-3">
              <input type="password" name="password" class="form-control" placeholder="Enter Your password" required>
            </div>
            </div>



            <div class="form-group mt-3">
          <div class="text-center">
            <input class="btn btn-success" type="submit"  name="login">
        </div>

        
        </form>

      </div>
    </section>

</body>
</html>