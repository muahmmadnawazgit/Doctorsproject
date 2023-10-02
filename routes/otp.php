
  <?php

session_start();




if(!isset($_SESSION["email"])){
  header("location:register.php");
  }


?>

<!DOCTYPE html>
<html lang="en">
<head>


    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    
  <!-- Template Main CSS File -->
  <link rel="stylesheet" href="../Medilab/assets/css/otp.css?v=<?php echo time();?>">

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
 $email=$_SESSION["email"];

 $servername="localhost";
 $username="root";
 $password="";
 $dbname="registration";

 $conn=new mysqli($servername,$username,$password,$dbname);

 if($conn->connect_error){
     echo "connection failed";
 }
 else{
 

if(isset($_POST["send_otp"])){


//  $number=mysqli_real_escape_string($conn,$_POST["number"]);

//  $_SESSION["number"]=$number;


//   $sql="UPDATE persons SET phone='$number' WHERE email='$email'"; 

//   if($conn->query($sql)){
 
//     $verify="UPDATE persons SET verify='1' WHERE email='$email'"; 
//     if($conn->query($verify)){
       ?>
     <script>
      alert("hello there");
     </script>
    <?php

//     }

//   }
 
}
}

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
  <a  href="register.php" class="btn btn-success">Login</a>
</ul>
</div>
</nav>
</div>


 <section id="appointment" class="appointment section-bg">
      <div class="container">
      
      <div class="section-title">
          <h4>Verify OTP</h4>
        </div>

        <form action="<?php echo htmlentities($_SERVER['PHP_SELF']);?>"  method="post">
        <div class="row">
            <div class="col-md-4 form-group mt-3">
              <input type="text" name="number" id="number" class="form-control" placeholder="Enter Your number">
             </div>
        </div>

        <div class="row">
           <div class="col-md-4 form-group mt-3" id="recaptcha-container"></div>
        </div>

           <div class="row">
              <div class="form-group mt-3">
              <a class="btn btn-success"  name="send_otp" id="send_otp" >send_otp</a>
             </div>

</div>

</form>

<form action="<?php echo htmlentities($_SERVER['PHP_SELF']);?>" method="post" >


<div id="verifier">

<div class="row">
   <div class="col-md-4 form-group mt-1">
      <input type="text" name="otp" id="verificationCode" class="form-control" placeholder="Enter Your OTP">
    </div>
</div>

     <div class="row">
              <div class="form-group mt-3">
              <a class="btn btn-success"  name="verify" id="verify">Verify</a>
      </div>
      </div> 


        
        </form>

      </div>
    </section>





    <script src="https://www.gstatic.com/firebasejs/6.0.2/firebase.js"></script>
<script>
// For Firebase JS SDK v7.20.0 and later, measurementId is optional
const firebaseConfig = {
  apiKey: "AIzaSyCr60XPHVETVSkaOn6JAxzG4ESArPGrzkc",
  authDomain: "dentist-project-7257f.firebaseapp.com",
  projectId: "dentist-project-7257f",
  storageBucket: "dentist-project-7257f.appspot.com",
  messagingSenderId: "357398461471",
  appId: "1:357398461471:web:209c7386e655824f6c692a",
  measurementId: "G-RR5QZ1BDPC"
};

firebase.initializeApp(firebaseConfig);
render();

function render(){
  window.recaptchaVerifier=new firebase.auth.RecaptchaVerifier('recaptcha-container');
recaptchaVerifier.render();

}


document.querySelector('#send_otp').addEventListener('click', function(){
  var number=document.getElementById('number').value;
firebase.auth().signInWithPhoneNumber(number,window.recaptchaVerifier).then(function(confirmationResult){
  window.confirmationResult=confirmationResult;
  // coderesult=confirmationResult;
  // document.getElementById('sender').style.display='none';
  document.getElementById('verifier').style.display="block";

}).catch(function(error){
  alert(error.message);
})
}
)

document.querySelector('#verify').addEventListener('click', function(){
var code=document.getElementById('verificationCode').value;
confirmationResult.confirm(code).then(function (){

document.location.href="login.php";




}).catch(function (){

  alert("Otp Code is Incorrect.!");
  document.location.href="otp.php";

})
}); 



</script>
</body>
</html>