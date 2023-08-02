<?php include "Header.php";?>  <!-- session already opened in header file -->
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editing Assignments</title>
    <style>
        label{
            display: inline-block;
        }
    </style>
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
    });
</script>
</head>
<body>
<?php
    include "../Connection.php";  //  .. means coming out from one folder and / means entering in the other folder

    $aid = isset($_GET['aid']) ? $_GET['aid'] : ''; // get assignment name from the url
    
    $query = "select * from USER_assignment where assignmentid = '$aid'";
    // print($query);
    $result = insert_select_delete($con, $query);
    while ($row = mysqli_fetch_array($result))
    {
        ?>
        <form method="post" enctype="multipart/form-data">
        <div >
        <label  class="col-sm-6 mb-3 mb-sm-0" for="Assignment Name">Assignment Name</label>
        <div class="col-sm-6 mb-3 mb-sm-0">
            <input  type="text" class="form-control form-control-user"  placeholder="Assignmentname" value="<?php echo $row['assignmentname'] ?>" required name="assignmentname">
        </div><br> 
        <div >
        <label  class="col-sm-6 mb-3 mb-sm-0" for="Subject">Subject</label>
        <div class="col-sm-6 mb-3 mb-sm-0">
            <input type="text" class="form-control form-control-user" placeholder="Subject" value="<?php echo $row['subject'] ?>" required name="subject">
        </div><br> 
        <div >
        <label  class="col-sm-6 mb-3 mb-sm-0" for="Language">Language</label>
        <div class="col-sm-6 mb-3 mb-sm-0">
            <input type="text" class="form-control form-control-user" placeholder="Language" value="<?php echo $row['language'] ?>" required name="language">
        </div><br> 
        <div >
        <label  class="col-sm-6 mb-3 mb-sm-0" for="Page Length">Page Length</label>
        <div class="col-sm-6 mb-3 mb-sm-0">
            <input type="text" class="form-control form-control-user" placeholder="Pagelength" value="<?php echo $row['pagelength'] ?>" required name="pagelength">
        </div><br> 
        <div >
        <label  class="col-sm-6 mb-3 mb-sm-0" for="Specifications">Specifications</label>
        <div class="col-sm-6 mb-3 mb-sm-0">
            <textarea type="text" class="form-control form-control-user" placeholder="Specifications"  required name="specifications"><?php echo $row['specifications'] ?></textarea>
        </div><br> 
        <div >
        <label  class="col-sm-6 mb-3 mb-sm-0" for="Deadline">Deadline</label>
        <div class="col-sm-6 mb-3 mb-sm-0">
            <input type="text" class="form-control form-control-user" placeholder="Deadline" id="deadline" value="<?php echo $row['deadline'] ?>" required name="deadline">
        </div><br> 
        <div class="col-sm-6 mb-3 mb-sm-0">
        <label  class="col-sm-6 mb-3 mb-sm-0" for="Assignment">Assignment</label>
            <img src="Images/<?php echo $row['file'] ?>" alt="" height = "250px" width = "250px"> <!-- Image is folder name-->
            <input type="hidden" name="oldimage" value="<?php echo $row['file'] ?>">
            <input  type="file" name="newimage" required> <br> <br>

            <input class="btn btn-primary py-3 px-5" name="Update" type="submit" value="Update"  id = "submit"> <br> <br> <br> <br>
        </form>

        <?php
    }
?>
<?php 

    if(isset($_POST['Update'])) // value jo upr likha ussa use kiya yaha pa
    {
        $assignmentname=$_POST['assignmentname'];
        $subject=$_POST['subject'];
        $language=$_POST['language'];
        $pagelength=$_POST['pagelength'];
        $specifications=$_POST['specifications'];
        $deadline=$_POST['deadline'];
        $file=$_FILES['newimage']['name'];
        $oldimage=$_POST['oldimage'];
        unlink("Images/$oldimage");  // Images is folder name
        if(move_uploaded_file($_FILES['newimage']['tmp_name'],"Images/".$_FILES['newimage']['name'])) // tmp_name = predefined, name = predefined, photos= vala folder ma jayaga
        {
            print("Uploaded");
        }
        $query = "update USER_assignment set assignmentname= '$assignmentname', subject='$subject' ,language = '$language',pagelength='$pagelength', specifications='$specifications',deadline='$deadline',file='$file' where assignmentid = '$aid'";
        $result = updateTable($con, $query);
        header("Location:Show Assignment.php");
    }
?>
</body>
</html>
<?php include "Footer.php";?>

