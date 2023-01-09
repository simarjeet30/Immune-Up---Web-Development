<?php


session_start();
// Change this to your connection info.
$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'priyam';
$DATABASE_PASS = '123456';
$DATABASE_NAME = 'cowin';
// Try and connect using the info above.
$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
if ( mysqli_connect_errno() ) {
	// If there is an error with the connection, stop the script and display the error.
	exit('Failed to connect to MySQL: ' . mysqli_connect_error());
}
$mob1=$_POST['mobilenumber1'];
$pass1=$_POST['password1'];
echo $mob1;

// Now we check if the data from the login form was submitted, isset() will check if the data exists.
if ( isset($_POST['mobilenumber1'], $_POST['password1']) ) {
	// Could not get the data that should have been sent.
	

$sql = "SELECT * FROM dept WHERE Mobilenum1='$mob1' AND password='$pass1'";
echo $sql;

        $result = mysqli_query($con, $sql);
		
		 if (mysqli_num_rows($result) === 1) {

            $row = mysqli_fetch_assoc($result);

            //if ($row['Mobilenum'] === $_POST['Mobilenum'] && $row['password'] === $_POST['password']) {

                echo "Logged in!";
				session_regenerate_id();
		$_SESSION['loggedin'] = TRUE;
		$_SESSION['Mobilenum1'] = $_POST['mobilenumber1'];
		$_SESSION['password1'] = $_POST['password1'];
		//echo 'Welcome ' . $_SESSION['Mobilenum'] . '!';
		header("Location: website1.php");

                exit();
		} else {
		// Incorrect password
		echo 'Incorrect username and/or password!';
	}
} else {
	// Incorrect username
	echo 'Incorrect username and/or password!';
}

?>