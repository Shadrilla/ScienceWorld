
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>register</title>
   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="style.css">

</head>
<body>

<section class="form-container">

   <form action="" method="post" enctype="multipart/form-data">
      <h3>register now</h3>

      <p>your name <span>*</span></p>
      <input type="text" placeholder="enter your name" required maxlength="50" class="box" 
      name="username" >
      <p>your email <span>*</span></p>
      <input type="email" placeholder="enter your email" required maxlength="50" class="box" name="email" >
      <p>your password <span>*</span></p>
      <input type="password" name="password_1" placeholder="enter your password" required maxlength="20" class="box">
      <p>confirm password <span>*</span></p>
      <input type="password" name="password_2"  placeholder="confirm your password" required maxlength="20" class="box">
      <!-- <p>select profile <span>*</span></p>
      <input type="file" name="profile" accept="image/*" required class="box"> -->
      <input type="submit" value="register now" name="submit" class="btn">
      <p>Already have an account? do <a href="Mlogin.php">Login</a> </p>
   </form>
</section>


<!-- custom js file link  -->
<!-- <script src="js/script.js"></script> -->

   
</body>
</html>


<?php include('connection.php') ;

if(isset($_POST['submit'])){
   $username=$_POST['username'];
   $email=$_POST['email'];
   $password_1=$_POST['password_1'];
   $password_2=$_POST['password_2'];
   $duplicate = mysqli_query($con,"SELECT * FROM users WHERE 
   username='$username' OR email='$email'");
   if(mysqli_num_rows($duplicate)>0){
      ?>
      <script>alert("Username or email already taken ")</script>
      <?php
   }
   else if($password_1!=$password_2){
      ?>
       <script>alert("passwords doesn't match ")</script>
       <?php
   }
   else{
   $insertquery = "insert into users(username,email,password_1,password_2) values('$username','$email','$password_1','$password_2')";
     $res=mysqli_query($con,$insertquery);
     if($res){
       ?>
       <script>alert("Data inserted successfully ")</script>
       <?php
        header('location: Main Page/mainhome.html');
     }
     else{
      ?><script>alert("Data is not inserted  ")</script>
      <?php
     }
   }
}
?>