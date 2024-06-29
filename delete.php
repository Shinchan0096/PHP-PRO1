<?php
    $servername = "localhost";
    $username = "root";
    $pass = "";
    $db = "doctor";

    $conn = mysqli_connect($servername,$username,$pass,$db);

    if(isset($_GET['PID']))
    {
        $pid = $_GET['PID'];
        $sql = "DELETE FROM PAT WHERE PID = $pid";
        $q = mysqli_query($conn,$sql);
        if($q)
        {
            header("location:welcome.php");
        }
    }
    else
    {
        echo "SOME THING WENT WRONG !!";
    }
?>