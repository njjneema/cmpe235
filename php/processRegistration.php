<html>
<body>
<?php

if (!empty($_POST)) {
	//print_r($_POST);
	if (isset($_POST['txt_username'])) {
		$username = $_POST['txt_username'];
		$type = $username[0];
		$username[0] = '0';
	}
	if (isset($_POST['txt_firstname'])){
		$firstname = $_POST['txt_firstname'];
	}
	if (isset($_POST['txt_lastname'])) {
		$lastname = $_POST['txt_lastname'];
	}
	if (isset($_POST['gender'])) {
		$gender = $_POST['gender'];
	}
	if (isset($_POST['txt_email'])) {
		$email = $_POST['txt_email'];
	}
	if (isset($_POST['txt_password'])) {
		$password = $_POST['txt_password'];
	}
	if (isset($_POST['txt_password'])) {
		$password = $_POST['txt_password'];
	}
}
//echo "phone = $phone\n";
$conn = mysql_connect('hkpowerzcom.ipagemysql.com', 'mariadb', 'password');
// $conn = mysql_connect('localhost', 'mariadb', 'password');
if (!$conn) {
    die('Could not connect: ' . mysql_error());
}

mysql_select_db("appgrade_db");

$sql = "INSERT INTO
user_info_tbl
(ui_id, ui_type, ui_fname, ui_lname, ui_email, ui_gender, ui_phone, ui_password)
VALUES
('$username','$type','$firstname','$lastname', '$email', '$gender[0]', '$phone', '$password')";

//echo "mysql query $sql\n";
if(!mysql_query($sql, $conn)) {
	die('Error: ' . mysql_error());
}
mysql_close($conn);
?>

<META http-equiv="refresh" content="0;URL=http://www.hkpowerz.com/cmpe235/php/login.php">

</body>
</html>
