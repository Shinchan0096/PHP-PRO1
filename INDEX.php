<!doctype html>
<html lang="en">
  <head>
    <style>
      body
      {
        background-image : url(hospital.png);
      }
    </style>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>login_form</title>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <div class="container-fluid">
      <a class="navbar-brand" href="#">XY HOSTIPAL</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
      </div>
    </nav>

    <div class="container mt-3 w-25" id="op">
      <h2>DOCTOR LOGIN </h2>
      <form method="post" action="">
        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">Email address</label>
          <input type="email" class="form-control" id="exampleInputEmail1" name="email">
        </div>
        <div class="mb-3">
          <label for="exampleInputPassword1" class="form-label">Password</label>
          <input type="password" class="form-control" id="exampleInputPassword1" name="pass">
        </div>
        <button type="submit" class="btn btn-primary" name="submit">Submit</button>
      </form>
    </div>
    
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

  </body>
</html>
<?php
  if(isset($_POST['submit']))
  {
    $servername = "localhost";
    $username = "root";
    $pass = "";
    $db = "doctor";

    $conn = mysqli_connect($servername,$username,$pass,$db);

    if($conn)
    {
      $email = $_POST['email'];
      $pass = $_POST['pass'];
      $sql = "SELECT * FROM DOCTOR WHERE EMAIL = '$email' AND PASS = '$pass'";
      $q = mysqli_query($conn,$sql);
      $count = mysqli_num_rows($q);
      if($count == 1)
      {
        session_start();
        $_SESSION["email"] = $email;
        header("location:welcome.php");
      }
      else
      {
        echo '<script>alert("INVALID EMAIL OR PASSWORD!")</script>';
      }
    }
    else
    {
      echo "FALIED TO CONNECT TO DATABASE!";
    }
  }
    