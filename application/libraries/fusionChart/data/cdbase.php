<?php
	$mysqlhost="localhost";
	$mysqluser="root";
	$mysqlpass="";
	mysql_pconnect("$mysqlhost","$mysqluser", "$mysqlpass");
	mysql_select_db("cnooc_pims") or die("Unable to select database");
?>