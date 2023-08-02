<?php
ob_start();  // to remove the header vala error
session_start();
?>
<?php include "header.php"; ?>
<section id="section">
    <!-- Your contact section content goes here -->
</section>
 <!-- Contact Start -->
 <div class="container-fluid py-5">
        <div class="container py-5">
            <div class="row align-items-center">
                <div class="col-lg-5 mb-5 mb-lg-0">
                    <div class="bg-light d-flex flex-column justify-content-center px-5" style="height: 450px;">
                        <div class="d-flex align-items-center mb-5">
                            <div class="btn-icon bg-primary mr-4">
                                <!-- <i class="fa-solid fa-lock"></i> -->
                                <!-- <i class="fa fa-2x fa-map-marker-alt text-white"></i> -->
                                <i class="fa fa-user-plus fa-2x" style="color: white;"></i>

                                <!-- <i class="fa-solid fa-lock fa-2xl" style="color: #130101;"></i> -->
                            </div>
                            <div class="mt-n1">
                            <!-- <a href="" class="btn btn-primary py-2 px-4 d-none d-lg-block"><h4>Admin Login</h4></a> -->
                                <a class="text-white px-2" href="Admin Login.php#section"><h4>Admin Login</h4></a>
                                <!-- <p class="m-0">123 Street, New York, USA</p> -->
                            </div>
                        </div>
                        <div class="d-flex align-items-center mb-5">
                            <div class="btn-icon bg-secondary mr-4">
                                <i class="fa fa-user-plus fa-2x" style="color: white;"></i>
                            </div>
                            <div class="mt-n1">
                                <!-- <h4></h4> -->
                                <a class="text-white px-2" href="Developer Login.php#section"><h4>Developer Login</h4></a>
                                <!-- <p class="m-0">+012 345 6789</p> -->
                            </div>
                        </div>
                        <div class="d-flex align-items-center">
                            <div class="btn-icon bg-warning mr-4">
                                <i class="fa fa-user-plus fa-2x" style="color: white;"></i>
                                
                            </div>
                            <div class="mt-n1">
                                <!-- <h4>User Login</h4> -->
                                <a class="text-white px-2" href="User Login.php#section"><h4>User Login</h4></a>
                                <!-- <p class="m-0">info@example.com</p> -->
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="section-title position-relative mb-4">
                        <h6 class="d-inline-block position-relative text-secondary text-uppercase pb-2">Welome Developer Let's Login ?</h6>
                        <h1 class="display-4">Login</h1>
                    </div>
                    <div class="contact-form">
                        <form method ="Post" enctype = "multipart/form-data">
                            <!-- <div class="row">
                                <div class="col-6 form-group">
                                    <input type="text" class="form-control border-top-0 border-right-0 border-left-0 p-0" placeholder="Your Name" required="required">
                                </div>
                                <div class="col-6 form-group">
                                    <input type="email" class="form-control border-top-0 border-right-0 border-left-0 p-0" placeholder="Your Email" required="required">
                                </div>
                            </div> -->
                            <div class="form-group">
                                <input type="text" class="form-control border-top-0 border-right-0 border-left-0 p-0" placeholder="Username" required="required" name ="username">
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control border-top-0 border-right-0 border-left-0 p-0" placeholder="Password" required="required" name="password">
                            </div>
                            <!-- <div class="form-group">
                                <textarea class="form-control border-top-0 border-right-0 border-left-0 p-0" rows="5" placeholder="Message" required="required"></textarea>
                            </div> -->
                            <div>
                                <input type="submit" class="btn btn-primary py-3 px-5" value="Login" name ="submit">
                                <a href="Developer Register.php">Let's Register ? </a>
                            </div>
                        </form>
                        <?php 
                            include "Connection.php";
                            if(isset($_POST['submit']))     // this all is format expect the query
                            {
                                $username = $_POST['username']; 
                                $password = $_POST['password']; 
                                $query= "select username, password, developerid from developer_register where username = '$username' and password = '$password' and status =1 "; 
                                // echo $query;
                                $result = insert_select_delete($con, $query); 
                                // $row = mysqli_fetch_assoc($result);
                                while ($row = mysqli_fetch_assoc($result)) {  // show multiplecolumns  // next line bss $developerid is storing value of session
                                    $developerid=$row['developerid'];   // ya session hai we can pass anthying in session we need developerid so we are passing developer we can print in header .php and see 
                                    $_SESSION['developerid']=$developerid;
                                }                                    
                                if (mysqli_num_rows($result) > 0)     // if successful make a session 
                                {
                                    $_SESSION['username']=$_POST['username'];   // session made pick his username  $_SESSION['username'] is a session used in profile.php 
                                    header("Location:Developer/Profile.php");            // redirect it to profile.php
                                    print("<br>Successful"); 
                                } else 
                                {
                                    echo '<br> <font color = red  style=font-family:verdana> <b> Incorrect Username or Password<b> <br>';
                                    echo' &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp  OR  <br> You are not Approved by Admin Yet </font>';
                                    
                                }
                                }
                            ?>
                    </div> 
                    
                    
                </div>
            </div>
        </div>
    </div>
    <!-- Contact End -->
<?php include "footer.php";?>
