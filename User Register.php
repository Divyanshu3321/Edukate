<?php
ob_start();  // to remove the header vala error
session_start();
?>
<?php include "header.php"; ?>
<script src="0JQuery.js"></script>
    <script>
        $(document).ready(function(){
            $("#submit1").click(function(){     // after clicking on register button then this will get active by id used in it id = "#submit1"
                password = $("#password").val();  // picking password value
                reenterpassword = $("#reenterpassword").val(); // picking value of reenterpassword
                if (password != reenterpassword ){
                    $("#pass").html("Passwords Doesn't Match").css({"color": "Red"});  // Printing  jaha pass hoga vaha prr print hoga mssg
                    return false  // Prevent the form from being submitted until condition is fulfilled
                } 
                else{
                    $("#pass").html(""); // print empty
                }

            });
        });
        $(document).ready(function() {
            $('#firstname, #lastname').on('input', function() {
                var inputVal = $(this).val();
                var regex = /^[A-Za-z]+$/;
                if (!regex.test(inputVal)) {
                $(this).val(inputVal.replace(/[^A-Za-z]+/g, ''));
                }
        });
            $('#telephone').on('input', function() {
                var inputVal = $(this).val();
                var regex = /^[0-9]+$/;
                if (!regex.test(inputVal)) {
                $(this).val(inputVal.replace(/[^0-9]+/g, ''));
                }
        });
    });
