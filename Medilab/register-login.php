<?php
session_start();

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>

    
  <!--  CSS File -->
  <link rel="stylesheet" href="assets/css/register-login.css?v=<?php echo time();?>">

    
 <!-- bootstrap  css link -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" 
  integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
 <!-- bootstrap js link-->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" 
  integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</head>
<body>



    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-6" id="register">
          <form action="../controllers/authentication.php" autocomplete="on" method="post">
            <label class="form-label">Name:</label>
            <input type="text" class="form-control" name="name">
            <label class="form-label">Email:</label>
            <input type="email" class="form-control" name="email">
            <label class="form-label">Phone:</label>
            <input type="tel" class="form-control" name="phone">
            <label class="form-label">password:</label>
            <input type="password" class="form-control" name="password">
            <label class="form-label">Confirm Password:</label>
            <input type="password" class="form-control" name="cpassword">
            <div class="button">
            <input type="submit" class="form-control" name="submit">
              </div>
             </form>
          </div>

       <div class="col-lg-12" id="login">
       <form action="../controllers/authentication.php?>"  autocomplete="on" method="post">
            <label class="form-label">Email:</label>
            <input type="email" class="form-control" name="email">
            <label class="form-label">password:</label>
            <input type="password" class="form-control" name="password">
            <div class="button">
            <input type="submit" class="form-control" name="login">
              </div>
             </form>
         </div>

     </div>
    </div>




</body>
</html>