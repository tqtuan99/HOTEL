<?php
session_start();

?>
<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="../../components/login/login.css">
   <link rel="stylesheet" href="../../../assets/font/fontawesome-free-5.15.4-web/css/all.min.css">
   <title>Login Form </title>
</head>

<body>
   <div class="container">
      <div id="slider">
         <div class="slides">
            <img src="../../image/item-slider-login/slider-login1.jpg" alt="show">
            <p>Welcome to hotel ❤ Serving you is our pleasure!</p>
         </div>

         <div class="slides">
            <img src='../../image/item-slider-login/slider-login2.jpg' alt="show">
            <p>Welcome to hotel ❤ Serving you is our pleasure!</p>
         </div>

         <div class="slides">
            <img src="../../image/item-slider-login/slider-login3.jpg" alt="show">
            <p>Welcome to hotel ❤ Serving you is our pleasure!</p>
         </div>

         <div class="slides">
            <img src="../../image/item-slider-login/slider-login4.jpg" alt="show">
            <p>Welcome to hotel ❤ Serving you is our pleasure!</p>
         </div>
      </div>

      <form method="POST">
         <p class="title">
            Login
         </p>
         <div class="cont-form">
            <label for="" class="lbl-email">Email</label>
            <input type="email" name="email" class="input email" placeholder="example@gmail.com" value="<?php if(isset($_COOKIE['username'])) echo $_COOKIE['username']; else echo (isset($_GET['email']))?$_GET['email']:'';?>" required>
         </div>
         <div class="cont-form">
            <label for="" class="lbl-pass">Password</label>
            <div class="cont-pass">
               <input type="password" name="password" class="input pass"  placeholder="password" value="<?php if(isset($_POST['password'])) {}else if(isset($_COOKIE['password'])) echo $_COOKIE['password'];?>"  required>
               <i class="far fa-eye"></i>
            </div>
         </div>
         <div class="cont-form">
            <div class="remember">
               <input type="checkbox" name="chk-remember" <?php if(isset($_COOKIE['username'])) { ?> checked <?php } ?> class="chk-remember" value="1">
               <label for="" class="lbl-remember">Remember me</label>
            </div>
            <a href="../forgotPass/forgotPass.php" style="text-decoration: none; color: #000;" class="forgot-password">Forgot your password?</a>
         </div>
         <button type="submit" name="submit" class="btn signin">Sign in</button>
         <!-- import file login -->
         <?php
         include 'handleLogin.php';
         ?>
         <hr class="line">
         <h5 class="txt-sign">Or sign in with</h5>
         <div>
            <button type="button" class="btn facebook">
               <i class="fab fa-facebook"></i>Login with Facebook
            </button>
            <button type="button" class="btn google">
               <div class="content-svg">
                  <img src="../../image/google+.svg" alt="Google">
               </div>
               Login with Google+
            </button>
         </div>
         <p class="account">Don't have an account? <Span class="create-account"> <a href="../register/register.php">Create an account</a></Span></p>
      </form>

   </div>
   <script src="./login.js"></script>

</html>