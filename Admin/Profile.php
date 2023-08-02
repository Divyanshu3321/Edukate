
<?php include "Header.php";?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
.card {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  max-width: 300px;
  margin: auto;
  text-align: center;
  font-family: arial;
}

.title {
  color: grey;
  font-size: 18px;
}

button {
  border: none;
  outline: 0;
  display: inline-block;
  padding: 8px;
  color: white;
  background-color: #000;
  text-align: center;
  cursor: pointer;
  width: 100%;
  font-size: 18px;
}



button:hover, a:hover {
  opacity: 0.7;
}
</style>
<body>

<h3 style="text-align:center">Welcome!</h3>

<div class="card"> 
<?php 

include "../Connection.php";
  $username=$_SESSION['username'];  // session sa username aya 
  
  $query= "select * from adminlogin where username = '$username'";  
  $result = insert_select_delete($con, $query);
  $row = mysqli_fetch_assoc($result);
            $image_path = "Images/" . $row['image']; // name of sql row image// by row i m picking all sql data

            // echo $image_path;
            // echo $image_path;

            // Store the image path in the session
            // $_SESSION['image'] = $image_path;
      
        echo "<img src='$image_path' alt='Uploaded Image' style='height: 300px; width: 30s0px;'>";
        print("<h1>".$username."</h1>");  
        print("<h5>".$row['college']."</h5>");
        print("<p>".$row['name']."</p>");    // ."&nbsp" is a space entity in html
        print("<p>".$row['email']."</p>");                          
  ?>
  

  
  <p class="title">Admin(Edukate)</p>
  <div style="margin: 24px 0;">
    <!-- <a href="#"><i class="fa fa-dribbble"></i></a>  -->
    <!-- <a href=""><i class="fa fa-twitter"></i></a>  
    <a href="https://www.instagram.com/____yograjj/"><i class="fa fa-instagram" aria-hidden="true"></i></a>  
    <a href="https://www.facebook.com/yograj.sharma.1426876"><i class="fa fa-facebook"></i></a>  -->
  </div>
  <!-- <p><button>Contact</button></p> -->
</div>

</body>
<?php include "Footer.php";?>