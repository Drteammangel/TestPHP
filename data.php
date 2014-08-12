<?php
header("Content-Type: text/html;charset=utf-8");
$charset = "utf8";

$con = mysql_connect("localhost:3306", "root", "system");

mysql_query("SET character_set_connection=$charset, character_set_results=$charset, character_set_client=binary", $con);

mysql_select_db("test", $con);
?>
<?php
//对数据进行增删改查
$flag = $_GET["flag"];
echo($flag);
//flag=insert 插入数据
if ($flag == "insert") {
    $user_id = $_GET['user_id'];
    $user_name = $_GET['user_name'];
    $user_sex = $_GET['user_sex'];
    $user_grade = $_GET['user_grade'];
    $user_degree = $_GET['user_degree'];
    $user_comment = $_GET['user_comment'];
    $user_avatar = $_GET['user_avatar'];
    $sql = "insert into user_info(user_id, user_name, user_sex, user_grade, user_degree, user_comment, user_avatar) values ('" . $user_id . "','" . $user_name . "','" . $user_sex . "','" . $user_grade . "','" . $user_degree . "','" . $user_comment . "','" . $user_avatar . "')";
    $result = mysql_query($sql, $con) or die(mysql_error());
} elseif ($flag == "delete") { //flag=delete 删除数据
//    $user_id = $_GET['user_id'];
//    $sql = "SELECT * FROM user_info";
//    $result = mysql_query($sql, $con) or die(mysql_error());
} elseif ($flag == "update") { //flag=update 修改数据
//上传照片，存入数据库
    $user_id = $_GET['user_id'];
    $user_name = $_GET['user_name'];
    $user_sex = $_GET['user_sex'];
    $user_grade = $_GET['user_grade'];
    $user_degree = $_GET['user_degree'];
    $user_comment = $_GET['user_comment'];
    $user_avatar = $_GET['user_avatar'];
    echo("user_avatar:" . $user_avatar);
    if ($_FILES["photo"]["name"] != "") {
        $uploadDir = "photos/"; //照片保存目录
        $type = array("jpg", "gif", "bmp", "jpeg", "png"); //允许上传文件的类型

        //获取文件后缀名函数
        function fileExt($filename)
        {
            return substr(strrchr($filename, '.'), 1);
        }

        $a = strtolower(fileExt($_FILES['photo']['name']));
        //判断文件类型
        if (!in_array($a, $type)) {
            $text = implode(",", $type);
            echo "您只能上传以下类型文件: ", $text, "<br>";
        } //生成目标文件的文件名
        else {
            $filename = explode(".", $_FILES['photo']['name']);
            do {
                $filename[0] = $user_id;
                $name1 = implode(".", $filename);
                $user_avatar = $uploadDir . $name1;
            } while (file_exists($user_avatar));
            move_uploaded_file($_FILES['photo']['tmp_name'], $user_avatar);
        }
    }
    $sql = "update user_info set user_name='" . $user_name . "',user_sex='" . $user_sex . "',user_grade='" . $user_grade . "',user_degree='" . $user_degree . "',user_comment='" . $user_comment . "',user_avatar='" . $user_avatar . "' where user_id='" . $user_id . "'";
    $result = mysql_query($sql, $con) or die(mysql_error());
}