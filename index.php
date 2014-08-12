<?php
header("Content-Type: text/html;charset=utf-8");
$charset = "utf8";

$con = mysql_connect("localhost:3306", "root", "system");

mysql_query("SET character_set_connection=$charset, character_set_results=$charset, character_set_client=binary", $con);

mysql_select_db("test", $con);

$sql = "SELECT * FROM user_info";
$result = mysql_query($sql, $con) or die(mysql_error());
?>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>index.php</title>
    <link rel="stylesheet" href="/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="bootstrap/css/bootstrap-theme.min.css">
    <script src="/jquery.min.js"></script>
    <script src="/bootstrap/js/bootstrap.min.js"></script>
    <script>
        function DataUpdate() {
            document.forms[0].flag.value = 1;
            alert(document.forms[0].id.value);
            location.href = 'update.php';
        }
        //打开“新增信息”窗口，居中显示
        function DataInsert() {
            var url = 'insert.php'; //要打开的窗口
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
        //反选
        function selectInverse() {
            var n = document.forms[0].check.length;//得到复选框的个数
            for (var i = 0; i < n; i++) {
                if (document.forms[0].check[i].checked) {
                    document.forms[0].check[i].checked = false;
                } else {
                    document.forms[0].check[i].checked = true;
                }
            }
        }
        //全选
        function selectAll() {
            var n = document.forms[0].check.length;//得到复选框的个数
            for (var i = 0; i < n; i++) {
                document.forms[0].check[i].checked = true;
            }
        }
    </script>
</head>
<body>
<form action="update.php" method="post">
    <table class="table table-bordered">
        <thead>
        <tr>
            <td align="center">选定</td>
            <td align="center">id</td>
            <td align="center">姓名</td>
            <td align="center">性别</td>
            <td align="center">年级</td>
            <td align="center">学历</td>
            <td align="center">备注</td>
            <!--            <td align="center">头像</td>-->
            <td align="center">操作</td>
        </tr>
        </thead>
        <?php
        while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
            $user_id = $row['user_id'];
            $user_name = $row['user_name'];
            $user_sex = $row['user_sex'];
            $user_grade = $row['user_grade'];
            $user_degree = $row['user_degree'];
            $user_comment = $row['user_comment'];
            $user_avatar = $row['user_avatar'];
            ?>
            <tr>
                <td><input type="checkbox" name="check"></td>
                <td><?php echo $user_id; ?></td>
                <td><?php echo $user_name; ?></td>
                <td><?php echo $user_sex; ?></td>
                <td><?php echo $user_grade; ?></td>
                <td><?php echo $user_degree; ?></td>
                <td><?php echo $user_comment; ?></td>
                <!--                <td>--><?php //echo $user_avatar; ?><!--</td>-->
                <td><a href="update.php?user_id=<?php echo $user_id; ?>">修改</a>
                    <a href="delete.php?user_id=<?php echo $user_id; ?>">删除</a></td>
            </tr>
        <?php
        }
        mysql_close($con);
        ?>
    </table>
    <input type="hidden" name="flag">
    <input type="button" value="全选" onclick="selectAll()">
    <input type="button" value="反选" onclick="selectInverse()">
    <input type="button" value="添加" onclick="DataInsert()">
    <input type="button" value="删除" onclick="DataDelete()">
</form>
</body>
</html>