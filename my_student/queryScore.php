<html>
<center>
<table border="1">
    <tr>
        <th>学号</th>
        <th width="60">姓名</th>
        <th>课程名</th>
        <th>成绩</th>
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
        $sql = " select t_student.number ,t_student.name hhu ,t_score.score,t_course.name from t_course,t_score,t_student where t_student.id=t_score.student_id and t_score.course_id=t_course.id and t_student.number like '%$number%'";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) >=1){

            foreach ($conn->query($sql) as $row) {


                echo "<tr>";
                echo "<td>{$row['number']}</td>";
                echo "<td>{$row['hhu']}</td>";
                echo "<td>{$row['name']}</td>";
                echo "<td> {$row['score']}</td>";
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
    <a href="course.php">返回</a>
</center>
</html>