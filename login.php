<?php
				/* Database Connection*/
				
				$servername = "localhost";
				$username = "root";
				$password = "";
				$dbname = "project_2017";
				$errors = array();
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
			
				if(empty($_POST['username']))
				{
					$errors[] = 'You Forgot To Enter Username';
				}
				else
				{
					$user = pass_input($_POST['username']);
				}
				if(empty($_POST['password']))
				{
					$errors[] = 'You Forgot To Enter Password';
				}
				else
				{
					$pass = pass_input($_POST['password']);
				}
				
				$query = "SELECT * FROM patient WHERE username = '$user' AND password = '$pass'";
				$result = @mysqli_query($conn, $query);
				$num = @mysqli_num_rows($result);
				if($num == 1)
				{
					$row = @mysqli_fetch_array($result);
					echo $row['first_name']." Login Successful".'</br>';
				}
				else
				{
					echo "<h2>Error!</h2><h3>Username and Password Are Incorrect!</h3>";
				}
				
								


?>