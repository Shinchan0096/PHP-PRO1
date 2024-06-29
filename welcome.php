<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">XY HOSTIPAL</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="d-flex">
                <a href="logout.php"><button class="btn btn-outline-danger">LOGOUT</button></a>
            </div>
        </div>
    </nav>
    <?php
        $servername = "localhost";
        $username = "root";
        $pass = "";
        $db = "doctor";
    
        $conn = mysqli_connect($servername,$username,$pass,$db);
    
        if($conn)
        {
          session_start();
          $email = $_SESSION["email"];
          $sql = "SELECT * FROM DOCTOR WHERE EMAIL = '$email'";
          $result = $conn->query($sql);
          $row = $result->fetch_assoc();
          $name = $row["DNAME"];
        }
        else
        {
          echo "FALIED TO CONNECT TO DATABASE!";
        }
        echo"<div class='alert alert-success' role='alert'>
        <p>LOGIN SUCESSFULLY</p><h2>WELCOME Dr. $name </h2>
      </div> ";
    ?>
    <div class="container mt-3">
      <?php
        // Select all records
        $sql = "SELECT * FROM PAT";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) 
        {
            echo "<table class='table table-bordered table-hover'><tr class='table-light'><thead class='thead-dark'><th>PID</th><th>Name</th><th>Age</th><th>Problem</th><th>Mob_no</th><th>ACTIONS</th></thead></tr>";
            // Output data of each row
            while($row = $result->fetch_assoc()) 
            {
                echo "<tr><td>".$row["PID"]."</td><td>".$row["PNAME"]."</td><td>".$row["AGE"]."</td><td>".$row["PROBLEM"]."</td><td>".$row["MOB_NO"]."</td><td><a class='btn btn-success' href='update.php?PID=$row[PID]'>EDIT</a>  <a class='btn btn-danger' href='delete.php?PID=$row[PID]'>DELETE</a></td></tr>";
            }
            echo "</table>";
        } 
        else 
        {
            echo "0 results";
        }
      ?>
    </div>
    <div class="container">
    <h4>Add new record</h4><a href="insert.php"><button class="btn btn-primary" href="insert.php">CLICK HERE</button></a>
    </div>


    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

  </body>
</html>