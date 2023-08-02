<?php include "Header.php";?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Profile</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f1f1f1;
            margin: 0;
            padding: 0;
        }

        h1 {
            text-align: center;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px auto;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        th, td {
            padding: 12px 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #f5f5f5;
        }

        .card-body {
            padding: 20px;
        }

        .table-responsive {
            overflow-x: auto;
        }

        /* Add more custom styles here if needed */

        /* Media query for responsiveness */
        @media screen and (max-width: 600px) {
            table {
                font-size: 14px;
            }
        }
    </style>
</head>
<body>
    

    <h1>Profile </h1>

    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable">
                <thead>
                    <tr>
                        <th>Firstname</th>
                        <th>Lastname</th>
                        <th>Email</th>
                        <th>Telephone</th>
                        <th>Username</th>
                        <th>Image</th>
                        <th>Edit</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        include "../Connection.php";
                        $username = $_SESSION['username'];  // session sa username udana 
                        // $developerid = $_SESSION['developerid'];
                        $query = "SELECT * FROM user_register WHERE username = '$username'";
                        $result = insert_select_delete($con, $query);
                        while ($row = mysqli_fetch_array($result)) {
                            // $developerid = $row['developerid'];
                            echo "<tr>";
                            echo "<td>" . $row['fistname'] . "</td>";
                            echo "<td>" . $row['lastname'] . "</td>";
                            echo "<td>" . $row['email'] . "</td>";
                            echo "<td>" . $row['telephone'] . "</td>";
                            echo "<td>" . $row['username'] . "</td>";
                            
                            // echo "<td>" . $row['linkedln'] . "</td>";
                            // echo "<td>" . $row['github'] . "</td>";
                            echo "<td>" . $row['image'] . "</td>";
                            echo "<td><a href='User Editing.php?username=$username'>Edit</a></td>";
                            echo "</tr>";
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

    
</body>
</html>
<?php include "Footer.php";?>
