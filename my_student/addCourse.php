<html>
<head>
    <title>课程信息管理</title>

</head>
<body>
<script src="layDate-v5.0.9/laydate/laydate.js"></script> <!-- 改成你的路径 -->
<script>
    //执行一个laydate实例
    laydate.render({
        elem: '#create_time' //指定元素
    });
    laydate.render({
        elem: '#begin_time' //指定元素
        ,format:'yyyy-MM-dd HH:mm:ss'
        ,type:'datetime'
    });
</script>
<center>
    <?php include_once "menu.php";
    header("Content-type: text/html; charset=utf-8");?>
    <h3>增加课程信息</h3>

    <form id="addstu" name="addstu" method="post" action="courseAction.php?action=add">
        <table>
            <tr>
                <td>课程号</td>
                <td><input id="number" name="course_number" type="text"></td>
            </tr>
            <tr>
                <td>课程名</td>
                <td><input id="name" name="course_name" type="text"/></td>

            </tr>
            <tr>
                <td>学分</td>
                <td><input id="credit" name="credit" type="text"></td>
            </tr>
            <tr>
                <td> 创建时间</td>
                <td> <input id="create_time"  name="create_time" type="text"></td>
            </tr>
            <tr>
                <td>上课时间</td>
                <td><input id="begin_time" name="begin_time" type="text"> </td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td><input type="submit" value="增加"/>&nbsp;&nbsp;
                    <input type="reset" value="重置"/>
                </td>
            </tr>
        </table>
    </form>
</center>
</body>
</html>

