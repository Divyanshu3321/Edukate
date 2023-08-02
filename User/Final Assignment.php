<?php include "Header.php";?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Show Respnses</title>

</head>
<body>
    
<?php 
    include "../Connection.php";  //  .. means coming out from one folder and / means entering in the other folder
        $username=$_SESSION['username'];  // session is already opened in header just picking username // session value coming from login page
                                                           // t.TakeAssignmentid is put here bec i want to use it in else portion i will pass TakeAssignmentid to User Response Accept there data gets updated and comes back to this page
        $query= "SELECT t.TakeAssignmentid,t.developerdeadline, t.amount ,           
        r.firstname,r.lastname,r.telephone,r.email,r.linkedln,r.github,
        a.assignmentname,a.subject,a.language, a.specifications,a.date, a.deadline,
        d.assignment, d.date, d.dev_assignment
        FROM takethisassignment t 
        INNER JOIN developer_register r ON r.developerid=t.developerid
        INNER JOIN user_assignment a ON a.assignmentid=t.assignmentid 
        Inner JOIN developer_assignment d ON d.takethisassignmentid = t.TakeAssignmentid  where  t.username = '$username' order by d.date desc" ;     // aid is the user_register table
        // print($query);
        $result = insert_select_delete($con, $query); 
        ?>
        <div class="card-body"> <div class="table-responsive"> <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <?php
        if(mysqli_num_rows($result)>0){
            echo "<thead> <tr> <th style='text-align: center'  colspan=6 scope=colgroup>Developer Section</th>  <th style='text-align: center' colspan=6  scope=colgroup>User Section</th>   <th style='text-align: center' colspan=2 scope=colgroup>Developer Assignment Submission </th></tr></thead>";
            echo " <thead> <tr><th>   Given Developer Dead Line       </th><th>     Developer Amount Entered   </th><th>     Firstname   </th><th>   Lastname   </th><th>     Telephone   </th><th>     Email   </th> <th> Assignment name</th> <th> Subject</th><th> Language</th><th> Specifications</th><th> Submitted  Date</th><th> User Given deadline</th><th> Assignment Submission </th><th> Download Assignment</th></tr> </thead>";
            
                while($row=mysqli_fetch_array($result))   // looop to select whole data from table
                    
                    {
                        // print ($row['developerdeadline']);
                    echo " <tbody id='myTable'> <tr><td>". $row['developerdeadline']." </td><td>".$row['amount']."</td><td> ".$row['firstname']." </td><td>".$row['lastname']."</td><td>".$row['telephone']."</td><td>".$row['email']."</td><td>".$row['assignmentname']."</td><td>".$row['subject']."</td><td>".$row['language']."</td><td>".$row['specifications']."</td><td>".$row['date']."</td><td>".$row['deadline']."</td><td>".$row['date']."</td>";
                    $dev_assignment = $row['dev_assignment'];
                    // print($dev_assignment);
                    $query = "select assignment from developer_assignment where dev_assignment = $dev_assignment";
                            // $result = insert_select_delete($con, $query); 

                            // Generate the file path to the developer's assignment
                    // $file_path = '../Developer/Developer Assignment/' . $row['assignment'];

                    // echo '<td><a href="#" onclick="downloadFile(\'' . $file_path . '\', \'' . $row['assignment'] . '\')">' . $row['assignment'] . '</a></td></tr>';
                    echo '<td><a href="../Developer/Developer Assignment/' . $row['assignment'] . '" download>'.$row['assignment'].'</a></td></tr>';                    
                    // echo "<td>".$row['assignment']."</td></tr>";  // aid is in table of user_register
                    }
                    echo " <tbody> </table>";
        }
        else 
        {
            echo"<h1 align = center  > <font color=red >Developer Hasn't Done Your Assignment Yet</font></h1>";
        }


            
    ?>
    </div>
    </div>
    
</body>
</html>
<?php include "Footer.php";?>