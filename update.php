<?php
    include('conn.php');
   $id= $_GET['id'];

   $query="SELECT * FROM Rrr_data WHERE id='$id'";
   $data=mysqli_query($Conn,$query);
   $total=mysqli_num_rows($data);

   $result=mysqli_fetch_assoc($data);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Form</title>
    <link rel="stylesheet" href="registeration.css">
</head>
<body>
    <script>
        function myfunction(){
            return confirm("Are You Sure Want To Update?");
        }
    </script>
    <div class="container">
        <div class="title">
        <h1>Updatetion Form</h1>
    </div>
        <div class="form">
            <form action="#" method="POST" onsubmit="return myfunction()">
            <div class="input-filed">
           <label> Enter First Name</label>
            <input type="text" class="fname" value="<?php echo $result['fname'] ?>" id="fname" name="fname" placeholder="Enter Your First Name"></div><br>

            <div class="input-filed">
            <label> Enter Last Name</label>
            <input type="text" class="lname" value="<?php echo $result['lname'] ?>" id="lname" name="lname" placeholder="Enter Your Last Name"></div><br>

            <div class="input-filed">
            <label>Gender</label>
            <div class="custom_select">
                <select name="gender" id="">
                    <option value="Not Selected">Select</option>
                    <option value="Male"
                    <?php
                        if($result['gender']=='Male'){
                        echo "selected";
                    } ?>
                    >Male</option>
                    <option value="Female"
                    <?php if($result['gender']=='Female'){
                        echo "selected";
                    } ?>
                    >Female</option>
                    <option value="Other's"
                    <?php if($result['gender']=="Other's"){
                        echo "selected";
                    } ?>
                    >Others</option>
                </select>
                </div><br>
            </div>

            <div class="input-filed">
            <label>Enter Email</label>
            <input type="email" class="email" value="<?php echo $result['email'] ?>" id="email" name="email" placeholder="Enter Your Email"></div><br>
            <div class="input-filed">
            <label>Date Of Birth</label>
            <input type="date" class="date" value="<?php echo $result['dob'] ?>" id="date" name="dob"></div><br>

            <div class="input-filed">
            <label>Enter Password</label>
            <input type="password" class="pass" value="<?php echo $result['pass'] ?>" id="pass" name="pass" placeholder="Enter Your Password"></div><br>
            
            <div class="input-filed">
                <label>Confirm Password</label>
                <input type="password" class="cpass" value="<?php echo $result['cpass'] ?>" id="cpass" name="cpass" placeholder="Enter Your Password"></div><br>

            <div class="input-filed1">
            <input type="submit" value="Update"  name="Update" class="btn" name="Update" >
            </div>
        </form>
    </div>
    </div>
</body>
</html>
<?php
include('conn.php');
error_reporting(0);
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['Update'])) {
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $gender = $_POST['gender'];
        $email = $_POST['email'];
        $dob = $_POST['dob'];
        $Password = $_POST['pass'];
        $CPassword = $_POST['cpass'];

        // Validation server side.
        if ($fname != "" && $lname != "" && $gender != "" && $email != "" && $dob != "" && $Password != "" && $CPassword != "") {
            // Use prepared statement to avoid SQL syntax errors and injection
            // $stmt = $Conn->prepare("INSERT INTO Rrr_data (fname, lname, gender, email, dob, pass, cpass) VALUES (?, ?, ?, ?, ?, ?, ?)");
            // $stmt->bind_param("sssssss", $fname, $lname, $gender, $email, $dob, $Password, $CPassword);
            $query="UPDATE Rrr_data set fname='$fname' , lname='$lname', gender='$gender', email='$email', dob='$dob', pass='$Password' , cpass='$CPassword' WHERE id='$id' ";
            // Execute the query
            // if ($stmt->execute())
            $data= mysqli_query($Conn,$query);

            if($data)
             {
                echo "<script>alert('Data Updated')</script>";
                ?>
                       <meta http-equiv = "refresh" content = "0; url =http://localhost/Registration%20form/display.php" />
                <?php
            } else {
                echo "Failed: " . $stmt->error;
            }

            // Close the statement
            $stmt->close();
        } else {
            echo "<script>alert('Please Enter all fields')</script>";
        }
    }
}
?>
