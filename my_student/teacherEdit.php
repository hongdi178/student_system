
<html>
<head>
    <meta charset="UTF-8">
    <title>学生信息管理</title>
</head>
<body>
<center>
    <?php
    $conn=mysqli_connect("localhost","root","root","db_student_system");
    if(!$conn)
    {
        echo"<script>alert('数据库连接失败！')</script>";
    }
    else{
        $sql="select * from t_teacher where id={$_GET['id']}";
        $result2=mysqli_query($conn,"$sql");
        $result=mysqli_affected_rows($conn);
        $stu=mysqli_fetch_array($result2);


    }
    ?>
    <form id="addstu" name="editstu" method="post" action="teacherAction.php?action=edit">
        <table>
            <tr>
                <td>id</td>
                <td><input id="id" name="id" type="text" readonly value="<?php echo  $stu['id'] ?>"></td>
            </tr>
            <tr>
                <td>编号</td>
                <td><input id="number" name="number" type="text" value="<?php echo $stu['number']?>" /></td>
            </tr>
            <tr>
                <td>教师姓名</td>
                <td><input id="name" name="name" type="text" value="<?php echo $stu['name']?>"/></td>

            </tr>
            <tr>
                <td>账户名</td>
                <td><input id="username" name="username" type="text" value="<?php echo $stu['username']?>"></td>
            </tr>
            <tr>
                <td>密码</td>
                <td><input type="text" name="password" id="age" value="<?php echo $stu['password']?>"/></td>
            </tr>
           <!-- <tr>
                <td>更新时间</td>
                <td><input id="update_time" name="update_time" type="text"></td>
            </tr>-->
            <tr>
                <td>&nbsp;</td>
                <td><input type="submit" value="修改"/>&nbsp;&nbsp;
                    <input type="reset" value="重置"/>
                </td>
            </tr>

        </table>

    </form>
</center>
</body>
</html>
