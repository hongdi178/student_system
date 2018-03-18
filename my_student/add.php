<html>
<head>
    <title>学生信息管理</title>

</head>
<body>
<script src="layDate-v5.0.9/laydate/laydate.js"></script> <!-- 改成你的路径 -->
<script>
    //执行一个laydate实例
    laydate.render({
        elem: '#age' //指定元素
        ,value:'1997-09-09'
    });
    laydate.render({
        elem: '#create_time' //指定元素
        ,format:'yyyy-MM-dd HH:mm:ss'
        ,type:'datetime'
    });
</script>
<center>
    <?php include_once "menu.php";
    header("Content-type: text/html; charset=utf-8");?>
    <h3>增加学生信息</h3>

    <form id="addstu" name="addstu" method="post" action="action.php?action=add">
        <table>
            <tr>
                <td>学号</td>
                <td><input id="number" name="number" type="text"></td>
            </tr>
            <tr>
                <td>姓名</td>
                <td><input id="name" name="name" type="text"/></td>

            </tr>
            <tr>
                <td>性别</td>
                <td><input type="radio" name="sex" value="男"/>&nbsp;男
                <input type="radio" name="sex" value="女"/>&nbsp;女
                </td>
            </tr>
            <tr>
                <td>年龄</td>
                <td><input type="text" name="age" id="age"/></td>
            </tr>
            <tr>
                <td>班级</td>
                <td><input id="classid" name="classid" type="text"/></td>
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