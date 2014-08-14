<?php
include_once('mysql.php');
$con = connectDb();
?>
<?php

$user_id = $_POST['user_id'];
$user_name = $_POST['user_name'];
$user_sex = $_POST['user_sex'];
$user_grade = $_POST['user_grade'];
$user_degree = $_POST['user_degree'];
$user_comment = $_POST['user_comment'];
$user_avatar = isset($_POST['user_avatar']) ? $_POST['user_avatar'] : null;
//上传照片，存入数据库
if (isset($_FILES["photo"]) && $_FILES["photo"]["name"] != "") {
    $uploadDir = "photos/"; //照片保存目录

    $filename = explode(".", $_FILES['photo']['name']);
    do {
        $filename[0] = $user_id;
        $name1 = implode(".", $filename);
        $user_avatar = $uploadDir . $name1;
    } while (file_exists($user_avatar));
    echo '<hr>';
    move_uploaded_file($_FILES['photo']['tmp_name'], $user_avatar);
}
//$sql = "update user_info set user_name='" . urlencode($user_name) . "', user_sex='" . $user_sex . "', user_grade='" . urlencode($user_grade) . "', user_degree='" . urlencode($user_degree) . "', user_comment='" . urlencode($user_comment) . "'";
$sql = "update user_info set user_name='" . $user_name . "', user_sex='" . $user_sex . "', user_grade='" . $user_grade . "', user_degree='" . $user_degree . "', user_comment='" . $user_comment . "'";
if (isset($user_avatar)) {
    $sql .= ", user_avatar = '" . $user_avatar . "'";
}

$sql .= " where user_id = '" . $user_id . "'";

mysql_query($sql, $con) or die(mysql_error());
echo('
    <script>
        alert("修改成功！");
        window.location.href = document.referrer;
    </script>');
?>