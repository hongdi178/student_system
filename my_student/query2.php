<html>
<center>
<table border="1">
    <tr>
        <th>ID</th>
        <th>学号</th>
        <th width="60">姓名</th>
        <th width="60">性别 </th>
        <th>年龄 </th>
        <th>班级</th>
        <th width="100">创建时间</th>
        <th>更新时间</th>

    </tr>
    <?php
    /**
     * Created by PhpStorm.
     * User: Administrator
     * Date: 2018/1/31
     * Time: 9:45
     */
    echo"<meta charset=\"utf-8\">";
    $conn = mysqli_connect('localhost', 'root', 'root', 'db_student_system');
    if (!$conn){
        echo"<script>alert('数据库连接失败！')</script>";
    }else {
        $number=$_POST['student_number'];
        $sql = "select * from t_student where number like '%$number%' ";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) >=1){

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
                echo "</tr>";

            }
        }
        else{
            echo "<script>alert('没有这个学生');window.location='web/query.html'</script>";
            mysqli_error($conn);
        }

    }
    ?>
</table>
    <a href="web/query.html">返回</a>
</center>
</html>