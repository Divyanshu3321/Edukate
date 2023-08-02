<?php 

$con=mysqli_connect("localhost","root","Anshi@2002","edukate"); // php is database name
    if(!$con)
    {
        die(mysqli_connect_error($con));     // connection will die
    }
    function updateTable($con,$query)
    {
        global $con;
        if(!mysqli_query($con,$query))
        {
           die(mysqli_error($con));
        }
    
    }

    function insert_select_delete($con,$query)
    {
        // global $con;
        $result=mysqli_query($con,$query);
        return $result;
    }


?>