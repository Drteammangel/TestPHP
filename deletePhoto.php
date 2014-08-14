<?php
include_once('mysql.php');
$con = connectDb();
?>
<?php
$user_id = $_GET["user_id"];
echo "user_id=" . $user_id . "<br/>";
echo "<hr/>";
?>
<html>
<body>
<?php

$user_avatar = null;
$sql = "SELECT user_avatar FROM user_info WHERE user_id = '$user_id'";
$result = mysql_query($sql, $con) or die(mysql_error());
if ($ROW = mysql_fetch_array($result)) {
    $user_avatar = $ROW['user_avatar'];
}
echo "<hr/>";
echo $user_avatar;
echo "<hr/>";
if (file_exists($user_avatar)) {
    unlink($user_avatar);
}
$sql1 = "UPDATE user_info SET user_avatar='' WHERE user_id = '$user_id'";
mysql_query($sql1, $con);

echo('
    <script>
        alert("照片删除成功！");
        window.location.href = document.referrer;
    </script>');
?>
</body>
</html>