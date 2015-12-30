<?php
error_reporting(E_ALL | E_STRICT);
date_default_timezone_set('America/Los_Angeles');
/* for order by clause in mysql */
define("ORDER_DESC_ALPH", 100);
define("ORDER_ASC_ALPH", 101);
define("ORDER_DESC_DATE", 102);
define("ORDER_ASC_DATE", 103);
define("MAX_FIELD_LEN", 254);
define("HOST_NAME", "hkpowerzcom.ipagemysql.com");

function init_database($host = HOST_NAME ,
		$user = "hemanth", $passwd = "password", $dbname = "cmpe235_db")
{
	echo "Connecting to mysql $host, $user, $passwd, $dbname<p>";
	$ret = mysql_connect($host, $user, $passwd);
	if (!$ret) {
		echo "Could not connect to mysql server\n";
		trigger_error(mysql_error(), E_USER_ERROR);
	}
	echo "MySQL Connection established<p>";

	$ret1 = mysql_select_db($dbname);
	if (!$ret1) {
		echo "Could not change database\n";
		trigger_error(mysql_error(), E_USER_ERROR);
	}
	return $ret;
}

>
