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

$category = curlForce('categoryapi', 'refresh', $timespan, $Sign);

if (!is_string($category)) {
    $alert = '警告：请确认能访问 '.SEARVER_HOST.'！或者已经开启 CURL！';   
}else{
    //捕获接口 data 中数据 string
    preg_match_all('/(?<=\[)([^\]]*?)(?=\])/' , $category , $_category);
    //array
    $categoryArr = json_decode('['.($_category[0][0]).']');

    foreach ($categoryArr as $key => $value) {

        if (is_object($value)) {
            foreach ($value as $k => $v) {
                $__newV[] = array(
                    $k=>$v
                );
            }
        }
        //待优化
        $categories[] = array(
            'name'=>$v,
            'base'=>$v,
            'itemStyle' => array(
                'normal' => array(
                    'brushType'=>'both',
                    'color'=>randrgb(),
                    'strokeColor'=>randrgb(),
                    'linewidth'=>1
                )
            )
        );

        $categories_base[] = '"'.$v.'"';

    }
    // 主要 值
    $_SESSION['categoriesArr'] = json_encode($categories);
    $_SESSION['categoryapiLegendArr'] = '{"x":"left","selected":{'.implode(':true,', $categories_base).':true},"data":['.implode(',', $categories_base).'],"orient":"vertical"}';
    //$categoriesArr = json_encode($categories);
    //$categoryapiLegendArr = '{"x":"left","selected":{'.implode(':true,', $categories_base).':true},"data":['.implode(',', $categories_base).'],"orient":"vertical"}';

}

/**
* 包含 curlForce 爬虫、randrgb 随机色
* 
*/

//curl
function curlForce ($urlType, $refresh, $timespan, $Sign){

    $fetch = new Curl();
    $apiurl = SEARVER_HOST.$urlType."/?&cache=".$refresh."&timespan=".$timespan."&sign=".$Sign."&callback=category";
    return $fetch->get($apiurl);
}
// 颜色随机 1
function randomColor(){
    mt_srand((double)microtime()*1000000);
    $c = '';
    while(strlen($c)<6){
        $c .= sprintf("%02X", mt_rand(0, 255));
    }
    return '#'.$c;
}
// 颜色随机 2
function randrgb(){  
  $str='0123456789ABCDEF';  
    $estr='#';  
    $len=strlen($str);  
    for($i=1;$i<=6;$i++)  
    {  
        $num=rand(0,$len-1);    
        $estr=$estr.$str[$num];   
    }  
    return $estr;  
} 

?>