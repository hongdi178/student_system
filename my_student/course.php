<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <title>课程信息管理</title>
    <script>
        function doDel(id) {
            if (confirm("确定要删除么？")) {
                window.location = 'courseAction.php?action=del&id='+id;
            }
        }
    </script>
</head>
<body>
<center>
    <?php
    include_once "menu.php";
    ?>
    <h3>浏览课程信息</h3>
    <table width="600" border="1">
        <tr>
            <th>ID</th>
            <th width="">课程号</th>
            <th width="80">课程名</th>
            <th width="40">学分</th>
            <th width="180">创建时间</th>
            <th width="180">更新时间</th>
            <th width="140">上课时间</th>
            <th width="80">操作</th>
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
        $sql = "SELECT * FROM t_course ";
        foreach ($conn->query($sql) as $row) {
            echo "<tr>";
            echo "<td>{$row['id']}</td>";
            echo "<td>{$row['number']}</td>";
            echo "<td>{$row['name']}</td>";
            echo "<td>{$row['credit']}</td>";
            echo "<td>{$row['create_time']}</td>";
            echo "<td>{$row['update_time']}</td>";
            echo "<td>{$row['begin_time']}</td>";
            echo "<td>
                    <a href='javascript:doDel({$row['id']})'>删除</a>
                    <a href='courseEdit.php?id=({$row['id']})'>修改</a>
                  </td>";
            echo "</tr>";
        }

        ?>

    </table>
</center>

</body>
</html>
