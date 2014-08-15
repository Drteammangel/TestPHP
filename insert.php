<?php
header("Content-Type: text/html;charset=utf-8");
?>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>insert.php</title>
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <script src="jquery.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <style>
        #left {
            position: absolute;
            left: 100px;
            /*right: 500px;*/
            top: 50px;
            bottom: 400px;
            width: 300px;
        }

        #right {
            position: absolute;
            left: 400px;
            /*right: 40%;*/
            top: 50px;
            bottom: 400px;
            width: 300px;
        }

        #bottom {
            position: absolute;
            left: 100px;
            /*right: 30%;*/
            top: 300px;
            bottom: 10%;
            width: 600px;
        }
    </style>
</head>
<body>
<?php include_once("head.php");?>
<form action="data.php" method="post" enctype="multipart/form-data">
    <div class="form-group" id="left">
        <table class="table">
            <caption>新增信息</caption>
            <tbody>
            <tr>
                <th>id</th>
                <td><input type="text" name="user_id"></td>
            </tr>
            <tr>
                <th>姓名</th>
                <td><input type="text" name="user_name"></td>
            </tr>
            <tr>
                <th>性别</th>
                <td><input type="radio" name="user_sex" value="male">男
                    <input type="radio" name="user_sex" value="female">女
                </td>
            </tr>
            <tr>
                <th>年级</th>
                <td><input type="text" name="user_grade"></td>
            </tr>
            <tr>
            <th>学历</th>
            <td><input type="text" name="user_degree"></td>
            </tbody>
        </table>
    </div>
    <div class="form-group" id="right">
        <table class="table">
            <caption>头像</caption>
            <tr>
                <td><input type="file" size="40" name="photo"></td>
            </tr>
        </table>
    </div>
    <div class="form-group" id="bottom">
        <table class="table">
            <tr>
                <th>备注</th>
                <td><textarea class="form-control" name="user_comment" rows="3" style="resize: none;"></textarea></td>
                <!--            <td><textarea class="form-control" name="user_comment" rows="3"></textarea></td>-->
                </td>
            </tr>
        </table>
        <input type="submit" value="提交">
    </div>
</form>
</body>
</html>