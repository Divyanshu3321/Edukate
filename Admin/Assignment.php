<?php include "Header.php"; ?>
<?php
include "../Connection.php";
?>
<div class="card-body">
    <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <?php
            echo " <thead> <tr><th>   Assignment Name       </th>  <th>   Username       </th><th>   Email       </th><th>   Telephone       </th><th>     Subject   </th><th>     Language   </th><th>     Pagelength   </th><th>     Specifications   </th>  <th>     Date  </th><th>     Deadline   </th><th>    File   </th></tr> </thead>";
            $query = "SELECT user_assignment.assignmentid, user_assignment.assignmentname,user_assignment.username, user_register.email,user_register.telephone,user_assignment.subject,user_assignment.language,user_assignment.pagelength,user_assignment.specifications,user_assignment.date,user_assignment.deadline,user_assignment.file  FROM user_assignment INNER JOIN user_register ON user_assignment.username=user_register.username order by user_assignment.date desc";
            $result = insert_select_delete($con, $query);

            if (mysqli_num_rows($result) > 0) {
                
                echo " <tbody id='myTable'>";
                
                while ($row = mysqli_fetch_assoc($result)) {  // show multiplecolumns
                    $assignmentid=$row['assignmentid'];    
                    // $devid=$_SESSION['developerid'];    // ya bhi session sa aayi hai froom ===== developer login.php ma sa pass ki hai humna ya so that we can use it here

                    echo "<tr><td>" . $row['assignmentname'] . "</td><td>" . $row['username'] . "</td><td>" . $row['email'] . "</td><td>" . $row['telephone'] . "</td><td>" . $row['subject'] . "</td><td>" . $row['language'] . "</td><td>" . $row['pagelength'] . "</td><td>" . $row['specifications'] . "</td><td>" . $row['date'] . "</td><td>" . $row['deadline'] . "</td>";
                    echo '<td><a href="../User/Images/' . $row['file'] . '" download>'.$row['file'].'</a></td>'; // passing assignmentid in Url and will get that assugnmentid from url using get in next page
                    // $q="select * from takethisassignment where assignmentid=$assignmentid and developerid='$devid'";
                    // // print($q);
                    // $result1 = insert_select_delete($con, $q);    // button will be shown ones and after clicking page will be gone 
                    // if(mysqli_num_rows($result1)>0)   // If rows affected are greater than 0 then means response is sent 
                    // {
                    //     echo "<td> <font color = black> Response Sent</font> </td>";
  
                    // }
                    // else                                           
                    // {
                    // echo "<td> <a href='TakeThisAssignment.php?assignmentid=$assignmentid'>Take This Assignment</a></td>";  // passing asssignmentif=d into get so that takethisassignment.php can use it and get assignmentid from url 
                    // }
                    // $q="select status from takethisassignment where assignmentid=$assignmentid and developerid='$devid'";
                    // // print($q);
                    // $result2 = insert_select_delete($con, $q);    // button will be shown ones and after clicking page will be gone 
                    // if (mysqli_num_rows($result2) > 0) {  // kind of rowcount if rows get affected
                    //     $statusRow = mysqli_fetch_assoc($result2);  
                    //     $status = $statusRow['status'];   // taking status  from it 
                
                    //     if ($status == 1) {
                    //         echo "<td> <font color = Green> User Accepted</font> </td></tr>";
                            
                    //     } else {
                    //         echo "<td> <font color = Red> No Response</font> </td></tr>";
                    //     }
                    // } else {
                    //     echo "<td> <font color = Red> No Response </font></td>"; // passing asssignmentid into get so that takethisassignment.php can use it and get assignmentid from url
                    // }
                }
                echo "</tbody>";
            } else {
                echo "<tbody><tr><td colspan='15' align='center'>No Record Found</td></tr></tbody>";
            }
            echo "</table>";
            ?>
        </table>
    </div>
</div>
</body>
</html>
<?php include "Footer.php"; ?>

<td></td>