<?php include "Header.php";?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Approved Developers</title>
    
</head>
<body>
    
<?php 
    include "../Connection.php";  //  .. means coming out from one folder and / means entering in the other folder
        // $username=$_SESSION['username'];  // session is already opened in header just picking username 
        $username=$_SESSION['username'];  // session is already opened in header just picking username 

        $query= "SELECT * from developer_register where status=1 order by datetime desc" ;  
        $result = insert_select_delete($con, $query); 
      
if(mysqli_num_rows($result)>0)
{
      ?>
        <div class="card-body"> <div class="table-responsive"> <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <?php 
        echo " <thead> <tr><th>   First Name       </th>  <th>   Last Name       </th><th>     Username   </th><th>     E-Mail   </th><th>     Telephone   </th><th>     Linkedln   </th><th>     Github   </th><th>     Technical skills   </th><th>   Samplework       </th></tr> </thead>";

        while($row=mysqli_fetch_array($result))   // looop to select whole data from table
            {
                $username=$row['username'];
                $email=$row['email'];
                $linkedln=$row["linkedln"];
                $github=$row["github"];
            echo " <tbody id='myTable'> <tr><td>". $row['firstname']." </td><td>".$row['lastname']."</td><td>".$row['username']."</td>";
            echo "<td>"."<a href='https://mail.google.com'> $email </a></td>"; 
            echo "<td>".$row['telephone']."</td>";
            echo "<td>"."<a href='https://www.linkedin.com/signup/cold-join?session_key=$linkedln'>$linkedln </a></td>"; 
            echo "<td>". "<a href='https://www.github.com/signup/cold-join?session_key=$github'>$github </a></td>";
            echo "<td>".$row['technicalskills']."</td>";
            echo '<td><a href="../Developer_Register_SampleWorks/' . $row['samplework'] . '" download>'.$row['samplework'].'</a></td>';
            }
        
        echo " <tbody> </table>";
}
        else 
        {
            echo"<h1 align='center'>No Record Found</h1>";
        }
    ?>
    </div>
    </div>
</body>
</html>
<?php include "Footer.php";?>