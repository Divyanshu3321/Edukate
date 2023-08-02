<?php include "Header.php";?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Show Assignments</title>

</head>
<body>
    
<?php 
    include "../Connection.php";  //  .. means coming out from one folder and / means entering in the other folder
        // $username=$_SESSION['username'];  // session is already opened in header just picking username 
        $username=$_SESSION['username'];  // session is already opened in header just picking username 

        $query= "SELECT *,DATE_FORMAT(date, '%d-%m-%Y ') as date,DATE_FORMAT(deadline, '%d-%m-%Y ') as deadline from USER_assignment where username = '$username'order by date desc " ;     // aid is the user_register table
        $result = insert_select_delete($con, $query); 
        if(mysqli_num_rows($result)>0)
        {
        ?>
        <div class="card-body"> <div class="table-responsive"> <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <?php
            echo " <thead> <tr><th>   Assignment Name       </th><th>     Subject   </th><th>     Language   </th><th>     Page Length   </th><th>     Specifications   </th><th>     Date   </th><th>     Deadline   </th><th>     File   </th> <th> Delete</th> <th> Edit</th></tr> </thead>";

            while($row=mysqli_fetch_array($result))   // looop to select whole data from table
                {
                    $aid=$row['assignmentid'];
                echo " <tbody id='myTable'> <tr><td>". $row['assignmentname']." </td><td>".$row['subject']."</td><td> ".$row['language']." </td><td>".$row['pagelength']."</td><td>".$row['specifications']."</td><td>".$row['date']."</td><td>".$row['deadline']."</td>";
                echo '<td><a href="Images/' . $row['file'] . '" download>'.$row['file'].'</a></td>';               
                echo "<td><a href='Delete Assignment.php?aid=$aid'>Delete</a></td><td><a href='Editing Assignment.php?aid=$aid'>Edit</a></td></tr>";  // aid is in table of user_register
                }
                echo " <tbody> </table>";
            }
                    else 
                    {
                        echo"<h1 align= center>No Assignments Yet</h1>";
                    }    ?>
    </div>
    </div>
</body>
</html>
<?php include "Footer.php";?>