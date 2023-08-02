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
        a.assignmentname,a.subject,a.language, a.specifications,a.date, a.deadline
        FROM takethisassignment t 
        INNER JOIN developer_register r ON r.developerid=t.developerid
        INNER JOIN user_assignment a ON a.assignmentid=t.assignmentid where  t.username = '$username' order by date desc" ;     // aid is the user_register table
        // print($query);
        $result = insert_select_delete($con, $query); 
        ?>
        <div class="card-body"> <div class="table-responsive"> <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <?php
        if(mysqli_num_rows($result)>0){
            echo "<thead> <tr> <th style=text-align: center  colspan=8 scope=colgroup>Developer Section</th> <th style=text-align: center colspan=1  scope=colgroup>Accept Developer</th> <th style=text-align: center colspan=6  scope=colgroup>User Section</th>  </tr></thead>";
            echo " <thead> <tr><th>   Given Developer Dead Line       </th><th>     Developer Amount Entered   </th><th>     Firstname   </th><th>   Lastname   </th><th>     Telephone   </th><th>     Email   </th><th>     Linkedln   </th><th>     Github   </th><th> Accept Developer</th> <th> Assignment name</th> <th> Subject</th><th> Language</th><th> Specifications</th><th> Submitted  Date</th><th> User Given deadline</th></tr> </thead>";
            
                while($row=mysqli_fetch_array($result))   // looop to select whole data from table
                    {
                        // print ($row['developerdeadline']);
                    echo " <tbody id='myTable'> <tr><td>". $row['developerdeadline']." </td><td>".$row['amount']."</td><td> ".$row['firstname']." </td><td>".$row['lastname']."</td><td>".$row['telephone']."</td><td>".$row['email']."</td><td>".$row['linkedln']."</td><td>".$row['github']."</td>";
                    // $username=$_SESSION['username'];
                    $TakeAssignmentid = $row['TakeAssignmentid'];
                    $q="select * from takethisassignment where status=1 and TakeAssignmentid = '$TakeAssignmentid'";   // this is taken from query fired at starting of the page
                    // print($q);
                    $result1 = insert_select_delete($con, $q);    // button will be shown ones and after clicking page will be gone 
                    if(mysqli_num_rows($result1)>0)   // If rows affected are greater than 0 then means response is sent 
                    {
                        echo "<td> <font color= green> Developer Will Contact You Soon </font> </td>";
                    }
                    else                                           
                    {
                        $TakeAssignmentid = $row['TakeAssignmentid'];     // this is getted from the query fired at starting of page 
                        echo "<td><a href='User Respones Accept .php?TakeAssignmentid=$TakeAssignmentid'>Accept</a></td>";
                        // <a href='Editing Assignment.php?aid=$aid'>
                    }
                    echo "<td>".$row['assignmentname']."</td><td>".$row['subject']."</td><td>".$row['language']."</td><td>".$row['specifications']."</td><td>".$row['date']."</td><td>".$row['deadline']."</td></tr>";  // aid is in table of user_register
                    }
                    echo " <tbody> </table>";
        }
        else 
        {
            echo"<h1 align = center >No Responses Yet</h1>";
        }


            
    ?>
    </div>
    </div>
    
</body>
</html>
<?php include "Footer.php";?>