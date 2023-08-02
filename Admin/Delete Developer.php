<?php include "Header.php";?>
<?php
 include "../Connection.php";
$username= isset($_GET['user']) ? $_GET['user'] : ''; // get assignment name from the url        
        if (!empty($username)) {        // if not empty username then do the following 
            $query = "SELECT * from developer_register where username = '$username'";
            $result = insert_select_delete($con, $query);
            
            while ($row = mysqli_fetch_array($result)) {    
                $file = $row['yourimage']; // picking file name from database 
                if (file_exists("../Developer_Register_Images/$file")) {  // if file exists 
                    unlink("../Developer_Register_Images/$file"); // if exists unlink it 
                } else {
                    echo "File does not exist!";  // file does't exist
                }
            } 

            $query = "SELECT * from developer_register where username = '$username'";
            $result = insert_select_delete($con, $query);
            
            while ($row = mysqli_fetch_array($result)) {    
                $file = $row['samplework']; // picking file name from database
                 
                if (file_exists("../Developer_Register_SampleWorks/$file")) {  // if file exists 
                    unlink("../Developer_Register_SampleWorks/$file"); // if exists unlink it 
                } else {
                    echo "File does not exist!";  // file does't exist
                }
            } 
    
        
            // $query = "delete from user_assignment where username='$username'";     
            // $result = insert_select_delete($con, $query);

            $query = "delete from developer_register where username='$username'";
        $result = insert_select_delete($con, $query);
        header("Location:Show developer.php");
        }?>