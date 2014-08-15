<?php
//调用该函数前需要先连接数据库
//检查该用户是否有照片，如果存在，则删除
function photoDelete($user_id)
{
    $sql = "select user_avatar from user_info where user_id = '" . $user_id . "'";
    $result = mysql_query($sql);
    $row = mysql_fetch_array($result, MYSQL_ASSOC);
    $user_avatar = $row["user_avatar"];
    $result = mysql_query($sql) or die(mysql_error());
    if ($ROW = mysql_fetch_array($result)) {
        $user_avatar = $ROW['user_avatar'];
    }
    if (file_exists($user_avatar)) {
        unlink($user_avatar);
    }
    $sql1 = "UPDATE user_info SET user_avatar='' WHERE user_id = '$user_id'";
    mysql_query($sql1);
}