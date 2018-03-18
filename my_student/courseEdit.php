<html>
<head>
    <meta charset="UTF-8">
    <title>课程信息管理</title>
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
        $sql="select * from t_course where id={$_GET['id']}";
        $result2=mysqli_query($conn,"$sql");
        $result=mysqli_affected_rows($conn);
        $stu=mysqli_fetch_array($result2);


    }
    ?>
    <script src="layDate-v5.0.9/laydate/laydate.js"></script> <!-- 改成你的路径 -->
    <script>
        //执行一个laydate实例
        laydate.render({
            elem: '#begin_time' //指定元素
            ,format:'yyyy-MM-dd HH:mm:ss'
            ,type:'datetime'
        });
    </script>
    <form id="addstu" name="editstu" method="post" action="courseAction.php?action=edit">
        <table>
            <tr>
                <td>ID</td>
                <td><input id="id" name="id" type="text"  readonly value="<?php echo $stu['id'] ?>"               /></td>
            </tr>
            <tr>
                <td>课程号</td>
                <td><input id="course_number" name="course_number" type="text"   value="<?php echo $stu['number'] ?>"             /></td>
            </tr>
            <tr>
                <td>课程名</td>
                <td><input id="course_name" name="course_name" type="text"  value="<?php echo $stu['name'] ?>"  /></td>
            </tr>
            <tr>
                <td>学分</td>
                <td><input id="credit" name="credit" type="text" value="<?php echo $stu['credit'] ?>"   ></td>
            </tr>
            <!--<tr>
                <td>更新时间</td>
                <td><input type="text" name="update_time" id="update_time" value="<?php /*echo $stu['update_time'] */?>"  /></td>
            </tr>-->
            <tr>
                <td>上课时间</td>
                <td><input type="text" name="begin_time" id="begin_time" value="<?php echo $stu['begin_time'] ?>" > </td>
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
