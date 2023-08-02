<?php include "Header.php";?>
<?php
 include "../Connection.php";
$username = isset($_GET['user']) ? $_GET['user'] : ''; // get assignment name from the url        
        if (!empty($username)) 
            $query = "SELECT * from user_assignment where username = '$username' order by date desc";
            $result = insert_select_delete($con, $query);
            $count=mysqli_num_rows($result);
            if($count>0)
            {

            
        ?>
        <h1 align = "center">User Assignment</h1>
        <div class="card-body">
             <div class="table-responsive"> <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <?php 
        echo " <thead> <tr><th>   Assignment Name       </th>  <th>   Userame       </th><th>     Subject   </th><th>     Language   </th><th>     Pagelength   </th><th>     Specification   </th>  <th>     Deadline  </th><th>    File   </th></tr> </thead>";

        while($row=mysqli_fetch_array($result))   // looop to select whole data from table
            {
                $username=$row['username'];
            echo " <tbody id='myTable'> <tr><td>". $row['assignmentname']." </td><td>".$row['username']."</td><td> ".$row['subject']." </td><td>".$row['language']."</td><td>".$row['pagelength']."</td><td>".$row['specifications']."</td><td>".$row['deadline']."</td>";
            echo '<td><a href="../User/Images/' . $row['file'] . '" download>'.$row['file'].'</a></td>'; // passing assignmentid in Url and will get that assugnmentid from url using get in next page
            }
            
            // while($row=mysqli_fetch_array($result))   // looop to select whole data from table
            // {
            // echo "<tr><td>". $row['assignmentname']."</td>";
            // echo "<td><a href='Delete Assignment.php?assignmentname=".$row['assignmentname']."'>Delete</a></td></tr>";
            // }
            
        echo " <tbody> </table>";
            }
            else
            {
                echo " <br> <h1 align = center> No Record Found</h1>";
            }
    ?>
    </div>
    </div>
</body>
</html>
<?php include "Footer.php";?>