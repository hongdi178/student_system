<html>
<head>
    <meta charset="UTF-8">
    <title>学生信息管理</title>
</head>
<body>
<script src="layDate-v5.0.9/laydate/laydate.js"></script> <!-- 改成你的路径 -->
<script>
    //执行一个laydate实例
    laydate.render({
        elem: '#age' //指定元素
    });
</script>
<center>
      <?php
      $conn=mysqli_connect("localhost","root","root","db_student_system");
      if(!$conn)
      {
          echo"<script>alert('数据库连接失败！')</script>";
      }
      else{
          $sql="select * from t_student where id={$_GET['id']}";
          $result2=mysqli_query($conn,"$sql");
          $result=mysqli_affected_rows($conn);
          $stu=mysqli_fetch_array($result2);
          /*echo "{$_GET['id']}";*/

      }
      ?>
    <form id="addstu" name="editstu" method="post" action="action.php?action=edit">
        <table>
            <tr>
                <td>id</td>
                <td><input id="id" name="id" type="text" readonly value="<?php echo  $stu['id'] ?>"></td>
            </tr>
            <tr>
                <td>学号</td>
                <td><input id="number" name="number" type="text" value="<?php echo $stu['number']?>" /></td>
            </tr>
            <tr>
                <td>姓名</td>
                <td><input id="name" name="name" type="text" value="<?php echo $stu['name']?>"/></td>

            </tr>
            <tr>
                <td>性别</td>
                <td><input type="radio" name="sex" value="男"/>&nbsp;男
                    <input type="radio" name="sex" value="女"/>&nbsp;女
                </td>
            </tr>
            <tr>
                <td>年龄</td>
                <td><input type="text" name="age" id="age" value="<?php echo $stu['age']?>"/></td>

            </tr>
            <tr>
                <td>班级</td>
                <td><input id="classid" name="classid" type="text" value="<?php echo $stu['class_id']?>"/></td>
            </tr>
            <!--<tr>
                <td>修改时间</td>
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
