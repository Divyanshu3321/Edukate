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

        $query= "SELECT * from User_register " ;  
        $result = insert_select_delete($con, $query); 
      
if(mysqli_num_rows($result)>0)
{
      ?>
      <h1 align = "center">User Details</h1>
        <div class="card-body"> <div class="table-responsive"> <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <?php 
        echo " <thead> <tr><th>   First Name       </th>  <th>   Last Name       </th><th>     E-Mail   </th><th>     Telephone   </th><th>     Username   </th><th>     Password   </th><th>    Image   </th><th>    Delete   </th></tr> </thead>";

        while($row=mysqli_fetch_array($result))   // looop to select whole data from table
            {
                $username=$row['username'];
            echo " <tbody id='myTable'> <tr><td>". $row['fistname']." </td><td>".$row['lastname']."</td><td> ".$row['email']." </td><td>".$row['telephone']."</td><td>"."<a href='Display assignments.php?user=$username'</a>".$row['username']."</td><td>".$row['password']."</td>";
            echo '<td><a href="../User_Register_Images/' . $row['image'] . '" download>'.$row['image'].'</a></td>'; // passing assignmentid in Url and will get that assugnmentid from url using get in next page
            echo "<td><a href='Delete user.php?user=".$row['username']."'>Delete</a></td></tr>";
            }
        
        echo " <tbody> </table>";
        }
        else 
        {
            echo"<h1>No Record Found</h1>";
        }
    ?>
    </div>
    </div>
</body>
</html>
<?php include "Footer.php";?>