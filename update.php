<?php
header("Content-Type: text/html;charset=utf-8");
$user_id = $_GET["user_id"];
$charset = "utf8";

$con = mysql_connect("localhost:3306", "root", "system");

mysql_query("SET character_set_connection=$charset, character_set_results=$charset, character_set_client=binary", $con);

mysql_select_db("test", $con);
$sql = "SELECT * FROM user_info where user_id = $user_id";
$result = mysql_query($sql, $con) or die(mysql_error());
$row = mysql_fetch_array($result, MYSQL_ASSOC);
$user_name = $row["user_name"];
$user_sex = $row["user_sex"];
$user_grade = $row["user_grade"];
$user_degree = $row["user_degree"];
$user_comment = $row["user_comment"];
$user_avatar = $row["user_avatar"];
?>

<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>update.php</title>
    <script>
        //提示是否确认修改
        function show_confirm() {
            var s = confirm("确认修改？");
            if (s == true) {
                if (document.forms[0].sex[0].checked) {
                    document.forms[0].user_sex.value = "male";
                } else {
                    document.forms[0].user_sex.value = "female";
                }
                document.forms[0].flag.value = "update";
                document.forms[0].submit();
            } else {
            }
        }
    </script>
</head>
<body>
<form action="data.php" method="get" enctype="multipart/form-data">
    <table>
        <tr>
            <td>id</td>
            <td><input type="text" name="user_id" value="<?php echo $user_id ?>"></td>
        </tr>
        <tr>
            <td>姓名</td>
            <td><input type="text" name="user_name" value="<?php echo $user_name ?>"></td>
        </tr>
        <tr>
            <td>性别</td>
            <td><input type="radio" name="sex" <?php if ($user_sex == "male") echo("checked") ?>>男
                <input type="radio" name="sex" <?php if ($user_sex == "female") echo("checked") ?>>女
                <input type="hidden" name="user_sex"></td>
        </tr>
        <tr>
            <td>年级</td>
            <td><input type="text" name="user_grade" value="<?php echo $user_grade ?>"></td>
        </tr>
        <tr>
            <td>学历</td>
            <td><input type="text" name="user_degree" value="<?php echo $user_degree ?>"></td>
        </tr>
        <tr>
            <td>备注</td>
            <td><input type="text" name="user_comment" value="<?php echo $user_comment ?>"></td>
        </tr>
        <tr>
            <td>头像</td>
            <td>
                <?php
                if ($user_avatar == "") {
                    echo "暂无照片".$user_avatar;
                    ?>
                    <input type="file" name="photo">
                    <input type="hidden" name="user_avatar">
                <?php
                } else
                    echo "<img src='$user_avatar' width='150' border=0>";
                ?>
                <!--                <input type="file" name="user_avatar" value="-->
                <?php //echo $user_avatar ?><!--"></td>-->
        </tr>
        <tr>
            <td><input type="button" onclick="show_confirm()" value="提交"></td>
        </tr>
        <tr>
            <td><input type="hidden" name="flag"></td>
        </tr>
    </table>
</form>
</body>
</html>