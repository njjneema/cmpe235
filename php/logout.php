<html>
<head>
</head>
<body>

<?php
session_start();
ini_set("log_errors", 1);
ini_set("error_log", "/tmp/php-error.log");
foreach ($_SESSION as $key=>$value) {
	error_log("session : key =>   ". $key . " value =>   " . $value);
}
session_unset();
session_destroy();
error_log ("Session destroyed!");
?>

<script> window.location.replace("/cmpe235/php/login.php"); </script>
</body>
</html>
