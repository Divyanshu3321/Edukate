<?php 
ob_start();  // to remove the header vala error
session_start();?>
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

a {
  text-decoration: none;
  font-size: 22px;
  color: black;
}

button:hover, a:hover {
  opacity: 0.7;
}
</style>
<body>

<h3 style="text-align:center">Welcome!</h3>

<div class="card">
  <?php 
    echo $_SESSION['username'];
    print("dfdg");
  ?>
  <img src="img/234.jpg"  style="width:100%">
  <!-- <h1>Yograj Sharma</h1> -->
  <!-- <p class="title">CEO & Founder(Edukate)</p> -->
  <!-- <p>Red River College</p> -->
  <!-- <div style="margin: 24px 0;"> -->
    <!-- <a href="#"><i class="fa fa-dribbble"></i></a>  -->
    <!-- <a href=""><i class="fa fa-twitter"></i></a>  
    <a href="https://www.instagram.com/____yograjj/"><i class="fa fa-instagram" aria-hidden="true"></i></a>  
    <a href="https://www.facebook.com/yograj.sharma.1426876"><i class="fa fa-facebook"></i></a>  -->
  </div>
  <!-- <p><button>Contact</button></p> -->
</div>

</body>
<?php include "Footer.php";?>