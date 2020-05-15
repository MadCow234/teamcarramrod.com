<?php

$username = "madcow_admin";
$password = "Aces!Full12";
$database = "madcow_teamcarramrod";

$con = mysqli_connect(localhost, $username, $password, $database);

// define variables and set to empty values
$firstname = $lastname = $email = $profession = $other = $comments = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $firstname = mysqli_real_escape_string($con, $_POST["firstname"]);
  $lastname = mysqli_real_escape_string($con, $_POST["lastname"]);
  $email = mysqli_real_escape_string($con, $_POST["email"]);
  $profession = mysqli_real_escape_string($con, $_POST["profession"]);
  $other = mysqli_real_escape_string($con, $_POST["other"]);
  $comments = mysqli_real_escape_string($con, $_POST["comments"]);
}

if(mysqli_connect_errno()) {
	echo '<script language="javascript">';
	echo 'swal({title: "Error!",
					text: "Could not connect to database, try again later!",
					type: "error"})';
	echo '</script>';
} else {
	
	$sql = "INSERT INTO updates (first_name, last_name, email, profession, other, comments) VALUES ('$firstname', '$lastname', '$email', '$profession', '$other', '$comments')";
	
	if (!mysqli_query($con, $sql)) {
		echo '<script language="javascript">';
		echo 'swal({title: "Uh oh!",
					text: "Record could not be added to database!",
					type: "warning"})';
		echo '</script>';
	} else {
		echo '<script language="javascript">';
		echo 'swal({title: "YAY!",
					text: "Successfully added record to database!",
					type: "success"})';
		echo '</script>';
	};
};

mysqli_close($con);

?>