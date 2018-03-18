<html>

<center>
    <table border="1">
        <tr>
            <th>课程名</th>
            <th>姓名</th>
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
            $id=$_GET['id'];
            $sql = "select t_course.name,t_student.name studentName from t_course,t_score,t_student where t_course.id=t_score.course_id and t_score.student_id=t_student.id and t_course.id=$id ";
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) >=1){

                foreach ($conn->query($sql) as $row) {


                    echo "<tr>";
                    echo "<td>{$row['name']}</td>";
                    echo "<td>{$row['studentName']}</td>";

                    echo "</tr>";

                }
            }
            else{
                /*echo "<script>alert('没有这个学生');window.location='web/query.html'</script>";*/
                mysqli_error($conn);
            }

        }
        ?>
        <a href="#"onclick="javascript : history.back(-1);">返回</a>

    </table>
</center>

