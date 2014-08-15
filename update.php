<?php
header('Cache-control: no-cache');

include_once('mysql.php');
$con = connectDb();

$user_id = $_GET["user_id"];
$sql = "SELECT * FROM user_info where user_id = '$user_id'";
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
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="mystyle.css" rel="stylesheet">
    <script src="jquery.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
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
        function delete_photo() {
            var url = "deletePhoto.php";
            url += "?user_id=" + document.forms[0].user_id.value;
            location.href = url;
        }
    </script>
</head>
<body>
<?php include_once('head.php');?>
<form action="dataUpdate.php" method="post" enctype="multipart/form-data">
    <div class="form-group" id="left">
        <table class="table">
            <caption>修改信息</caption>
            <tbody>
            <tr>
                <th>id</th>
                <td><input type="text" name="user_id" value="<?php echo $user_id ?>"></td>
            </tr>
            <tr>
                <th>姓名</th>
                <td><input type="text" name="user_name" value="<?php echo $user_name ?>"></td>
            </tr>
            <tr>
                <th>性别</th>
                <td><input type="radio" name="sex" <?php if ($user_sex == "male") echo("checked") ?>>男
                    <input type="radio" name="sex" <?php if ($user_sex == "female") echo("checked") ?>>女
                    <input type="hidden" name="user_sex"></td>
            </tr>
            <tr>
                <th>年级</th>
                <td><input type="text" name="user_grade" value="<?php echo $user_grade ?>"></td>
            </tr>
            <tr>
                <th>学历</th>
                <td><input type="text" name="user_degree" value="<?php echo $user_degree ?>"></td>
            </tr>
            </tbody>
        </table>
        <input type="hidden" name="flag">
    </div>
    <div class="form-group" id="right">
        <table class="table">
            <caption>头像</caption>
            <!--            <tr>-->
            <!--                <td>头像</td>-->
            <!--            </tr>-->
            <tr>
                <td style="text-align: center;">
                    <?php
                    if ($user_avatar == "") {
//                    echo "暂无照片" . $user_avatar;
                        ?>
                        <img src="photos/default.jpg" title="暂无照片"><br/>
                        <input type="file" name="photo">
                        <input type="hidden" name="MAX_FILE_SIZE" value="300000" />
                        <input type="hidden" name="user_avatar">
                    <?php
                    } else {
                        echo "<img src='$user_avatar' width='200' height='200' border=0 title='头像'><br/>";
                        echo "<input type='button' value='删除照片' onclick='delete_photo()'>";
                    }
                    ?>
                </td>
            </tr>
        </table>
    </div>
    <div class="form-group" id="bottom">
        <table class="table">
            <tr>
                <th colspan="3">备注</th>
                <td colspan="3"><textarea rows="5" cols="60" name="user_comment" style="resize: none;"><?php echo $user_comment ?></textarea>
                </td>
            </tr>
        </table>
        <input type="button" onclick="show_confirm()" value="修改">
    </div>
</form>
</body>
</html>