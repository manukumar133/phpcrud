<html>
    <title>
        Display
    </title>
    <style>
        body{
            background-color: antiquewhite;
        }
        table{
            background: white;
        }
        .btn{
            background-color: orange;
            color:white;
            border-radius: 5px;
            width:80px;
            height:20px;
            cursor:pointer;
        }
        .btn1{
            background-color: red;
            color:white;
            border-radius: 5px;
            width:80px;
            height:20px;
            cursor:pointer;
        }
    </style>
</html>


<?php
    include('conn.php');
    error_reporting(0);
    $query="SELECT * FROM Rrr_data";
    $data=mysqli_query($Conn,$query);

    $total=mysqli_num_rows($data);
    


    if($total !=0){
        ?>
        <h1 align="center"><mark>All Records</mark></h1>
        <table border="1" cellspacing="7" align="center" width="100%">
            <tr>
            <th>Id</th>
            <th >First Name</th>
            <th >Last Name</th>
            <th >Gender</th>
            <th >Email</th>
            <th> Date of Birth</th>
            <th width="20%">Operations</th>
            </tr>

        <?php
        while($result=mysqli_fetch_assoc($data))
        {
            echo "
            <tr>
            <td>$result[id]</td>
            <td>$result[fname]</td>
            <td>$result[lname]</td>
            <td>$result[gender]</td>
            <td>$result[email]</td>
            <td>$result[dob]</td>

            <td><a href='update.php?id=$result[id]'><input type='submit' value='Update' class='btn'></a>
                    <a href='delete.php?id=$result[id]'><input type='submit' value='Delete' name='delete' class='btn1' onclick='deletefun()'></a></td>
                <script>
                function deletefun(){
                    return confirm('Are Your Sure Want To Delete');
                    }
                </script>
            </tr>
            ";
        }
    }
else
{

}
?>
</table>
