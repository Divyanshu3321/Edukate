<?php include "Header.php";?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Show Developers</title>
    
</head>
<body>
    
<?php 
    include "../Connection.php";  //  .. means coming out from one folder and / means entering in the other folder
        // $username=$_SESSION['username'];  // session is already opened in header just picking username 
        $username=$_SESSION['username'];  // session is already opened in header just picking username 

        $query= "SELECT * from developer_register order by datetime desc" ;  
        $result = insert_select_delete($con, $query); 
      
if(mysqli_num_rows($result)>0)
{
      ?>
        <div class="card-body"> <div class="table-responsive"> <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <?php 
        echo " <thead> <tr><th>   First Name       </th>  <th>   Last Name       </th><th>     Telephone   </th><th>     Username   </th><th>     E-Mail   </th><th>    Linkedln   </th><th>    Github   </th><th>    Technical Skills   </th><th>    Image   </th><th>    Sample Work   </th><th>    Status   </th><th>    Date & Time   </th><th>    Delete   </th></tr> </thead>";

        while($row=mysqli_fetch_array($result))   // looop to select whole data from table
            {
                $username=$row['username'];
            echo " <tbody id='myTable'> <tr><td>". $row['firstname']." </td><td>".$row['lastname']."</td><td> ".$row['telephone']." </td><td>".$row['username']."</td><td>".$row['email']."</td><td>".$row['linkedln']."</td><td>".$row['github']."</td><td>".$row['technicalskills']."</td>";
            echo '<td><a href="../Developer_Register_Images/' . $row['yourimage'] . '" download>'.$row['yourimage'].'</a></td>'; // passing assignmentid in Url and will get that assugnmentid from url using get in next page
            echo '<td><a href="../Developer_Register_SampleWorks/' . $row['samplework'] . '" download>'.$row['samplework'].'</a></td>'; // passing assignmentid in Url and will get that assugnmentid from url using get in next page
            echo "<td>".$row['status']."</td><td>".$row['datetime']."</td>";
            echo "<td><a href='Delete developer.php?user=".$row['username']."'>Delete</a></td></tr>";
            }

        
        echo " <tbody> </table>";
}
        else 
        {
            echo"<h1 align = center>No Record Found</h1>";
        }
    ?>
    </div>
    </div>
</body>
</html>
<?php include "Footer.php";?>