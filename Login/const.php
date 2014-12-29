<?php

// !Important : Please rewrite Database setting when you pull it to Server.
$connect = mysql_connect("localhost","root","zaqwe"); 
$db = mysql_select_db("hippi1");
if ((!$connect) or (!$db))
	echo "We are sorry, database is fixing.<br />";

?>