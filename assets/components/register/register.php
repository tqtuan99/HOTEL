<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="../../components/register/register.css">
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
            REGISTER ACCOUNT
         </p>

         <div class="cont-form">
            <div class="cont-name">
               <label for="" class="lbl-name">First Name</label>
               <div>
                  <input type="text" name="firstname" class="name input" placeholder="first name" required>
               </div>
            </div>

            <div class="cont-name">
               <label for="" class="lbl-name">Last Name</label>
               <div>
                  <input type="text" name="lastname" class="name input" placeholder="last name" required>
               </div>
            </div>
         </div>

         <div class="cont-form">
            <label for="" class="lbl-sex">Gender:</label>
            <div>
                 <input type="radio" class="input-radio" name="gender" value="Male" required>
                 <label for="html">Male</label><br>
            </div>
            <div>
                 <input type="radio" class="input-radio" name="gender" value="Female" required>
                 <label for="css">Female</label><br>
            </div>
            <div>
                 <input type="radio" class="input-radio" name="gender" value="Other" required>
                 <label for="javascript">Other</label>
            </div>
         </div>

         <div class="cont-form">
            <label for="" class="lbl-email">Email</label>
            <input type="email" name="email" class="input email" placeholder="example@gmail.com" required>
         </div>
         <div class="cont-form">
            <label for="" class="lbl-pass">Password</label>
            <div class="cont-pass">
               <input type="password" name="password" class="input pass" placeholder="password" required>
               <i class="far fa-eye"></i>
            </div>
         </div>
         <div class="cont-form">
            <label for="" class="lbl-pass">Retype Password</label>
            <div class="cont-pass">
               <input type="password" name="retypepassword" class="input pass" placeholder="retype password" required>
               <i class="far fa-eye"></i>
            </div>
         </div>

         <div class="cont-form">
            <div class="remember">
               <input type="checkbox" class="chk-remember" required>
               <label for="" class="lbl-remember">To create an account, please agree to our terms at <a href="#">Terms &
                     Privacy</a>.</label>
            </div>
         </div>

         <button type="submit" name="submit" class="btn signin">Register</button>
         <!-- import handle rigister -->
         <?php
         include 'handleRigister.php';
         ?>

         <hr class="line">

         <p class="account">Do you have an account? <Span class="create-account">
               <a href="../login/login.php">Login</a></Span></p>
      </form>
   </div>
   <script src="../login/login.js"></script>

</html>