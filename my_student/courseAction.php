<?php
//1.连接数据库
header("Content-type: text/html; charset=utf-8");
date_default_timezone_set("PRC");//时间函数
ini_set('date.timezone','Asia/Shanghai');
$conn = mysqli_connect('localhost', 'root', 'root', 'db_student_system');
if (!$conn){
    echo"<script>alert('数据库连接失败！')</script>";
}
//2.防止中文乱码
mysqli_query($conn,"SET NAMES 'UTF8'");
//3.通过action的值进行对应操作
switch ($_GET['action']) {
    case 'add':{   //增加操作
        $course_number=$_POST['course_number'];
        $course_name = $_POST['course_name'];
        $credit=$_POST['credit'];
        $create_time=$_POST['create_time'];
        $begin_time=$_POST['begin_time'];
        //写sql语句
        $sql = "INSERT INTO t_course(number,name,credit,create_time,begin_time) VALUES ('{$course_number}' ,'{$course_name}','{$credit}','{$create_time}','{$begin_time}')";
        mysqli_query($conn,$sql);

        $rw = mysqli_affected_rows($conn);
        if ($rw > 0) {
            echo "<script> alert('增加课程成功');
                            window.location='course.php'; //跳转到首页
                 </script>";
        } else {
            echo "<script> alert('增加失败');
                            /*window.history.back();*/ //返回上一页
                 </script>";
            echo"$rw".mysqli_error();
        }
        break;
    }
    case "del": {    //1.获取表单信息
        $id = $_GET['id'];
        $sql = "DELETE FROM t_course WHERE id={$id}";
        mysqli_query($conn,$sql);
        header("Location:course.php");//跳转到首页
        break;
    }
    case "edit" :{   //1.获取表单信息
        $course_number=$_POST['course_number'];
        $id = $_POST['id'];
        $course_name = $_POST['course_name'];
        $update_time=date("Y-m-d H-i-s");
        $begin_time=$_POST['begin_time'];
        $sql = "UPDATE t_course SET number='{$course_number}',update_time='{$update_time}',name='{$course_name}',begin_time='{$begin_time}' WHERE id='{$id}' ";
        mysqli_query($conn,$sql);
        $rw=mysqli_affected_rows($conn);
        if($rw>0){
            echo "<script>alert('修改成功');window.location='course.php'</script>";
        }else{
            echo "修改失败".mysqli_error($conn);
        }


        break;
    }

}

