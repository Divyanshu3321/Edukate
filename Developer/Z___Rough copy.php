<?php include "Header.php"; ?>
<?php
include "../Connection.php";
?>
<div class="card-body">
    <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <?php
            
            $devid=$_SESSION['developerid'];
            $query = "SELECT t.TakeAssignmentid,a.assignmentid, a.assignmentname,a.username, r.email,r.telephone,a.subject,a.language,
            a.pagelength,a.specifications,a.date,a.deadline,a.file, t.status, t.developerdeadline, t.amount
            FROM takethisassignment t INNER JOIN user_register r ON t.username=r.username 
            INNER JOIN user_assignment a ON a.assignmentid=t.assignmentid where t.status =1 AND developerid=$devid " ;
            $result = insert_select_delete($con, $query);
    
            if (mysqli_num_rows($result) > 0) {
                echo " <thead> <tr><th>   Assignment Name       </th>  <th>   Username       </th><th>   Email       </th><th>   Telephone       </th><th>     Subject   </th><th>     Language   </th><th>     Pagelength   </th><th>     Specifications   </th>  <th>     Date  </th><th>    User Deadline   </th><th>    File   </th><th>     Developer Deadline   </th><th>     Amount   </th><th>    Updated Status   </th><th>    Upload Assignment  </th><th>    Submit  </th></tr> </thead>";
                
                echo " <tbody>";
                
                while ($row = mysqli_fetch_assoc($result)) {  // show multiplecolumns
                    $assignmentid=$row['assignmentid'];    
                    $devid=$_SESSION['developerid'];    // ya bhi session sa aayi hai froom ===== developer login.php ma sa pass ki hai humna ya so that we can use it here

                    echo "<tr><td>" . $row['assignmentname'] . "</td><td>" . $row['username'] . "</td><td>" . $row['email'] . "</td><td>" . $row['telephone'] . "</td><td>" . $row['subject'] . "</td><td>" . $row['language'] . "</td><td>" . $row['pagelength'] . "</td><td>" . $row['specifications'] . "</td><td>" . $row['date'] . "</td><td>" . $row['deadline'] . "</td><td>" . $row['file'] . "</td><td>" . $row['developerdeadline'] . "</td><td>" . $row['amount'] . "</td>echo <td> <font color = Green> User Accepted</font> </td>;"; // passing assignmentid in Url and will get that assugnmentid from url using get in next page
$tid=$row['TakeAssignmentid'];
?>
<td>
 <form action="uploadphp.php" method="post" enctype="multipart/form-data">
    <input type="hidden" name="tid" value="<?php echo $tid  ?>">
    <input type="file" name="assignment" id="">
    <td><input type="submit" value="Upload"></td>
 </form>
 </td>
 <?php
                }
                    // if(isset($_POST['submit']))     // this all is format expect the query
                    {
                        // $username = $_POST['username']; 
                        // $password = $_POST['password']; 
                        
                        }


                

                // }
                echo " <tbody> </table>";
                }
            else 
            {
                echo"<h1 align = center >No Responses Yet</h1>";
            }
            ?>
        </table>
    </div>
</div>
</body>
</html>
<?php include "Footer.php"; ?>

<td></td>