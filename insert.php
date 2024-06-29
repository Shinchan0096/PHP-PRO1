<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>INSERT</title>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand">XY HOSTIPAL</a>
            <div class="d-flex">
                <a href="logout.php"><button class="btn btn-outline-danger">LOGOUT</button></a>
            </div>
        </div>
    </nav>

    <div class="container">
    <H4>INSERT NEW RECORD</H4>
    </div>
    
    <div class="container w-70 mt-3">
    <form method="post" action="" class="w-70">
    <div class="mb-3">
        <label for="PID" class="form-label"><b>PID</b></label>
        <input type="text" class="form-control" name="PID">
    </div>
    <div class="mb-3">
        <label for="NAME" class="form-label"><b>NAME</b></label>
        <input type="text" class="form-control" name="NAME">
    </div>
    <div class="mb-3">
        <label for="AGE" class="form-label"><b>AGE</b></label>
        <input type="digit" class="form-control" name="AGE">
    </div>
    <div class="mb-3">
        <label for="PROBLEM" class="form-label"><b>PROBLEM</b></label>
        <input type="text" class="form-control" name="PROBLEM">
    </div>
    <div class="mb-3">
        <label for="MOB_NO" class="form-label"><b>MOBILE NO</b></label>
        <input type="text" class="form-control" name="MOB_NO">
    </div>
    <button type="submit" class="btn btn-info" name="submit">Submit</button>
    </form>
    </div>

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
                $PID = $_POST['PID'];
                $NAME = $_POST['NAME'];
                $AGE = $_POST['AGE'];
                $PROBLEM = $_POST['PROBLEM'];
                $MOB_NO = $_POST['MOB_NO'];

                $sql = "INSERT INTO PAT VALUES ('$PID', '$NAME', '$AGE','$PROBLEM','$MOB_NO')";

                if ($conn->query($sql) === TRUE) 
                {
                    echo '<script>alert("NEW RECORD INSERTED SUCESSFULLY")</script>';
                } 
                else 
                {
                    echo "Error : " . $sql . "<br>" . $conn->error;
                }
            }
            else
            {
            echo "FALIED TO CONNECT TO DATABASE!";
            }
        }
    ?>

    <br><br>
    <div class="container">
    <h4>GO TO DASHBOARD</h4><a href="welcome.php"><button class="btn btn-primary" href="insert.php">CLICK HERE</button></a>
    </div>


    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

  </body>
</html>