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
        // $username=$_SESSION['username']; // picking username from session
        $TakeAssignmentid = isset($_GET['TakeAssignmentid']) ? $_GET['TakeAssignmentid'] : ''; // get TakeAssignmentid from the url

        $query = "update takethisassignment set status = 1 where TakeAssignmentid =$TakeAssignmentid "; // status getting updated and redirecting it to Uer Reponses.php
        print($query);
        $result1 = insert_select_delete($con, $query); 
        
        header("Location:User Responses.php");  // and redirect to this page

    
    


            
    ?>
    </div>
    </div>
    
</body>
</html>
<?php include "Footer.php";?>