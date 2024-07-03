<?php
include('conn.php');
$id=$_GET['id'];
$query="DELETE FROM Rrr_data WHERE id='$id'";
$result=mysqli_query($Conn,$query);

if($result){
    echo "<script> alert('Data Deleted')</script>";
    ?>
    <meta http-equiv = "refresh" content = "0; url =http://localhost/Registration%20form/display.php" />
    <?php
}
else
{
    echo "Deleteion failed";
}

?>