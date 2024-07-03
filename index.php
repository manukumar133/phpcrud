<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <link rel="stylesheet" href="registeration.css">
</head>
<body>
    <script>
        function myfunction(){
            return confirm("Are You Sure To Register?");
        }
    </script>
    <div class="container">
        <div class="title">
        <h1>Registrartion Form</h1>
    </div>
        <div class="form">
            <form action="#" method="POST" onsubmit="return myfunction()">
            <div class="input-filed">
           <label> Enter First Name</label>
            <input type="text" class="fname" id="fname" name="fname" placeholder="Enter Your First Name"></div><br>

            <div class="input-filed">
            <label> Enter Last Name</label>
            <input type="text" class="lname" id="lname" name="lname" placeholder="Enter Your Last Name"></div><br>

            <div class="input-filed">
            <label>Gender</label>
            <div class="custom_select">
                <select name="gender" id="">
                    <option value="Not Selected">Select</option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                    <option value="Other's">Others</option>
                </select>
                </div><br>
            </div>

            <div class="input-filed">
            <label>Enter Email</label>
            <input type="email" class="emailt" id="email" name="email" placeholder="Enter Your Email"></div><br>
            <div class="input-filed">
            <label>Date Of Birth</label>
            <input type="date" class="date" id="date" name="dob"></div><br>

            <div class="input-filed">
            <label>Enter Password</label>
            <input type="password" class="pass" id="pass" name="pass" placeholder="Enter Your Password"></div><br>
            
            <div class="input-filed">
                <label>Confirm Password</label>
                <input type="password" class="cpass" id="cpass" name="cpass" placeholder="Enter Your Password"></div><br>

            <div class="input-filed1">
            <input type="submit" value="submit" id="submit" name="submit" class="btn" >
            </div>
            <div class="anc"> <span></span> <a href="Login.php">Login</a>
            </div>
        </form>
    </div>
    </div>
</body>
</html>
<?php
include('conn.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['submit'])) {
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $gender = $_POST['gender'];
        $email = $_POST['email'];
        $dob = $_POST['dob'];
        $Password = $_POST['pass'];
        $CPassword = $_POST['cpass'];

        // Validation server side.
        if ($fname != "" && $lname != "" && $gender != "" && $email != "" && $dob != "" && $Password != "" && $CPassword != "") {
            if (strlen($Password) >= 6) {
                if ($Password === $CPassword) {
                    $query="SELECT * FROM Rrr_data WHERE email='$email'";
                    $data=mysqli_query($Conn,$query);
                    if (mysqli_num_rows($data) == 0) {
                        // Use prepared statement to avoid SQL syntax errors and injection
                        $stmt = $Conn->prepare("INSERT INTO Rrr_data (fname, lname, gender, email, dob, pass, cpass) VALUES (?, ?, ?, ?, ?, ?, ?)");
                        $stmt->bind_param("sssssss", $fname, $lname, $gender, $email, $dob, $Password, $CPassword);

                        // Execute the query
                        if ($stmt->execute()) {
                            echo "<script>alert('Data Inserted')</script>";
                            ?>
                            <meta http-equiv = "refresh" content = "0; url =http://localhost/Registration%20form/login.php" />
                        <?php
                        } else {
                            echo "Data Insertion Failed: " . $stmt->error;
                        }

                        // Close the statement
                        $stmt->close();
                    } else {
                        echo "<script>alert('Email already exists')</script>";
                    }
                } else {
                    echo "<script>alert('Passwords do not match')</script>";
                }
            } else {
                echo "<script>alert('Password must be at least 6 characters long')</script>";
            }
        } else {
            echo "<script>alert('Please enter all fields')</script>";
        }
    }
}
?>
