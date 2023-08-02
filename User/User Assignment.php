<?php include "Header.php";?>  <!--Header ma session khula hua hai already-->
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
                var dateRegex = /^\d{4}-\d{2}-\d{2}$/;
                return dateRegex.test(dateString);
            }

        // Submit form only if the deadline is in the correct format
        $("form").submit(function(event) {
            var deadlineInput = $("#deadline");
            if (!isValidDateFormat(deadlineInput.val())) {
                alert("Please enter a valid date in the format YYYY-MM-DD.");
                event.preventDefault(); // Prevent form submission
            }
        });
    });
</script>

    <style>
        
    </style>
</head>
<body>
    <form method="post" enctype = "multipart/form-data">
        <div  >
        <div class="col-sm-6 mb-3 mb-sm-0">
            <input type="text" class="form-control form-control-user" name="assignmentname" id="assignmentname" required placeholder="Name of Assignment:" >
        </div><br> <br> 
        <div class="col-sm-6">
            <input type="text" class="form-control form-control-user" name="subject" id="subject" required placeholder="Subject:">
        </div> <br> <br> 
        <div >
        <div class="col-sm-6 mb-3 mb-sm-0">
            <input type="text" class="form-control form-control-user" id="language" name="language" required placeholder="Language required:">
        </div> <br> <br>
        <div class="col-sm-6">
            <input type="text" class="form-control form-control-user" name="pagelength" id="pagelength" required placeholder="Required Page length:">
        </div> <br> <br> 
        <div >
        <div class="col-sm-6 mb-3 mb-sm-0">
            <textarea type="text" class="form-control form-control-user" id="specifications" name="specifications" required placeholder="Specifications:"></textarea>
        </div> <br> <br>
        <div class="col-sm-6">
        <input type="text" class="form-control form-control-user datepicker" name="deadline" id="deadline" required placeholder="Deadline (YYYY-MM-DD)">
        </div> <br> <br>
        
       <div class="col-sm-6" >
             <label for ="Choose file:"> Choose file: </label>
             <input type="file"  name="file" required>
       </div> <br> <br>
       <div class="col-sm-6">
            <input class="btn btn-primary py-3 px-5" type="submit" value="Submit" name ="submit" id= "submit">
       </div> 
</form>

<?php 
    include "../Connection.php";
    if(isset($_POST['submit']))     // this all is format expect the query
    {

        $assignmentname = $_POST['assignmentname']; 
        $username=$_SESSION['username'];  // session is already opened in header just picking username 
        $subject = $_POST['subject']; 
        $language = $_POST['language']; 
        $pagelength = $_POST['pagelength']; 
        $specifications = $_POST['specifications']; 
        $deadline = $_POST['deadline']; 
        $file = $_FILES['file']['name']; 
        $query= "INSERT into user_assignment (assignmentname,username, subject, language,pagelength,specifications, deadline,file ) values ('$assignmentname','$username','$subject' ,'$language', '$pagelength', '$specifications','$deadline','$file' )";  
        $result = insert_select_delete($con, $query); 
        if ($result)
            {
                while(move_uploaded_file($_FILES['file']['tmp_name'], "Images/".$_FILES['file']['name'])) {
                    print("<br> <h3>&nbsp&nbsp&nbspSuccessful</h3><br>");
                    // echo "<img src='Images/" . $_FILES['image']['name'] . "' alt='Uploaded Image' style='height: 200px; width: 200px;'>";
                }
            }
    }
    ?>
</body>
</html>
<?php include "Footer.php";?>

