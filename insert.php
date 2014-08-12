<?php
header("Content-Type: text/html;charset=utf-8");
?>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>insert.php</title>
    <script>
        function display() {
            alert(document.forms[0].user_id.value);
        }
        function DataInsert() {
            var url = "data.php?";
            url = url + "&flag=insert";
            url = url + "&user_id=" + document.forms[0].user_id.value;
            url = url + "&user_name=" + document.forms[0].user_name.value;
            if (document.forms[0].sex[0].checked) {
                url = url + "&user_sex=" + "male";
            } else {
                url = url + "&user_sex=" + "female";
            }
            url = url + "&user_grade=" + document.forms[0].user_grade.value;
            url = url + "&user_degree=" + document.forms[0].user_degree.value;
            url = url + "&user_comment=" + document.forms[0].user_comment.value;
            url = url + "&user_avatar=" + document.forms[0].user_avatar.value;
            location.href = url;
        }
    </script>
</head>
<body>
<form action="insert.php" method="post">
    <table>
        <tr>
            <td>id</td>
            <td><input type="text" name="user_id"></td>
        </tr>
        <tr>
            <td>姓名</td>
            <td><input type="text" name="user_name"></td>
        </tr>
        <tr>
            <td>性别</td>
            <td><input type="radio" name="sex">男
                <input type="radio" name="sex">女
            </td>
        </tr>
        <tr>
            <td>年级</td>
            <td><input type="text" name="user_grade"></td>
        </tr>
        <tr>
            <td>学历</td>
            <td><input type="text" name="user_degree"></td>
        </tr>
        <tr>
            <td>备注</td>
            <td><input type="text" name="user_comment"></td>
        </tr>
        <tr>
            <td>头像</td>
            <td><input type="file" name="photo">
                <input type="hidden" name="user_avatar"></td>
        </tr>
        <tr>
            <td><input type="button" value="提交" onclick="DataInsert()"></td>
        </tr>
    </table>
    <!--    <input type="hidden" name="flag">-->
</form>
</body>
</html>