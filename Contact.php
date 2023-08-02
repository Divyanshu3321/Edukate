<?php include "header.php"; ?>
<section id="contact-section">
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
                                <i class="fa fa-2x fa-map-marker-alt text-white"></i>
                            </div>
                            <div class="mt-n1">
                                <h4>Our Location</h4>
                                <p class="m-0">PR 3 institute, Sangrur,Punjab, India</p>
                            </div>
                        </div>
                        <div class="d-flex align-items-center mb-5">
                            <div class="btn-icon bg-secondary mr-4">
                                <i class="fa fa-2x fa-phone-alt text-white"></i>
                            </div>
                            <div class="mt-n1">
                                <h4>Call Us</h4>
                                <p class="m-0">+91 9988746254</p>
                            </div>
                        </div>
                        <div class="d-flex align-items-center">
                            <div class="btn-icon bg-warning mr-4">
                                <i class="fa fa-2x fa-envelope text-white"></i>
                            </div>
                            <div class="mt-n1">
                                <h4>Email Us</h4>
                                <p class="m-0">edukate@gmail.com</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="section-title position-relative mb-4">
                        <h6 class="d-inline-block position-relative text-secondary text-uppercase pb-2">Need Help?</h6>
                        <h1 class="display-4">Send Us Feedback</h1>
                    </div>
                    <div class="contact-form">
                        <form method ="Post" >
                            <div class="row">
                                <div class="col-6 form-group">
                                    <input type="text" class="form-control border-top-0 border-right-0 border-left-0 p-0" placeholder="Your Name" name = "name" required="required">
                                </div>
                                <div class="col-6 form-group">
                                    <input type="email" class="form-control border-top-0 border-right-0 border-left-0 p-0" placeholder="Your Email" name = "email" required="required">
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control border-top-0 border-right-0 border-left-0 p-0" placeholder="Subject" name = "subject" required="required">
                            </div>
                            <div class="form-group">
                                <textarea class="form-control border-top-0 border-right-0 border-left-0 p-0" rows="5" placeholder="Message" name = "mssg" required="required"></textarea>
                            </div>
                            <div>
                                <input class="btn btn-primary py-3 px-5" type="submit" name = "submit"></input>
                            </div>
                        </form>
                        <?php 
                            include "Connection.php";
                            if(isset($_POST['submit']))     // this all is format expect the query
                            {
                                $name = $_POST['name']; 
                                $email = $_POST['email']; 
                                $subject = $_POST['subject'];
                                $mssg = $_POST['mssg'];
                                $query = "INSERT INTO contactus VALUES ('$name', '$email', '$subject', '$mssg')";
                                $result = insert_select_delete($con, $query); 
                                // print($result);
                                    if ($result)
                                    {
                                        print("<h3> Successful </h3>");
                                    }
                                }
                            ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact End -->
<?php include "Footer.php";?>
