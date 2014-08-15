<?php
include_once('mysql.php');
include_once('photoDelete.php');
$con = connectDb();

$id = isset($_GET['check'])?$_GET['check']:null;
$flag = true;
if(isset($id)) {
    foreach($id as $user_id) {
        photoDelete($user_id);
        $sql = "delete from user_info where user_id = '$user_id'";
        $flag = mysql_query($sql, $con);
    }
} elseif(isset($_GET['user_id'])) {
    $user_id = $_GET['user_id'];
    photoDelete($user_id);
    $sql = "delete from user_info where user_id = '$user_id'";
    $flag = mysql_query($sql, $con);
}
?>
<?php
if ($flag) {
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