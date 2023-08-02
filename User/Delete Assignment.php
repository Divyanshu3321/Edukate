
<?php
include "../Connection.php";
$aid = isset($_GET['aid']) ? $_GET['aid'] : ''; // get assignment name from the url        
        if (!empty($aid)) {
            $query = "SELECT * from USER_assignment where assignmentid = '$aid'";
            $result = insert_select_delete($con, $query);
            
            if ($row = mysqli_fetch_array($result)) {    
                $file = $row['file']; // picking file name from database 
                if (file_exists("Images/$file")) {  // if file exists 
                    unlink("Images/$file"); // if exists unlink it 
                } else {
                    echo "File does not exist!";  // file does't exist
                }
            } else {
                // echo "Assignment not found!";
            }
    
        
        $query = "delete from USER_assignment where assignmentid='$aid'";
        $result = insert_select_delete($con, $query);
            header("Location:Show Assignment.php");
        }?>