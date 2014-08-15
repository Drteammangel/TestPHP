<?php
include_once('mysql.php');
include_once('photoDelete.php');
$con = connectDb();
?>
<?php
$user_id = $_GET["user_id"];
echo "user_id=" . $user_id . "<br/>";
echo "<hr/>";
?>
<html>
<body>
<?php

photoDelete($user_id);

echo('
    <script>
        alert("照片删除成功！");
        window.location.href = document.referrer;
    </script>');
?>
</body>
</html>