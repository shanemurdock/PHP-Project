<?php
				/* Database Connection*/
				
				$servername = "localhost";
				$username = "root";
				$password = "";
				$dbname = "project_2017";

				// Create connection
				$conn = new mysqli($servername, $username, $password, $dbname);

				// Check connection
				if ($conn->connect_error) {
					die("Connection failed: " . $conn->connect_error);
				} 
				
				function pass_input($data) {
				$data = trim($data);
				$data = stripslashes($data);
				$data = strip_tags($data);
				return $data;
				}
			
				if($_SERVER['REQUEST_METHOD'] == "POST"){
				echo "<h3>New Pateint Details:</h3>";
				echo "<h4>Name:</h4>".$_POST['username'];
				echo "<h4>Name:</h4>".$_POST['password'];
				echo "<h4>Name:</h4>".$_POST['first_name'];
				echo "<h4>Name:</h4>".$_POST['last_name'];
				echo "<h4>Date of Birth:</h4>".$_POST['date_of_birth'];
				echo "<h4>Gender:</h4>".$_POST['gender'];
				echo "<h4>Phone:</h4>".$_POST['mobile'];
				echo "<h4>Phone:</h4>".$_POST['home_tel'];
				echo "<h4>Email:</h4>".$_POST['email'];
				echo "<h4>Address:</h4>".$_POST['address'];
				echo "";
				
				} else {
				echo "<h4>Please <a href='register_appointmnets.php'>go back</a> and enter contact details!</h4>";
				}
				
				$sql = "INSERT INTO patient (username,password,first_name,last_name,date_of_birth,gender,mobile,home_tel,email,address)
				VALUES ('$_POST[username]','$_POST[password]','$_POST[first_name]', '$_POST[last_name]', '$_POST[date_of_birth]', '$_POST[gender]', '$_POST[mobile]', '$_POST[home_tel]',
				'$_POST[email]', '$_POST[address]')";
				
				if (mysqli_query($conn, $sql)) {
					echo "";
					echo "Data Inserted Successfully";
					echo "";
				} else {
					echo "Error accessing database: " . mysqli_error($conn);
				}
				
				mysqli_close($conn);
			?>
				