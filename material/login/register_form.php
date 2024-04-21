<?php

@include 'koneksi.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>register form</title>
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
   <link rel="stylesheet" href="css/style.css">
   <style>
      .c-h {
         height: 100vh;
      }

      .error-msg {
         color: red;
      }

      .bg-grad {
         background: rgb(255, 158, 0);
         background: linear-gradient(47deg, rgba(255, 158, 0, 1) 0%, rgba(255, 0, 86, 1) 49%, rgba(93, 9, 121, 1) 100%)border-box;
      }

      p {
         margin: 0px;
         padding: 0px;
      }

      .btn p {
         color: white;
      }
   </style>
   <link rel="stylesheet" href="css/style.css">

</head>

<body>
   <div class="container c-h d-flex justify-content-center align-items-center ">
      <div class="card w-50 d-flex flex-row justify-content-center">
         <form class=" w-100 " action="../user/proses" method="post">
            <div class="con m-3">
               <center class=" text-capitalize ">
                  <h3>Register now</h3>
               </center>
               <?php
               if (isset($error)) {
                  foreach ($error as $error) {
                     echo '<span class="error-msg">' . $error . '</span> <br>';
                  };
               };
               ?>
               <label class=" mb-2" for="username">Username</label> <br>
               <input class="form-control" type="text" name="NamaLengkap" required placeholder="enter your Username"><br>
               <label class=" mb-2" for="NamaLengkap">Nama Lengkap</label> <br>
               <input class="form-control" type="text" name="name" required placeholder="enter your Full Name"><br>
               <label class=" mb-2" for="Email">Email</label> <br>
               <input class="form-control" type="email" name="email" required placeholder="enter your email"><br>
               <label class=" mb-2" for="Password">Password</label> <br>
               <input class="form-control" type="password" name="password" required placeholder="enter your password"><br>
               <label class=" mb-2" for="cpassword">Confirm Password</label> <br>
               <input class="form-control" type="password" name="cpassword" required placeholder="confirm your password"><br>
               <input class="form-control" type="hidden" name="level" placeholder="user" value="user">
               <center><button type="submit" name="submit" value="register now" class=" btn bg-grad w-100 mb-2">
                     <p>Register Now</p>
                  </button><br></center>
               <p>already have an account? <a href="login_form.php">login now</a></p>
            </div>
         </form>
      </div>
   </div>
</body>

</html>