</script>
 <!-- Contact Start -->
 <div class="container-fluid py-5">
        <div class="container py-5">
            <div class="row align-items-center">
                <div class="col-lg-5 mb-5 mb-lg-0">
                    <!-- <div class="bg-light d-flex flex-column justify-content-center px-5" style="height: 450px;">
                        <div class="d-flex align-items-center mb-5">
                            <div class="btn-icon bg-primary mr-4">
                                <i class="fa-solid fa-lock"></i>
                                <i class="fa fa-2x fa-map-marker-alt text-white"></i>
                                <i class="fa-solid fa-lock fa-2xl" style="color: #130101;"></i>
                            </div>
                            <div class="mt-n1">
                            <a href="" class="btn btn-primary py-2 px-4 d-none d-lg-block"><h4>Admin Login</h4></a>
                                <a class="text-white px-2" href=""><h4>Admin Login</h4></a>
                                <p class="m-0">123 Street, New York, USA</p>
                            </div>
                        </div>
                        <div class="d-flex align-items-center mb-5">
                            <div class="btn-icon bg-secondary mr-4">
                                <i class="fa fa-2x fa-phone-alt text-white"></i>
                            </div>
                            <div class="mt-n1">
                                <h4></h4>
                                <a class="text-white px-2" href=""><h4>Developer Login</h4></a>
                                <p class="m-0">+012 345 6789</p>
                            </div>
                        </div>
                        <div class="d-flex align-items-center">
                            <div class="btn-icon bg-warning mr-4">
                                <i class="fa fa-2x fa-envelope text-white"></i>
                            </div>
                            <div class="mt-n1">
                                <h4>User Login</h4>
                                <a class="text-white px-2" href=""><h4>User Login</h4></a>
                                <p class="m-0">info@example.com</p>
                            </div> 
                        </div>-->
                    </div> 
                </div>
                <div class="col-lg-7">
                    <div class="section-title position-relative mb-4">
                        <!-- <h6 class="d-inline-block position-relative text-secondary text-uppercase pb-2">Need Help?</h6> -->
                        <h1 class="display-4">Register</h1>
                    </div>
                    <div class="contact-form">
                        <form method ="Post" enctype = "multipart/form-data">
                            <div class="row">
                                <div class="col-6 form-group">
                                    <input type="text"  id="firstname" class="form-control border-top-0 border-right-0 border-left-0 p-0" placeholder="First Name" name="firstname" required="required">
                                </div>
                                <div class="col-6 form-group">
                                    <input type="text"  id="lastname" class="form-control border-top-0 border-right-0 border-left-0 p-0" placeholder="Last Name"  name="lastname" required="required">
                                </div>
                                <div class="col-6 form-group">
                                    <input type="email" id="email" class="form-control border-top-0 border-right-0 border-left-0 p-0" placeholder="Email"  name="email" required="required">
                                </div>
                                <div class="col-6 form-group">
                                    <input type="text"  id="telephone" class="form-control border-top-0 border-right-0 border-left-0 p-0" placeholder="Telephone"  minlength="10" maxlength="10" name="telephone" required="required">
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control border-top-0 border-right-0 border-left-0 p-0" placeholder="Username" required="required" name ="username">
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control border-top-0 border-right-0 border-left-0 p-0" id="password" placeholder="Password" required="required" name="password">
                            </div>
                            <div class="form-group">
                                <input type="password"  class="form-control border-top-0 border-right-0 border-left-0 p-0" id="reenterpassword"  placeholder="Re Enter Password" required="required" name="reenterpassword">
                                <span id="pass"></span>
                            </div>
                            <div class="form-group">
                                <input type="file"  class="form-control border-top-0 border-right-0 border-left-0 p-0" id="image" name="image" placeholder="Your Image" required="required">
                            </div>
                            <!-- <div class="form-group">
                                <textarea class="form-control border-top-0 border-right-0 border-left-0 p-0" rows="5" placeholder="Message" required="required"></textarea>
                            </div> -->
                            <div>
                                <a href="User Login.php">Login ? </a>
                                <input type="submit" class="btn btn-primary py-3 px-5" value="Register" id="submit1" name ="submit1">
                            </div>
                            
                        </form>
                        <?php
                            include "Connection.php";
                                if(isset($_POST['submit1'])) {
                                    $firstname = $_POST['firstname']; 
                                    // print("firstname");
                                    $lastname = $_POST['lastname']; 
                                    $email = $_POST['email']; 
                                    $telephone = $_POST['telephone']; 
                                    $query3= "select telephone from user_register where telephone = '$telephone' ";   
                                    $result3 = insert_select_delete ($con, $query3); 
                                    if (mysqli_num_rows($result3) > 0) {

                                        // $row = mysqli_fetch_assoc($result3);
                                        // if($telephone==isset($row['telephone']))
                                        // {
                                                die ("Telephone Already Exist <br>");  // connection will die here nothing will be executed further
                                        // }
                                        }
                                    $username = $_POST['username'];
                                    $query1= "select username from user_register where username = '$username' "; 
                                    $result1 = insert_select_delete ($con, $query1); 
                                    if (mysqli_num_rows($result1) > 0) {
                                
                                        // $row = mysqli_fetch_assoc($result1);
                                        // if($username==isset($row['username']))
                                        // {
                                            die( "Username  Already Exist <br>"); // connection will die here nothing will be executed further
                                        // }
                                        }
                                    $query2= "select email from user_register where email = '$email' ";   
                                    $result2 = insert_select_delete ($con, $query2); 
                                    if (mysqli_num_rows($result2) > 0) {

                                        // $row = mysqli_fetch_assoc($result2);
                                        // if($email==isset($row['email']))
                                        // {
                                                die( "Email Already Exist<br>"); // connection will die here nothing will be executed further
                                        // }
                                        }
                                    $password = $_POST['password']; 
                                    $reenterpassword = $_POST['reenterpassword']; 
                                    // print("$reenterpassword");
                                    $image = $_FILES['image']['name'];
                                    // print("$image");
                                    $query = "INSERT INTO user_register VALUES ('$firstname', '$lastname', '$email', '$telephone', '$username', '$password', '$reenterpassword', '$image')";
                                    $result = insert_select_delete($con, $query); 
                                    // echo $result;
                                    if ($result)
                                    {
                                        if(move_uploaded_file($_FILES['image']['tmp_name'], "User_Register_Images/".$_FILES['image']['name'])) {
                                            print("<br>Successful<br>");
                                            // echo "<img src='Images/" . $_FILES['image']['name'] . "' alt='Uploaded Image' style='height: 200px; width: 200px;'>";
                                        }
                                    else{
                                        
                                    }
                                    }
                                    
                                    // $query = "INSERT INTO user_register VALUES ('$firstname', '$lastname', '$email', '$telephone', '$username', '$password', '$reenterpassword', '$image')";
                                    // $result = insert($con, $query); 
                                    
                                }       
                            ?>
                    </div> 
                </div>
            </div>
        </div>
    </div>
    <!-- Contact End -->
<?php include "footer.php";?>
