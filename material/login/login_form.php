<div class="hod visually-hidden ">
   <?php

   @include 'koneksi.php';

   session_start();

   if (isset($_POST['submit'])) {

      $name = mysqli_real_escape_string($conn, $_POST['username']);
      $email = mysqli_real_escape_string($conn, $_POST['email']);
      $pass = md5($_POST['password']);
      $cpass = md5($_POST['cpassword']);
      $level = $_POST['level'];

      

      $select = " SELECT * FROM user WHERE UserName = '$name' && Password = '$pass' ";

      $result = mysqli_query($conn, $select);

      if (mysqli_num_rows($result) > 0) {

         $row = mysqli_fetch_array($result);

         if ($row['level'] == 'user') {

            $_SESSION['username'] = $row['UserID'];
            header('location:../index.php');
         }
      } else {
         $error[] = 'incorrect username or password!';
      }
   };
   ?>
</div>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>login form</title>

   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
   <link rel="stylesheet" href="../style.css">
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
</head>

<body>
   <div class="container c-h d-flex justify-content-center align-items-center ">
      <div class="card w-50 d-flex flex-row justify-content-center ">
         <form class=" w-100 " action="" method="post">
            <div class="con m-3 ">
               <center class=" text-capitalize ">
                  <h3>login now</h3>
               </center>
               <?php
               if (isset($error)) {
                  foreach ($error as $error) {
                     echo '<span class="error-msg  ">' . $error . '</span><br>';
                  };
               };
               ?>
               <label class=" mb-2" for="username">username</label> <br>
               <input class="form-control" type="text" name="username" required placeholder="enter your username"> <br>
               <label class=" mb-2" for="password">Password</label> <br>
               <input class="form-control" type="password" name="password" required placeholder="enter your password"><br>
               <center><button type="submit" name="submit" value="Login" class="btn bg-grad w-100 mb-2">
                     <p>Login</p>
                  </button><br></center>
               <p>don't have an account? <a href="register_form">register now</a></p>
            </div>
         </form>
      </div>
   </div>
   <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>

   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>

</html>