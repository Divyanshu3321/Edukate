<?php include "Header.php";?>  <!-- session already opened in header file -->  <!--Session is opened here of that user-->
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editing Assignments</title>
    <script src="../0JQuery.js"></script>


    <script>
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
</head>
<body>
<?php
    include "../Connection.php";  //  .. means coming out from one folder and / means entering in the other folder
    
    $developerid = isset($_GET['developerid']) ? $_GET['developerid'] : '';

    $query = "SELECT * FROM developer_register WHERE developerid = '$developerid'";
    // print($query);
    
    $result = insert_select_delete($con, $query);
    // print($result);
    while ($row = mysqli_fetch_array($result)) // fetching data from table
    {
        ?>
        <form method="post" enctype="multipart/form-data">
        <div >
        <div class="col-sm-6 mb-3 mb-sm-0">
            <label for="FirstName">FirstName:</label>
            <input  type="text" class="form-control form-control-user"  id = "firstname"placeholder="firstname" value="<?php echo $row['firstname'] ?>" required name="firstname">
        </div><br> 
        <div >
        <div class="col-sm-6 mb-3 mb-sm-0">
            <label for="LastName">LastName:</label>
            <input type="text" class="form-control form-control-user" id = "lastname" placeholder="lastname" value="<?php echo $row['lastname'] ?>" required name="lastname">
        </div><br> 
        <div >
        <div class="col-sm-6 mb-3 mb-sm-0">
            <label for="Telephone">Telephone:</label>
            <input type="text" class="form-control form-control-user" minlength="10" maxlength="10" id = "telephone" placeholder="telephone" value="<?php echo $row['telephone'] ?>" required name="telephone">
        </div>  <br>
        <div >
        <div class="col-sm-6 mb-3 mb-sm-0">
            <label for="Username">Username:</label>
            <input readonly type="text" class="form-control form-control-user"  placeholder="username" value="<?php echo $row['username'] ?>" required name="username">
        </div><br> 
        <div >
        <div class="col-sm-6 mb-3 mb-sm-0">
            <label for="Email">Email:</label>
            <input type="email" class="form-control form-control-user" placeholder="email" value="<?php echo $row['email'] ?>" required name="email">
        </div><br>  
        <div >
        <div class="col-sm-6 mb-3 mb-sm-0">
            <label for="Linkedin">Linkedin:</label>
            <input type="text" class="form-control form-control-user" placeholder="linkedln" value="<?php echo $row['linkedln'] ?>" required name="linkedln">
        </div><br> 
        <div >
        <div class="col-sm-6 mb-3 mb-sm-0">
            <label for="GitHub">GitHub:</label>
            <input type="text" class="form-control form-control-user" placeholder="github" value = "<?php echo $row['github'] ?>" required name="github">
        </div><br> <br> 
        <div >
        <div class="col-sm-6 mb-3 mb-sm-0">
            <!-- <label for="FirstName">FirstName:</label> -->
            <img src="../Developer_Register_Images/<?php echo $row['yourimage'] ?>" alt="" height = "250px" width = "250px"> <!-- Image is folder name-->
            <input type="hidden" name="oldimage" value="<?php echo $row['yourimage'] ?>">
            <input  type="file" name="newimage" required> <br> <br>

            <input class="btn btn-primary py-3 px-5" name="Update" type="submit" value="Update"  id = "submit"> <br> <br> <br> <br>
        </form>

        <?php
    }
?>
<?php 

    if(isset($_POST['Update'])) // value jo upr likha ussa use kiya yaha pa
    {
        $firstname=$_POST['firstname'];
        $lastname=$_POST['lastname'];
        $telephone=$_POST['telephone'];
        $username=$_POST['username'];
        $email=$_POST['email'];
        $linkedln=$_POST['linkedln'];
        $github=$_POST['github'];
        $oldimage=$_POST['oldimage']; // old image
        $yourimage=$_FILES['newimage']['name']; // name of your image 
        // print($yourimage."<br>");
        
        unlink("../Developer_Register_Images/$oldimage");  // Images is folder name unlink it 
        if(move_uploaded_file($_FILES['newimage']['tmp_name'],"../Developer_Register_Images/".$_FILES['newimage']['name'])) // tmp_name = predefined, name = predefined, photos= vala folder ma jayaga
        {
            print("Uploaded");
        }
        $query = "update developer_register set firstname= '$firstname', lastname='$lastname' ,telephone = '$telephone',username='$username', email='$email',linkedln='$linkedln',github='$github',yourimage='$yourimage' where developerid = '$developerid'";
        print($query);
        $result = insert_select_delete($con, $query);
        header("Location:Profile.php");
    }
?>
</body>
</html>
<?php include "Footer.php";?>

