<!DOCTYPE html>
<html>

<head>
	<title>Inserted Data</title>
</head>

<body>
		<?php
		$conn = mysqli_connect("localhost", "root", "", "vit");
		if($conn === false){
			die("ERROR: Could not connect. ". mysqli_connect_error());
		}

		if(isset($POST['insertbutton'])){
			$table= $_REQUEST['tables_insert'];

			if ($table == "ngo"){
					// Taking all 5 values from the form data(input)
					$ngo_reg_no = $_REQUEST['ngo_reg_no'];
					$ngo_name = $_REQUEST['ngo_name'];
					$ngo_address = $_REQUEST['ngo_address'];
					$ngo_founder = $_REQUEST['ngo_founder'];
					$ngo_year = $_REQUEST['ngo_year'];

					// Performing insert query execution
					// here our table name is ngo
					$sql = "INSERT INTO ngo VALUES ('$ngo_reg_no',
					'$ngo_name','$ngo_founder','$ngo_year','$ngo_address')";
					if(mysqli_query($conn, $sql)){
						echo "<h3>data stored in a database successfully."
							. " Please browse your localhost php my admin"
							. " to view the updated data</h3>";
					} else{
						echo "ERROR: Hush! Sorry $sql. ". mysqli_error($conn);
					}
				} else if ($table == 'volunteer') {
					// Taking all 5 values from the form data(input)
					$vol_vid = $_REQUEST['vol_vid'];
					$vol_name = $_REQUEST['vol_name'];
					$vol_address = $_REQUEST['vol_address'];
					$vol_phone = $_REQUEST['vol_phone'];
					$vol_days = $_REQUEST['vol_days'];

					// Performing insert query execution
					// here our table name is volunteer
					$sql = "INSERT INTO volunteer VALUES ('$vol_vid',
					'$vol_address','$vol_days','$vol_name','$vol_phone')";
					if(mysqli_query($conn, $sql)){
						echo "<h3>data stored in a database successfully."
							. " Please browse your localhost php my admin"
							. " to view the updated data</h3>";
					} else{
						echo "ERROR: Hush! Sorry $sql. ". mysqli_error($conn);
					}

				} else {
					echo "<h3> Kindly insert some data before pressing the button</h3>";
				}
			}
			mysqli_close($conn);
		?>	
</body>
</html>
