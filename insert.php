<?php
header("Content-Type: text/html;charset=utf-8");

$user_id = $_GET["user_id"];
$user_name = $_GET["user_name"];
$user_sex = $_GET["user_sex"];
$user_grade = $_GET["user_grade"];
$user_degree = $_GET["user_degree"];
$user_comment = $_GET["user_comment"];
$user_avatar = $_GET["user_avatar"];

?>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>insert.php</title>
    <script>
        function display() {
            alert(document.forms[0].user_id.value);
        }
    </script>
</head>
<body>
<form action="insert.php" method="post">
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
            <td><input type="text" name="user_sex" value="<?php echo $user_sex ?>"></td>
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
            <td><input type="text" name="user_avatar" value="<?php echo $user_avatar ?>"></td>
        </tr>
        <tr>
            <td><input type="button" value="确定" onclick="display()"></td>
            <td><input type="submit" value="提交"></td>
        </tr>
    </table>
</form>
</body>
</html>