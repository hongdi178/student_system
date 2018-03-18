


<script>
    function doQuery(id) {
        if (confirm("确定要查询么？")) {
            window.location = 'teacherQuery.php?action=query&id='+id;
        }
    }
</script>
<center>
<table width="600" border="1">
    <tr>
        <th>教师姓名</th>
        <th>教授课程</th>
        <th width="60">选项</th>

    </tr>
<?php
//1.连接数据库
header("Content-type: text/html; charset=utf-8");
$name=$_GET['username'];
$servername="localhost";
$username="root";
$password="root";
$dbname="db_student_system";
$conn= new mysqli($servername,$username,$password,$dbname);
if($conn->connect_error)
{
    die("连接失败:".$conn->connect_error);
}

//2.解决中文乱码问题
$conn->query("SET NAMES 'UTF8'");
//3.执行sql语句，并实现解析和遍历
$sql = "select t_teacher.name,t_course.name courseName ,t_course.id from t_course, t_teacher ,t_teacher_course where t_course.id = t_teacher_course.course_id and t_teacher.id=t_teacher_course.teacher_id and t_teacher.username='$name'";
foreach ($conn->query($sql) as $row) {
    echo "<tr>";
    echo "<td>{$row['name']}</td>";
    echo "<td>{$row['courseName']}</td>";
    echo "<td>
                    <a href='javascript:doQuery({$row['id']})'>查看学生</a>
                    <a href='web/scoreInput.html'>录入成绩</a>
                  </td>";
    echo "</tr>";

}

?>
    <a href="javascript:" onclick="self.location=document.referrer;">退出</a>
</center>
