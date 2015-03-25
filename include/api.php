<?php
/**
*   @author Gao Hai <admin@highsea90.com>
*   抓取 categoryapi 数据（该数据量较小，使用 session 存储）
*   
#数据服务器 
#60.191.125.156 test.com
#60.191.125.156 www.test.com
*/ 
include 'curl.php';

define("SEARVER_HOST","http://testapi.miningdata.com.cn/");
date_default_timezone_set("prc");  
$stringtime = date("Y-m-d H:i:s",time());
$Key = "aabbccdd";
$timespan = strtotime($stringtime);
$Sign = md5($timespan.$Key);










//引入PHPExcel库文件（路径根据自己情况）
include './../phpexcel/PHPExcel.php';
//创建对象
$excel = new PHPExcel();
$objDrawing = new PHPExcel_Worksheet_Drawing();
/*设置文本对齐方式*/
$excel->getDefaultStyle()->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
$excel->getDefaultStyle()->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
$objActSheet = $excel->getActiveSheet();
$letter = array('A','B','C','D','E','F','G','H','I','J','K','L','M','N');
/*设置表头数据*/
$tableheader = array('序号','客户号','分类','value');
/*填充表格表头*/
for($i = 0;$i < count($tableheader);$i++) {
	$excel->getActiveSheet()->setCellValue("$letter[$i]1","$tableheader[$i]");
}

/*设置表格数据*/
$data = array(
	array('0', '15158106748', '9', '2'),
	array('1', '12345678901', '8', '4'),
	array('2', '98765432103', '4', '6'),
	array('3', '75395165485', '6', '9'),
	array('4', '96374185202', '2', '10')
);


/*填充表格内容*/
for ($i = 0;$i < count($data);$i++) {
	$j = $i + 2;
	/*设置表格宽度*/
	$objActSheet->getColumnDimension("$letter[$i]")->setWidth(30);
	/*设置表格高度*/
	$excel->getActiveSheet()->getRowDimension($j)->setRowHeight(25);
	/*向每行单元格插入数据*/
	for ($row = 0;$row < count($data[$i]);$row++) {

		$excel->getActiveSheet()->setCellValue("$letter[$row]$j", '$data[$i]');
	}
	foreach ($variable as $item) {
		# code...
	}
}


/*实例化excel输入类并完成输出excel文件*/
$write = new PHPExcel_Writer_Excel5($excel);
header("Pragma: public");
header("Expires: 0");
header("Cache-Control:must-revalidate, post-check=0, pre-check=0");
header("Content-Type:application/force-download");
header("Content-Type:application/vnd.ms-execl");
header("Content-Type:application/octet-stream");
header("Content-Type:application/download");;
header('Content-Disposition:attachment;filename="测试文件.xls"');
header("Content-Transfer-Encoding:binary");
$write->save('php://output');
















$category = curlForce('allinformationapi', $timespan, $Sign);

if (!is_string($category)) {
    $alert = '警告：请确认能访问 '.SEARVER_HOST.'！或者已经开启 CURL！';   
}else{
    //捕获接口 data 中数据 string
    preg_match_all('/(?<=\[)([^\]]*?)(?=\])/' , $category , $_category);


    //array
    $categoryArr = json_decode('['.($_category[0][0]).']');


    var_dump('<pre>');
    var_dump($categoryArr);


    foreach ($categoryArr as $key => $value) {

        if (is_object($value)) {
            foreach ($value as $k => $v) {
                $__newV[] = array(
                    $k=>$v
                );
            }
        }
       

    }

}

/**
* 包含 curlForce 爬虫
* 
*/
function curlForce ($urlType, $timespan, $Sign){

    $fetch = new Curl();
    $apiurl = SEARVER_HOST.$urlType."/?&timespan=".$timespan."&sign=".$Sign."&callback=category";
    return $fetch->get($apiurl);
}


?>