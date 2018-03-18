<?php
//1.连接数据库
header("Content-type: text/html; charset=utf-8");
$conn = mysqli_connect('localhost', 'root', 'root', 'db_student_system');
if (!$conn){
    echo"<script>alert('数据库连接失败！')</script>";
}
//2.防止中文乱码
    else{   //增加操作
        mysqli_query($conn,"SET NAMES 'UTF8'");
        //2.防止中文乱码
        $number=$_POST['student_number'];
        $course_id = $_POST['course_number'];
        $create_time=$_POST['create_time'];
        $update_time=$_POST['update_time'];
        $score=$_POST['score'];
        //写sql语句
        $sql = "INSERT INTO t_score(student_id,course_id,create_time,update_time,score) VALUES ('{$number}' ,'{$course_id}','{$create_time}','{$update_time}','{$score}')";
        mysqli_query($conn,$sql);

        $rw = mysqli_affected_rows($conn);
        if ($rw > 0) {
            echo "<script> alert('增加成功');
                            window.location='main.php'; //跳转到首页
                 </script>";
        } else {
            echo "$rw".mysqli_error($conn);
            /*echo "<script> alert('增加失败');
                            window.history.back(); //返回上一页
                 </script>";*/
        }

    }






