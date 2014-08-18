<?php
function connectDb()
{
    header("Content-Type: text/html;charset=utf-8");
    $charset = "utf8";
	$dbName = "test";
    $con = mysql_connect("localhost:3306", "root", "system");

    mysql_query("SET character_set_connection=$charset, character_set_results=$charset, character_set_client=binary", $con);

    mysql_select_db($dbName, $con);
    return $con;
}
