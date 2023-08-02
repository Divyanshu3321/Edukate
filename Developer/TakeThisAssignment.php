<?php include "Header.php"; ?>
<?php
include "../Connection.php";
?>
<script src="../0JQuery.js"></script>
    <script>
        $(document).ready(function() {
        $("#submit").click(function(){     // after clicking on register button then this will get active by id used in it id = "#submit1"

            // Initialize the datepicker
            $(".datepicker").datepicker({
                dateFormat: "yy-mm-dd", // Set the date format to YYYY-MM-DD
                minDate: 0, // Restrict dates before today
            });
        });

        // Custom validation for deadline format
            $("#deadline").on("blur", function() {
                var inputDate = $(this).val();
                if (!isValidDateFormat(inputDate)) {
                    alert("Please enter a valid date in the format YYYY-MM-DD.");
                    $(this).val(""); // Clear the input field if the format is incorrect
                }
            });

            // Helper function to validate the date format
            function isValidDateFormat(dateString) {
                // alert(dateString);
                var dateRegex = /^\d{4}-\d{2}-\d{2}$/;
                // alert(dateRegex.test(dateString));
                return dateRegex.test(dateString);
            }

        // Submit form only if the deadline is in the correct format
        $("form").submit(function(event) {  // form wil be submitted if conditions meet
            var deadlineInput = $("#deadline");
            if (!isValidDateFormat(deadlineInput.val())) {
                alert("Please enter a valid date in the format YYYY-MM-DD.");
                event.preventDefault(); // Prevent form submission
            }
        });
        $('#amount').on('input', function() {
                var inputVal = $(this).val();
                var regex = /^[0-9]+$/;
                if (!regex.test(inputVal)) {
                $(this).val(inputVal.replace(/[^0-9]+/g, ''));
                }
        });
    });
        
            
</script>
<div class="card-body">
    <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <?php
            echo " <thead> <tr><th>   Assignment Name       </th>  <th>   Username       </th><th>   Email       </th><th>   Telephone       </th><th>     Subject   </th><th>     Language   </th><th>     Pagelength   </th><th>     Specifications   </th>  <th>     Date  </th><th>     Deadline   </th><th>    File   </th></tr> </thead>";
            $assignmentid = isset($_GET['assignmentid']) ? $_GET['assignmentid'] : '';  // receiving value from get which is taken by get and used further here

            $query = "SELECT user_assignment.assignmentid, user_assignment.assignmentname,user_assignment.username, user_register.email,user_register.telephone,user_assignment.subject,user_assignment.language,user_assignment.pagelength,user_assignment.specifications,user_assignment.date,user_assignment.deadline,user_assignment.file  FROM user_assignment INNER JOIN user_register ON user_assignment.username=user_register.username where assignmentid = '$assignmentid' ";
            $result = insert_select_delete($con, $query);

            if (mysqli_num_rows($result) > 0) {
                
                echo " <tbody id='myTable'>";
                
                if ($row = mysqli_fetch_assoc($result)) {  // show multiplecolumns
                    echo "<tr><td>" . $row['assignmentname'] . "</td><td>" . $row['username'] . "</td><td>" . $row['email'] . "</td><td>" . $row['telephone'] . "</td><td>" . $row['subject'] . "</td><td>" . $row['language'] . "</td><td>" . $row['pagelength'] . "</td><td>" . $row['specifications'] . "</td><td>" . $row['date'] . "</td><td>" . $row['deadline'] . "</td>";
                    echo '<td><a href="../User/Images/' . $row['file'] . '" download>'.$row['file'].'</a></td></tr>'; // passing assignmentid in Url and will get that assugnmentid from url using get in next page
                }
                echo "</tbody>";
            } else {
                echo "<tbody id='myTable'><tr><td colspan='15' align='center'>No Record Found</td></tr></tbody>";
            }
            echo "</table>";
            ?>
        </table>
    </div> <br><br><br><br><br>
    <form method="post" enctype = "multipart/form-data">
        <div  >
        <div class="col-sm-6 mb-3 mb-sm-0">
            <input type="text" class="form-control form-control-user" name="deadline" id="deadline" required placeholder="Deadline:" >
        </div><br> <br> 
        <div class="col-sm-6">
            <input type="text" class="form-control form-control-user" name="amount" id="amount" required placeholder="Amount:">
        </div> <br> <br> 
        <div>
            <input type="submit" class="btn btn-primary py-3 px-5" value="Inform User" id="submit" name ="submit"> &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
            <!-- <button  class="btn btn-primary py-3 px-5"><a href="Show users.php"> Cancel</a></button> -->

        </div>
            
</form>
<?php 
    if(isset($_POST['submit']))     // this all is format expect the query
    {
        $deadline = $_POST['deadline'];  // picking from name in form
        $amount = $_POST['amount']; 


        $developerusername=$_SESSION['username'];  // session is already opened in header just picking username 
        $query= "SELECT developerid,firstname,lastname,telephone,email,github,linkedln from developer_register where username = '$developerusername'" ;
        $result = insert_select_delete($con, $query); 
        $row = mysqli_fetch_array($result);              // meadning of this line????????????????????????????????????????????????  // receving value from table in Array  format                    
        $developerid=$row['developerid']; 
        // print($developerid); 
        // $firstname=$row['firstname'];  
        // $lastname=$row['lastname'];  
        // $telephone=$row['telephone'];  
        // $email=$row['email'];  
        // $github=$row['github'];  
        // $linkedln=$row['linkedln'];

        $assignmentid = isset($_GET['assignmentid']) ? $_GET['assignmentid'] : '';  // receiving value from get which is taken by get and used further here
        $query= "SELECT * from User_assignment where assignmentid = '$assignmentid'" ;
        $result = insert_select_delete($con, $query); 
        $row = mysqli_fetch_array($result); 
        $assignmentid=$row['assignmentid'];  // $assignmentid = isset($_GET['assignmentid']) ? $_GET['assignmentid'] : ''; ===== is picked from this line and rest of details acc to it
        $username=$row['username']; 
        // $assignmentname=$row['assignmentname'];  
        // $subject=$row['subject'];  
        // $language=$row['language'];  
        // $pagelength=$row['pagelength'];  
        // $specifications=$row['specifications'];  
        // $date=$row['date'];  
        // $userdeadline=$row['deadline'];  
        // print("linkedin".$linkeln);
        $query= "insert into takethisassignment (developerdeadline, amount,developerid,assignmentid,username) values ('$deadline', '$amount','$developerid', '$assignmentid','$username')";  
        // print($query);

        $result = insert_select_delete($con, $query); 
        if ($result)     // if successful make a session 
        {
            print("<br>&nbsp<font  color= green size=5 >Successful</font>"); 
            header("Location:Show Assignments.php");  // if success redirect to header
        } else 
        {
            echo '<br> <font color= red size=5 > Not Successful</font>';
        }
    }
    // ?>
    
</div>

</body>

</html>
<?php include "Footer.php"; ?>

