<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <title>学生信息管理</title>
    <script>
        function doDel(id) {
            if (confirm("确定要删除么？")) {
                window.location = 'action.php?action=del&id='+id;
            }
        }
    </script>
</head>
<body>
<center>
    <?php
    include_once "menu.php";
    ?>
    <h3>浏览学生信息</h3>
    <form action="uploadFile.php" method="post" enctype="multipart/form-data">
        <label for="file">文件名：</label>
        <input type="file" name="file" id="file"><br>
        <input type="submit" name="submit" value="提交">
    </form>
    <table width="600" border="1" id="test">
        <tr>
            <th>ID</th>
            <th>学号</th>
            <th width="60">姓名</th>
            <th width="60">性别 </th>
            <th>年龄 </th>
            <th>班级</th>
            <th width="100">创建时间</th>
            <th>更新时间</th>
            <th>操作</th>
        </tr>
        <?php
        //1.连接数据库
        header("Content-type: text/html; charset=utf-8");
        $servername="localhost";
        $username="root";
        $password="root";
        $dbname="db_student_system";
        $conn= new mysqli($servername,$username,$password,$dbname);
        if($conn->connect_error)
        {
            die("连接失败:".$conn->connect_error);
        }
        echo"连接成功";
        //2.解决中文乱码问题
        $conn->query("SET NAMES 'UTF8'");
        //3.执行sql语句，并实现解析和遍历
        $sql = "SELECT * FROM t_student ";
        foreach ($conn->query($sql) as $row) {
            echo "<tr>";
            echo "<td>{$row['id']}</td>";
            echo "<td>{$row['number']}</td>";
            echo "<td>{$row['name']}</td>";
            echo "<td>{$row['sex']}</td>";
            echo "<td>{$row['age']}</td>";
            echo "<td>{$row['class_id']}</td>";
            echo "<td>{$row['create_time']}</td>";
            echo "<td>{$row['update_time']}</td>";
            echo "<td>
                    <a href='javascript:doDel({$row['id']})'>删除</a>
                    <a href='edit.php?id=({$row['id']})'>修改</a>
                  </td>";
            echo "</tr>";
        }

        ?>

    </table>
</center>

</body>
</html>
