<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/1/29
 * Time: 17:15
 */

header("Content-type: text/html; charset=utf-8");

$conn = mysqli_connect('localhost', 'root', 'root', 'db_student_system');
if (!$conn){
    echo"<script>alert('数据库连接失败！')</script>";
}else {
        $username=$_POST['username'];
        $password=md5($_POST['password']);
        $query = "select * from t_manger where username = '{$_POST['username']}' and password = '{$password}'";
        $result = mysqli_query($conn, $query);
        $query2 = "select * from t_teacher where username='{$_POST['username']}' and password='{$password}' ";
        $result2 =mysqli_query($conn,$query2);
        $query3="select id from t_teacher where username='$username'";
        if (mysqli_num_rows($result) == 1){
            echo"index";
            header("Location:main.php");
        }
        else if(mysqli_num_rows($result2)==1){
            echo "<script>alert('登陆成功');window.location.href='teacherFile.php?username=$username'</script>";
               /*header("Location:teacher_file.php");*/

        }
        else{
            echo "<script>alert('账号或者密码错误');window.location='web/index.html'</script>";
        }
}
?>
