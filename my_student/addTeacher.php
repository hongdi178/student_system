

<html>
<head>
    <title>教师信息管理</title>

</head>
<body>
<script src="layDate-v5.0.9/laydate/laydate.js"></script> <!-- 改成你的路径 -->
<script>
    //执行一个laydate实例
    laydate.render({
        elem: '#create_time' //指定元素
        ,format:'yyyy-MM-dd HH:mm:ss'
        ,type:'datetime'
    });
</script>
<center>
    <?php include_once "menu.php";
    header("Content-type: text/html; charset=utf-8");?>
    <h3>增加教师信息</h3>
    <form id="addstu" name="addstu" method="post" action="teacherAction.php?action=add">
        <table>
            <tr>
                <td>编号</td>
                <td><input id="number" name="number" type="text"></td>
            </tr>
            <tr>
                <td>教师姓名</td>
                <td><input id="name" name="name" type="text"/></td>

            </tr>
            <tr>
                <td>用户名</td>
                <td><input type="text" name="username" id="age"/></td>
            </tr>
            <tr>
                <td>密码</td>
                <td><input id="classid" name="password" type="text"/></td>
            </tr>
            <tr>
                <td> 创建时间</td>
                <td> <input id="create_time"  name="create_time" type="text"></td>
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