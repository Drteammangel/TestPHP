<?php
include_once('mysql.php');
$con = connectDb();

$user_id = $_GET['user_id'];
$sql = "delete from user_info where user_id = '$user_id'";
?>
<?php
if (mysql_query($sql, $con)) {
    echo('
    <script>
        alert("删除成功！");
        window.location.href = document.referrer;
    </script>');
} else {
    echo('
    <script>
        alert("删除数据失败：" . mysql_error());
        window.location.href = document.referrer;
    </script>');
}
?>