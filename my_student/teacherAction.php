
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
        $number=$_POST['number'];
        $name = $_POST['name'];
        $username = $_POST['username'];
        $password = md5($_POST['password']);
        $create_time=$_POST['create_time'];
        //写sql语句
        $sql = "INSERT INTO t_teacher(number,name,username,password,create_time) VALUES ('{$number}' ,'{$name}','{$username}','{$password}','{$create_time}')";
        mysqli_query($conn,$sql);

        $rw = mysqli_affected_rows($conn);
        if ($rw > 0) {
            echo "<script> alert('增加成功');
                            window.location='teacher.php'; //跳转到首页
                 </script>";
        } else {
            echo "<script> alert('增加失败');
                            window.history.back(); //返回上一页
                 </script>";
        }
        break;
    }
    case "del": {    //1.获取表单信息
        $id = $_GET['id'];
        $sql = "DELETE FROM t_teacher WHERE id={$id}";
        mysqli_query($conn,$sql);echo "修改失败";
        /*header("Location:main.php");*///跳转到首页
        $rw=mysqli_affected_rows($conn);
        if($rw>0){
            echo "<script>alert('修改成功');window.location='teacher.php'</script>";
        }else{
            echo "修改失败".$rw.mysqli_error($conn);
        }
        break;
    }
    case "edit" :{   //1.获取表单信息
        $number=$_POST['number'];
        $id = $_POST['id'];
        $name = $_POST['name'];
        $username = $_POST['username'];
        $password = md5($_POST['password']);
        /*$create_time = $_POST['create_time'];*/
        $update_time=date("Y-m-d H-i-s");
        $sql = "UPDATE t_teacher SET number='{$number}',update_time='{$update_time}',name='{$name}',username='{$username}',password='{$password}' WHERE id='{$id}'";
        mysqli_query($conn,$sql);
        $rw=mysqli_affected_rows($conn);
        if($rw>0){
            echo "<script>alert('修改成功');window.location='teacher.php'</script>";
        }else{
            echo "修改失败".$rw;
        }


        break;
    }
    case"modify":{
        $password=$_POST['password'];
        $secondpassword=$_POST['secondpassword'];
        $sql="update  t_manger set  password='{$password}' where id=1";
        if($password==$secondpassword)
        {
            mysqli_query($conn,$sql);
            echo "<script>alert('修改成功');window.location='main.php'</script>";
        }
        else{
            echo"两次输入的密码不相同";
        }
    }
}


