<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/bootstrap.min.js"></script>
    
    <link rel="stylesheet" href="login.css">
 
    <link rel="stylesheet" href="nav.css">
    <title>Login</title>
</head>
<body class="body">
  <?php
    include 'nav.php';
  ?>
     <?php
           
           $username=$pass=$err="";
         include 'connection.php';
           if(isset($_POST['login']))
           {
               //echo "ok";
               $username=$_POST['username'];
               $pass=$_POST['pass'];
               $query="SELECT * FROM registration_student WHERE username='$username' AND pass='$pass'";
                 //echo $query;
               $result=mysqli_query($con,$query);
               $count=mysqli_num_rows($result);
               //echo $count;
               if($count==1)
               {
                   $ok=mysqli_fetch_assoc($result);
                   //var_dump($ok);
                   session_start();
                   $_SESSION['id']=$ok['id'];
                   $_SESSION['uname']=$ok['fname'];
                   
                   header('location:index.php');
                   //echo"<script>alert('LOGIN SUCCESSFULLY')</script>";
               }
               else
               {
                   echo"<script>alert('LOGIN FAILED....try again')</script>";
               }
   
               
           }
       
       ?>

    <div class="container">
          <div class="row  mt-5 pt-5 pb-5">
             <div class=" border shadow col col-12 col-sm-12 col-md-6 offset-md-3 mt-5 mb-5 bg-light text-dark">
                  <span style="font-size:16px"><a href="registration.php"><img src="img/left.png" height="20px" alt="Back"></a></span>
                     <form action="login.php" method="post" class=" p-3 m-2 ">
                            <h3 class="text-center  "><span class="login">Login</span> </h3>
                                <div class="row ">
                                   <div class="col-12 col-sm-12 col-md-8  offset-md-2">
                                     <label class="" for="">Username</label>
                                     <input type="email" class="form-control " name="username" placeholder="Email Id" id="" required>
                                   </div>
                                   <div class="col-12 col-sm-12 col-md-8  offset-md-2">
                                     <label class="" for="">Password</label>
                                     <input type="password" class="form-control " name="pass" placeholder="" id="" required>
                                   </div>
                                 </div>
                                 <div class="row">
                                      <div class="col-12 col-sm-12 text-center mt-3 mb-3 ">
                                      <input type="submit" value="Login" name="login" class="btn btn-primary  ">
                                      <a href="forgetpass.php" class="text-dark">Forget Password? </a>
                                 </div>
                      </form>
                      
             </div>
            
         </div>
        
       </div>
      </div>
       <?php  include 'footer.php';  ?>
      
</body>
</html>