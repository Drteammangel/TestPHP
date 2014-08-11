<?php
header("Content-Type: text/html;charset=utf-8");
$charset = "utf8";

$con = mysql_connect("localhost:3306", "root", "system");

mysql_query("SET character_set_connection=$charset, character_set_results=$charset, character_set_client=binary", $con);

mysql_select_db("test", $con);

$sql = "SELECT user_id,
user_id,
user_name,
user_sex,
user_grade,
user_degree,
user_comment,
user_avatar
FROM user_info WHERE user_id = 2";
$result = mysql_query($sql, $con) or die(mysql_error());
mysql_close($con);

//$user_id = $array["user_id"];
//$user_name = $array["user_name"];
//$user_sex = $array["user_sex"];
//$user_grade = $array["user_grade"];
//$user_degree = $array["user_degree"];
//$user_comment = $array["user_comment"];
//$user_avatar = $array["user_avatar"];

//mysql_free_result($result);
?>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>index.php</title>
    <script>
        function DataUpdate() {
            document.forms[0].flag.value = 1;
            alert(document.forms[0].id.value);
            location.href = 'update.php?user_id=<?php echo $user_id ?>' +
                '&user_name=<?php echo $user_name ?>' +
                '&user_sex=<?php echo $user_sex ?>' +
                '&user_grade=<?php echo $user_grade ?>' +
                '&user_degree=<?php echo $user_degree ?>' +
                '&user_comment=<?php echo $user_comment ?>' +
                '&user_avatar=<?php echo $user_avatar ?>';
        }
        //打开“新增信息”窗口，居中显示
        function DataInsert() {
            var url = 'insert.php?user_id=<?php echo $user_id ?>' +
                '&user_name=<?php echo $user_name ?>' +
                '&user_sex=<?php echo $user_sex ?>' +
                '&user_grade=<?php echo $user_grade ?>' +
                '&user_degree=<?php echo $user_degree ?>' +
                '&user_comment=<?php echo $user_comment ?>' +
                '&user_avatar=<?php echo $user_avatar ?>'; //要打开的窗口
            var winName = '新增信息'; //给打开的窗口命名
            var aWidth = 809; //窗口宽度,需要设置
            var aHeight = 500; //窗口高度,需要设置
            var aTop = (screen.availHeight - aHeight) / 2; //窗口顶部位置,一般不需要改
            var aLeft = (screen.availWidth - aWidth) / 2; //窗口放中央,一般不需要改
            var param0 = "scrollbars=0,status=0,menubar=0,resizable=2,location=0"; //新窗口的参数
            var params = "top=" + aTop + ",left=" + aLeft + ",width=" + aWidth + ",height=" + aHeight + "," + param0;
            var myWindow = window.open(url, winName, params);
        }
        //删除数据
        function DataDelete() {
            var flag = confirm("确认删除？");
            if (flag == true) {
                alert("已删除");
            } else {
                alert("已取消");
            }
        }
    </script>
</head>
<body>
<form action="update.php" method="post">
    <table>
        <tr>
            <td>id</td>
            <td>姓名</td>
            <td>性别</td>
            <td>年级</td>
            <td>学历</td>
            <td>备注</td>
            <td>头像</td>
        </tr>
        <?php
        while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
            echo('<td><input type="text" name="user_id" value="'.$row["user_id"].'"></td>');
            echo('<td><input type="text" name="user_id" value="'.$row["user_name"].'"></td>');
            echo('<td><input type="text" name="user_id" value="'.$row["user_sex"].'"></td>');
            echo('<td><input type="text" name="user_id" value="'.$row["user_grade"].'"></td>');
            echo('<td><input type="text" name="user_id" value="'.$row["user_degree"].'"></td>');
            echo('<td><input type="text" name="user_id" value="'.$row["user_comment"].'"></td>');
            echo('<td><input type="text" name="user_id" value="'.$row["user_avatar"].'"></td>');
        }
        ?>
        <!--<tr>
            <td>id</td>
            <td><input type="text" name="user_id" value="<?php /*echo $user_id */?>"></td>
        </tr>
        <tr>
            <td>姓名</td>
            <td><input type="text" name="user_name" value="<?php /*echo $user_name */?>"></td>
        </tr>
        <tr>
            <td>性别</td>
            <td><input type="text" name="user_sex" value="<?php /*echo $user_sex */?>"></td>
        </tr>
        <tr>
            <td>年级</td>
            <td><input type="text" name="user_grade" value="<?php /*echo $user_grade */?>"></td>
        </tr>
        <tr>
            <td>学历</td>
            <td><input type="text" name="user_degree" value="<?php /*echo $user_degree */?>"></td>
        </tr>
        <tr>
            <td>备注</td>
            <td><input type="text" name="user_comment" value="<?php /*echo $user_comment */?>"></td>
        </tr>
        <tr>
            <td>头像</td>
            <td><input type="text" name="user_avatar" value="<?php /*echo $user_avatar */?>"></td>
        </tr>-->
    </table>
    <input type="hidden" name="flag">
    <input type="button" value="修改" onclick="DataUpdate()">
    <input type="button" value="添加" onclick="DataInsert()">
    <input type="button" value="删除" onclick="DataDelete()">
</form>
</body>
</html>