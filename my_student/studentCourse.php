<html>
<center>
    <table border="1">
        <tr>
            <th width="60">姓名</th>
            <th>课程名</th>
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
            $name=$_POST['name'];
            $sql = " select t_student.name hhu ,t_course.name from t_course,t_score,t_student where t_student.id=t_score.student_id and t_score.course_id=t_course.id and t_student.name like '%$name%'";
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) >=1){

                foreach ($conn->query($sql) as $row) {

                    echo "<tr>";
                    echo "<td>{$row['hhu']}</td>";
                    echo "<td>{$row['name']}</td>";
                    echo "</tr>";

                }
            }
            else{
                echo "<script>alert('这个学生没有录入成绩');window.location='web/studentCourse.html'</script>";

            }

        }
        ?>
    </table>
    <a href="web/studentCourse.html">返回</a>
</center>
</html>