<?php

$mysql_host = 'localhost';
$mysql_user = 'root';
$link = mysqli_connect("localhost", "root", "", "vit");

if (!@mysqli_connect ($mysql_host, $mysql_user))
{
	die('Cannot connect to database');
}
else
{
	// database name is vit
	if (@mysqli_select_db($link, 'vit'))
	{
		echo "Fetched from database";
	}
	else
	{
		die('Cannot connect to database because bleh');
	}
}
//$('#tables_list').val()
$table= $_REQUEST['tables_list'];
$cols = $_REQUEST['cols_list'];
$sql = "SELECT $cols FROM $table";
$result = $link->query($sql);
$link->close(); 
?>

<!DOCTYPE html>
<html lang="en">
  
<head>
    <meta charset="UTF-8">
    <title>NGO Details</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css"
		integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <style>
    
    </style>
</head>
  
<body style="background-color: rgba(0,200,200,0.5);">
    <section>
        <?php 
        if($table=='ngo') { 
            ?>
        <h1 style="color:aliceblue;">Requested NGO details are as follows: </h1><br>
        <?php
            if ($cols=='*'){
        ?> 
        <table border="1pt" class="table table-hover table-dark">
            <tr>
                <th>Reg. Num.</th>
                <th>Name</th>
                <th>Address</th>
            </tr>
            <?php   
                while($rows=$result->fetch_assoc())
                {
             ?>
            <tr>
                <td><?php echo $rows['reg_no'];?></td>
                <td><?php echo $rows['name'];?></td>
                <td><?php echo $rows['address'];?></td>
                
            </tr>
            <?php
                }
             ?>
        </table>
        <?php  
            } else {
            ?>
        <table border="1pt" class="table table-hover table-dark">
            
            <tr>
                <th><?php echo $cols ?></th>
            </tr>
            <?php   
                while($rows=$result->fetch_assoc())
                {
             ?>
            <tr>
                <td><?php echo $rows[$cols];?></td>             
            </tr>
            <?php
                }
             ?>
        </table>
        <?php }
        } else {
        ?>
        <h1 style="color:aliceblue;">Requested Volunteer details are as follows: </h1><br>
        <?php
            if ($cols=='*'){
        ?> 
        <table border="1pt" class="table table-hover table-dark">
            <tr>
                <th>Volunteer ID</th>
                <th>Name</th>
                <th>Phone</th>
            </tr>
            <?php   
                while($rows=$result->fetch_assoc())
                {
             ?>
            <tr>
                <td><?php echo $rows['vid'];?></td>
                <td><?php echo $rows['name'];?></td>
                <td><?php echo $rows['phone_no'];?></td>
                
            </tr>
            <?php
                }
             ?>
        </table>
        <?php  
            } else {
            ?>
        <table border="1pt" class="table table-hover table-dark">
            
            <tr>
                <th><?php echo $cols ?></th>
            </tr>
            <?php   
                while($rows=$result->fetch_assoc())
                {
             ?>
            <tr>
                <td><?php echo $rows[$cols];?></td>             
            </tr>
            <?php
                }
             ?>
        </table>
        <?php } ?>
        <?php } ?>
    </section>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
		integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
		crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
		integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
		crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js"
		integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
		crossorigin="anonymous"></script>
</body>
  
</html>