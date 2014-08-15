<?php
include_once('mysql.php');
$con = connectDb();

//每页显示的留言数
$pageSize = 10;
//确定页数 p 参数
$p = isset($_GET['p']) ? $_GET['p'] : 1;
//数据指针
$offset = ($p - 1) * $pageSize;

$sql = "SELECT * FROM user_info order by user_id limit $offset, $pageSize";
$result = mysql_query($sql, $con) or die(mysql_error());
?>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>index.php</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="bootstrap/css/bootstrap-theme.min.css">
    <script src="jquery.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script>
        function DataUpdate() {
            document.forms["list"].flag.value = 1;
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
            window.open(url, winName, params);
        }
        //删除数据
        function DataDelete() {
            if (confirm("确认删除？")) {
                document.forms["list"].submit();
            }
        }
        //反选
        function selectInverse() {
            var n = document.forms["list"].check.length;//得到复选框的个数
            for (var i = 0; i < n; i++) {
                document.forms["list"].check[i].checked = !document.forms["list"].check[i].checked;
            }
        }
        //全选
        function selectAll() {
            var n = document.forms["list"].check.length;//得到复选框的个数
            for (var i = 0; i < n; i++) {
                document.forms["list"].check[i].checked = true;
            }
        }
        function search() {
            var url = "search.php";
            url += "?item=" + document.forms["searchItem"].searchBox.value;
            location.href = url;
        }
    </script>
    <style>
        .td {
            text-align: center;
        }
    </style>
</head>
<body>
<?php include_once "head.php"; ?>
<div style="width: 80%; margin-left: 10%; margin-top: 3%;">
    <div class="panel panel-default">
        <div class="panel-heading">
            <form name="searchItem">
                会员后台管理
            <span style="position: absolute; right: 12%">
                    <input type="text" name="searchBox" id="searchBox">
                    <label for="searchBox"><input type="button" class="btn btn-sm" value="搜索" onclick="search()"></label>
            </span>
            </form>
        </div>
        <div class="panel-body">
            <form action="delete.php" method="get" name="list">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th class="td"><label for="check">选定</label></th>
                        <th class="td">id</th>
                        <th class="td">姓名</th>
                        <th class="td">性别</th>
                        <th class="td">年级</th>
                        <th class="td">学历</th>
                        <th class="td">备注</th>
                        <!--            <td class="th">头像</th>-->
                        <th class="td">操作</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php //显示查询结果
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
                            <td><input type="checkbox" name="check[]" id="check" value=<?php echo $user_id; ?>></td>
                            <td><?php echo $user_id; ?></td>
                            <td><?php echo $user_name; ?></td>
                            <td><?php echo $user_sex; ?></td>
                            <td><?php echo $user_grade; ?></td>
                            <td><?php echo $user_degree; ?></td>
                            <td><?php echo $user_comment; ?></td>
                            <!--                            <td>--><?php //echo $user_avatar; ?><!--</td>-->
                            <td><a href="update.php?user_id=<?php echo $user_id; ?>">修改</a>
                                <a href="delete.php?user_id=<?php echo $user_id; ?>">删除</a>
                                <a href="update.php?user_id=<?php echo $user_id; ?>">详细</a></td>
                        </tr>
                    <?php
                    }
                    ?>
                    </tbody>
                </table>
                <input type="hidden" name="flag">
                <input type="button" class="btn btn-sm" value="全选" onclick="selectAll()">
                <input type="button" class="btn btn-sm" value="反选" onclick="selectInverse()">
                <?php
                //分页代码
                //计算留言总数
                $count_result = mysql_query("SELECT count(*) as count FROM user_info", $con);
                $count_array = mysql_fetch_array($count_result);

                //计算总的页数
                $pageNum = ceil($count_array['count'] / $pageSize);
                echo "<span style='position: absolute; right: 12%'>";
                //                echo '共 ', $count_array['count'], ' 条记录';

                //循环输出各页数目及连接
                if ($pageNum > 1) {
                    echo "<ul class='pagination'>";
                    echo "<li><a href='index.php?p=1'>&laquo;</a></li>";
                    for ($i = 1; $i <= $pageNum; $i++) {
                        if ($i == $p) {
                            echo '<li class="active"><a href="index.php?p=' . $i . '">' . $i . '</a></li>';
//                            echo ' [', $i, ']';
                        } else {
                            echo ' <li><a href="index.php?p=', $i, '">', $i, '</a></li>';
                        }
                    }
                    echo "<li><a href='index.php?p=" . $pageNum . "'>&raquo;</a></li>";
                    echo "</ul>";
                }
                echo "</span>";
                mysql_close($con);
                ?>
            </form>
        </div>
        <div class="panel-footer">
            <input type="button" class="btn btn-primary" value="添加" onclick="DataInsert()">
            <input type="button" class="btn btn-primary" value="删除" onclick="DataDelete()">
        </div>
    </div>
</div>
</body>
</html>