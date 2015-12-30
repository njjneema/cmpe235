<?php
define("DB_SERVER",    'hkpowerzcom.ipagemysql.com');
# define("DB_USER",      'hemanth');
define("DB_USER",      'mariadb');
// define("DB_SERVER",    'localhost');

define("DB_PASSWORD",  'password');
ini_set("log_errors", 1);
ini_set("error_log", "/tmp/php-error.log");
// error_log("Hello errors, " . __FILE__ . ":" .  __LINE__);

// Restore variables from previous session
session_start();
/* check paraeters to post here */
if (isset($_POST['params'])) {
	$params = json_decode(html_entity_decode($_POST["params"]), true);
} else if (isset($_REQUEST["params"])) {		/* can be a request method as well ? */
	$params = json_decode(html_entity_decode($_POST["params"]), true);
}
else {
	error_log(__FILE__ . " => Params not defined. Pass params from html file. Exiting\n");
	exit(0);
}

if ($params == NULL) {
	/* there is nothing to be done. So print an error hoping someone will catch it */
	error_log("\$params == NULL " . __FILE__ . ":" .  __LINE__);
	exit(0);
}

if (isset($params['username']) && isset($params["password"])) {
	$ui_id = $params['username'];
	$ui_password = $params["password"];
	$login_response = "Login failed. Wrong credentials";

	error_log("received ui_id = $ui_id and password = $ui_password");
	$conn = mysqli_connect(DB_SERVER, DB_USER, DB_PASSWORD)
		or die ("Error " . mysqli_error($conn));
	mysqli_select_db($conn, "appgrade_db")
		or die ("Error " . mysqli_error($conn));
	$qry = "SELECT ui_id, ui_fname, ui_lname, ui_type, ui_password FROM user_info_tbl where ui_email = '$ui_id'";
	error_log("Prepared query for login = $qry");
	$result = mysqli_query($conn, $qry)
		or die ("Error " . mysqli_error($conn));
	$row = mysqli_fetch_array($result);
	if ($row["ui_password"] == "$ui_password") {
	//      Here you have to put the login verification and send the data if corrrect or wrong back to index.php.
		error_log ("Password verified");
		$login_response = "Login Success";
		$login_type = $row["ui_type"];
		$_SESSION["ui_email"] = $ui_id;
		$_SESSION["ui_fname"] = $row["ui_fname"];
		$_SESSION["ui_lname"] = $row["ui_lname"];
		$_SESSION["ui_id"] = $row["ui_id"];
	} else {
		session_unset();
		session_destroy();
		error_log ("Wrong credentials");
	}
	echo json_encode(
		array(
			"status" => $login_response,
			"type" => $login_type
		     )
		);
	mysqli_close($conn);
}
?>

