<!DOCTYPE html>
<html>
<head>
<title>修改密码</title>
</head>
<body>
<CENTER>

<?php include_once "menu.php";
header("Content-type: text/html; charset=utf-8");?>

<h3>修改账号密码</h3>
    <form id="modifystu" name="modifystu" method="post" action="action.php?action=modify">
        <table>
            <tr>
                <td>请输入密码</td>
                <td><input id="password" name="password" type="text"/></td>
            </tr>
            <tr>
                <td>请再次输入密码</td>
                <td><input id="secondpassword" name="secondpassword" type="text"/></td>
            </tr>
            <tr>
                <td><input type="submit" value="确定修改"/></td>
                <td><input type="reset" value="重置"/></td>
            </tr>
        </table>


    </form>



</body>
<CENTER>
</html>
<!DOCTYPE html>