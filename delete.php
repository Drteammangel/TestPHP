<?php
header("Content-Type: text/html;charset=utf-8");
$user_id = $_GET["user_id"];
$con = mysql_connect("localhost:3306", "root", "system");
mysql_select_db("test", $con);
$sql = "delete from user_info where user_id = $user_id";
if (mysql_query($sql, $con)) {
    echo("删除删除用户$user_id 成功");
} else {
    exit("删除数据失败：" . mysql_error());
}