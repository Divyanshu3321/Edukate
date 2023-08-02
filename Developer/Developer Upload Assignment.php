<?php include "Header.php"; ?>
<?php
include "../Connection.php";
?>
<?php 
    if(isset($_POST['submit']))     // this all is format expect the query   // this code is placed above bec sent successfully vala mssg upr chahiye tha 
    {   
        $TakeAssignmentid = $_POST['TakeAssignmentid']; // this is passed in inside loop in hidden way
        // print($TakeAssignmentid);
        $assignment = $_FILES['assignment']['name']; // name of assignment
        // print($assignment);
        $query= "insert into developer_assignment (takethisassignmentid,assignment) values ('$TakeAssignmentid','$assignment') "; 
        // print($query); 
        $result = insert_select_delete($con, $query); 
        if($result){
            if(move_uploaded_file($_FILES['assignment']['tmp_name'],"Developer Assignment/".$_FILES['assignment']['name'])) // tmp_name = predefined, name = predefined, photos= vala folder ma jayaga
        {
            header("Location:Developer Upload Assignment.php");            // redirect it to profile.php
            echo "<h3 align = center><font align = center color = green> Sent Successfully</font></h3>";


        }
        else{
            echo "<h3 align = center><font align = center color = red> Problem</font></h3>";
        }
        }
        }
    ?>
<div class="card-body">
    <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <?php
            
            $devid=$_SESSION['developerid'];
            $query = "SELECT t.TakeAssignmentid,a.assignmentid, a.assignmentname,a.username, r.email,r.telephone,a.subject,a.language,
            a.pagelength,a.specifications,a.date,a.deadline,a.file, t.status, t.developerdeadline, t.amount
            FROM takethisassignment t INNER JOIN user_register r ON t.username=r.username 
            INNER JOIN user_assignment a ON a.assignmentid=t.assignmentid where t.status =1 AND developerid=$devid order by a.date desc" ;
            $result = insert_select_delete($con, $query);
            // $row = mysqli_fetch_assoc($result);
            if (mysqli_num_rows($result) > 0) {
                
                echo " <thead> <tr><th>   Assignment Name       </th>  <th>   Username       </th><th>   Email       </th><th>   Telephone       </th><th>     Subject   </th><th>     Language   </th><th>     Pagelength   </th><th>     Specifications   </th>  <th>     Date  </th><th>    User Deadline   </th><th>    File   </th><th>     Developer Deadline   </th><th>     Amount   </th><th>    Updated Status   </th><th>    Upload Assignment  </th><th>    Submit  </th></tr> </thead>";
                
                echo " <tbody id='myTable'>";
                
                while ($row = mysqli_fetch_assoc($result)) {  // show multiplecolumns
                    $assignmentid=$row['assignmentid'];  
                    // print($assignmentid);  
                    $devid=$_SESSION['developerid'];    // ya bhi session sa aayi hai froom ===== developer login.php ma sa pass ki hai humna ya so that we can use it here
                    $TakeAssignmentid=$row['TakeAssignmentid'];   // taking it from join query
                    // print($TakeAssignmentid);

                    echo "<tr><td>" . $row['assignmentname'] . "</td><td>" . $row['username'] . "</td><td>" . $row['email'] . "</td><td>" . $row['telephone'] . "</td><td>" . $row['subject'] . "</td><td>" . $row['language'] . "</td><td>" . $row['pagelength'] . "</td><td>" . $row['specifications'] . "</td><td>" . $row['date'] . "</td><td>" . $row['deadline'] . "</td>";
                    echo '<td><a href="../User/Images/' . $row['file'] . '" download>'.$row['file'].'</a></td>'; // passing assignmentid in Url and will get that assugnmentid from url using get in next page

                    echo "<td>" . $row['developerdeadline'] . "</td><td>" . $row['amount'] . "</td>"; // passing assignmentid in Url and will get that assugnmentid from url using get in next page
                    echo "<td> <font color = Green> User Accepted</font> </td>";
                ?>
                    <form method="post" enctype="multipart/form-data">
                    <td><input type="hidden" name="TakeAssignmentid" value="<?php echo $TakeAssignmentid  ?>">  <!--TakeAssignmentid is passed through hidding here so that we can use it further when user submits that assignment-->
                    <input type=file name = assignment > </td>
                    <td><input type="submit" value="Upload" name ="submit"></td>
                    </form>

                    <?php
                }
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