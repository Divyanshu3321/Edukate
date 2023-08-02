<?php include "Header.php";?>

<head><script src="../0JQuery.js"></script>
    <script>
        $(document).ready(function(){
            $("#submit").submit(function(e){     // after clicking on register button then this will get active by id used in it id = "#submit1"
                npassword = $("#npassword").val();  // picking npassword value
                cpassword = $("#cpassword").val(); // picking value of cpassword
                if (cpassword != cpassword ){
                    $("#pass").html("Passwords Doesn't Match").css({"color": "Red"});  // Printing  jaha pass hoga vaha prr print hoga mssg
                    // return false  // Prevent the form from being submitted until condition is fulfilled
                    e.preventDefault();
                } 
                else{
                    $("#pass").html(""); // print empty
                }
                e.preventDefault();
            });
            });
            </script></head>

<?php
 include "../Connection.php";
 if(isset($_POST['submit']))
 
 
 {
    $user_n = $_REQUEST['username'];
    $email = $_REQUEST['email'];
    $old_p = $_REQUEST['opassword'];
    $new_p = $_REQUEST['npassword'];
    $query = "select *from user_register where password='$old_p' and username='$user_n' and email='$email'";
    $row = mysqli_query($con,$query);
    if(mysqli_num_rows($row)>0)
    {
        if ($_POST["npassword"] === $_POST["cpassword"])
        {
        $query1 = "update user_register set password='$new_p' where username='$user_n'";
        mysqli_query($con,$query1);
        echo"<h1><font color='green'>Your password has been changed successfully</font> </h1>";
        }
        else
        {
            echo"<h1> <font color='red'>Confirm passwod does'nt match</font> </h1>";
        }
     
    }
    else{
        echo"<h1> <font color='red'>Please fill correct your details</font> </h1>";
    }
}
   

         ?>
        <!-- <div class="card-body">
             <div class="table-responsive"> <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0"> -->
        
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<form method="post" id="submit" enctype = "multipart/form-data">
        
        <div class="col-sm-6 mb-3 mb-sm-0">
        <label for="Username:">Username</label>
            <input  type="text" class="form-control form-control-user"  placeholder="Enter Username" required="required" name ="username">
        </div><br> <br> 
        <div class="col-sm-6">
            <input type="text" class="form-control form-control-user" placeholder="Enter E-mail" required="required" name="email">
        </div> <br> <br> 
        <div class="col-sm-6 mb-3 mb-sm-0">
            <input type="password" class="form-control form-control-user" placeholder="Enter Old Password" required="required" name="opassword">
        </div> <br> <br>
        <div class="col-sm-6">
            <input type="password" class="form-control form-control-user" placeholder="Enter New Password" id="npassword" required="required" name="npassword">
        </div> <br> <br> 
        <div class="col-sm-6">
            <input type="password" class="form-control form-control-user" placeholder="Confirm New Password"  id="cpassword" required="required" name="cpassword">
        </div> <br> <br> 
        <div class="col-sm-6">
            <input type="submit"  class="btn btn-primary py-3 px-5"  id="submit" value="Change Password" name ="submit">
        </div> <br> <br> 
</form>
</body>
</html>
<?php include "Footer.php";?>