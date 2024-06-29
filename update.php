<?php 
    $servername = "localhost";
    $username = "root";
    $pass = "";
    $db = "doctor";

    $conn = mysqli_connect($servername,$username,$pass,$db);
    if(!$conn)
    {
        echo "ERROR FAILED TO CONNECT!!";
    }
    else
    {
        if($_SERVER["REQUEST_METHOD"]=='GET')
        {
            if(!isset($_GET['PID']))
            {
                header("location:welcome.php");
                exit;
            }
                $pid = $_GET['PID'];
                $sql = "SELECT * FROM PAT WHERE PID = $pid";
                $q = mysqli_query($conn,$sql);
                $row = $q->fetch_assoc();

                while(!$row)
                {
                    header("location:welcome.php");
                    exit;
                }
                $pid = $row['PID'];
                $name = $row['PNAME'];
                $age = $row['AGE'];
                $problem = $row['PROBLEM'];
                $mob_no = $row['MOB_NO'];
        }
        else
        {
            $PID = $_POST['PID'];
            $NAME = $_POST['NAME'];
            $AGE = $_POST['AGE'];
            $PROBLEM = $_POST['PROBLEM'];
            $MOB_NO = $_POST['MOB_NO'];

            $sql = "UPDATE PAT SET PID = '$PID' , PNAME = '$NAME', AGE = '$AGE', PROBLEM = '$PROBLEM', MOB_NO = '$MOB_NO' WHERE PID = '$PID'";

            $result = $conn->query($sql);

            if($result)
            {
                header("location:welcome.php");  
            }
            else
            {
                echo"SOME THING WENT WRONG";
            }
            
            
        }
    }

?>
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
        <input type="hidden" value="<?php echo $pid?>" class="form-control" name="PID">
    </div>
    <div class="mb-3">
        <label for="NAME" class="form-label"><b>NAME</b></label>
        <input type="text" value="<?php echo $name?>" class="form-control" name="NAME">
    </div>
    <div class="mb-3">
        <label for="AGE" class="form-label"><b>AGE</b></label>
        <input type="text" value="<?php echo $age?>" class="form-control" name="AGE">
    </div>
    <div class="mb-3">
        <label for="PROBLEM" class="form-label"><b>PROBLEM</b></label>
        <input type="text" value="<?php echo $problem?>" class="form-control" name="PROBLEM">
    </div>
    <div class="mb-3">
        <label for="MOB_NO" class="form-label"><b>MOBILE NO</b></label>
        <input type="text" value="<?php echo $mob_no?>" class="form-control" name="MOB_NO">
    </div>
    <button type="submit" class="btn btn-info" name="submit">Submit</button>
    </form>
    </div>

    <br><br>
    <div class="container">
    <h4>GO TO DASHBOARD</h4><a href="welcome.php"><button class="btn btn-primary" href="insert.php">CLICK HERE</button></a>
    </div>


    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

  </body>
</html>