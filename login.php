<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <link rel="stylesheet" href="login.css">
</head>
<body>
    <script>
        function myfunction(){
            return confirm("Are You Sure To Login?");
        }
    </script>
    <div class="container">
        <div class="title">
        <h1>Login Form</h1>
    </div>
        <div class="form">
            <form action="#" method="POST" onsubmit="return myfunction()" autocomplete="off">
            <div class="input-filed">

            <input type="email" class="email" id="email" name="email" placeholder="Enter Username"></div><br>

            <div class="input-filed">
            <input type="password" class="pass" id="pass" name="pass" placeholder="Enter Password"></div><br>

            <div class="anc">
            <a href="#" onclick="message()">Forget Password</a>
            </div>
            
            <div class="input-filed1">
                
            <input type="submit" value="Login" id="Login" name="Login" class="btn" >
            </div>
            <div class="anc"> <span></span><a href="index.php">New User</a>
            </div>
        </form>
    </div>
    </div>
    <script>
        function message(){
            return alert("You Should Remember Your Password");
        }
        </script>

</body>
</html>



<?php
    include('conn.php');
    error_reporting(0);

    if($_SERVER['REQUEST_METHOD']=='POST')
    {
        if(isset($_POST['Login'])){
            $email=$_POST['email'];
            $pass=$_POST['pass'];

            if($email !='' && $pass !=''){

                $query="SELECT * FROM Rrr_data WHERE email='$email' && pass='$pass' ";

                $data= mysqli_query($Conn,$query);
                $total=mysqli_num_rows($data);

                if($total>0){
                    echo "<script>alert('SuccessFully Login')</script>";
                    ?>
                        <meta http-equiv = "refresh" content = "0; url =http://localhost/Registration%20form/display.php" />
                    <?php

                }
                else
                {
                    echo "<script>alert('Invalid Email or Password')</script>";
              
                }
            }
            else
            {
                echo "<script>alert('Please Enter Email & password')</script";
            }
        }
    }
?>
