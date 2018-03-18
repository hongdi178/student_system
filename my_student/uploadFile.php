

<?php


header("Content-type:text/html;charset=utf-8");
date_default_timezone_set("PRC");//时间函数
ini_set('date.timezone','Asia/Shanghai');//设置时区
//判断是否选择了要上传的表格
    if (empty($_POST['file']["tmp_name"])) {
        /*history.go() 方法可加载历史列表中的某个具体的页面。
        该参数可以是数字，使用的是要访问的 URL 在 History 的 URL 列表中的相对位置。（-1上一个页面，1前进一个页面)。*/
        echo "<script>alert('没有选择表格');history.go(-1);</script>";
    }


//获取表格的大小，限制上传表格的大小5M
    $file_size = $_FILES['file']['size'];
    if ($file_size>5*1024*1024) {
        echo "<script>alert('上传失败，上传的表格不能超过5M的大小');history.go(-1);</script>";
        exit();
    }

//限制上传表格类型
    $file_type = $_FILES['file']['type'];
//application/vnd.ms

/*-excel  为xls文件类型*/
/*    if ($file_type!='application/vnd.ms

-excel') {
        echo "<script>alert('上传失败，只能上传excel2003的xls格式!');history.go(-1)</script>";
        exit();
    }*/

//判断表格是否上传成功
//is_uploaded_file() 函数判断指定的文件是否是通过 HTTP POST 上传的。如果 file 所给出的文件是通过 HTTP POST 上传的则返回 TRUE。
    if (is_uploaded_file($_FILES['file']['tmp_name'])) {
        require_once 'PHPExcel/PHPExcel.php';
        require_once 'PHPExcel/PHPExcel/IOFactory.php';
        require_once 'PHPExcel/PHPExcel/Reader/Excel5.php';
        require_once 'PHPExcel/PHPExcel/Reader/excel2007.php';
        require_once 'PHPExcel/PHPExcel/Shared/Date.php';
        //以上三步加载phpExcel的类
//      2003以前的excel读取实例化excel5类，2003以后需要实例化excel2007类
        $objReader = PHPExcel_IOFactory::createReader('excel2007');//use excel2007 for 2007 format
        //接收存在缓存中的excel表格
        PHPExcel_Style_NumberFormat::FORMAT_DATE_YYYYMMDD2;
        $filename = $_FILES['file']['tmp_name'];
        $objPHPExcel = $objReader->load($filename); //$filename可以是上传的表格，或者是指定的表格。把EXCEL转化为对象
        $sheet = $objPHPExcel->getSheet(0);//取得excel工作sheet;取文件中的第一个表
        $highestRow = $sheet->getHighestRow(); // 取得总行数
        // $highestColumn = $sheet->getHighestColumn(); // 取得总列数

        //循环读取excel表格,读取一条,插入一条
        //j表示从哪一行开始读取  从第二行开始读取，因为第一行是标题不保存
        //$a表示列号
        for($j=2;$j<=$highestRow;$j++)
        {
            $a = $objPHPExcel->getActiveSheet()->getCell("A".$j)->getValue();//获取number列的值
            $b = $objPHPExcel->getActiveSheet()->getCell("B".$j)->getValue();//获取name列的值
            $c = $objPHPExcel->getActiveSheet()->getCell("C".$j)->getValue();//获取sex列的值
            $d = $objPHPExcel->getActiveSheet()->getCell("D".$j)->getValue();//获取age列的值
            $d = intval(($d - 25569) * 3600 * 24);
            $d = gmdate('Y-m-d H:i:s',$d);
            PHPExcel_Shared_Date::ExcelToPHP();
            //null 为主键id，自增可用null表示自动添加
            $sql = "INSERT INTO t_student(number,name,sex,age,create_time) VALUES('$a','$b','$c','$d',now())";
            $res = $mysqli->query($sql);
            if ($res) {
               echo "<script>alert('添加成功！');history.go(-1);</script>";

            }else{
                echo "<script>alert('添加失败！');window.location.href='main.php';</script>";
                exit();
            }
        }
    }

?>


