<?php 
 include "../Connection.php";  //  .. means coming out from one folder and / means entering in the other folder
 // $username=$_SESSION['username'];  // session is already opened in header just picking username 
 $username=$_SESSION['username'];  // session is already opened in header just picking username 

    // if(isset($_POST['Update'])) // value jo upr likha ussa use kiya yaha pa
    {

        $user=$_GET['user'];
        $query = "update developer_register set status=1 where username='$user'";
        $result = updateTable($con, $query);
        header("Location:Unapproved developer.php");
    }
?>