<?php 
include 'curl.php';
include 'file.php';

date_default_timezone_set("prc");  
$stringtime = date("Y-m-d H:i:s",time());
//echo "stringtime:".$stringtime;
$Key = "aabbccdd";
$timespan = strtotime($stringtime);
$Sign = md5($timespan.$Key);

$category = curlForce('categoryapi', 'refresh', $timespan, $Sign);




preg_match_all('/(?<=\[)([^\]]*?)(?=\])/' , $category , $_category);


$categoryArr = json_decode('['.($_category[0][0]).']');




foreach ($categoryArr as $key => $value) {
    //$categories = [];
    if (is_object($value)) {
        foreach ($value as $k => $v) {
            $__newV[] = array(
                $k=>$v
            );
        }

        //echo json_encode($__newV);
    }
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


/*    $categories_name[] = array(
        $v => true, 

    );*/

    $categories_base[] = '"'.$v.'"';

}

$categoriesArr = json_encode($categories);

//
//var_dump(('{'.implode(':true,', $categories_base).':true}'));

//var_dump(($categories_base));


/*var_dump($categories_name);
var_dump($categories_base);*/

//preg_match_all("/(?:\[\{)(.*)(?:\}\])/i", json_encode($categories_name), $cate_name);
//preg_match_all("/(?:\[\[)(.*)(?:\]\])/i", json_encode($categories_base), $cate_base);


/*$categoryLegend = array(
    'x'=>'left',
    'selected'=>'{'.implode(':true,', $categories_base).':true}',
    'data'=>$categories_base,
    //'data'=>explode('],[', $cate_base[1][0]),
    'orient'=>'vertical'
);
*/


//$categoryapiLegendArr = json_encode($categoryLegend);


$categoryapiLegendArr = '{"x":"left","selected":{'.implode(':true,', $categories_base).':true},"data":['.implode(',', $categories_base).'],"orient":"vertical"}';

//var_dump($categoryapiLegendArr);

/*categoryapiLegendArr = {
                x: 'left',
                //selected:categoryapiLegendSelected,
                data:categoryapiLegendData,
                orient : 'vertical'
            }*/



/*$names = array();  
$names = array_reduce($categoryArr, create_function('$v,$w', '$v[$w["id"]]=$w["name"];return $v;'));  

var_dump($names);*/

/*foreach ($categoryArr as $key => $value) {
    echo $value;
}*/

/*if(preg_match("/[(][.][)]/",$string,$matches)){   
   echo $matches;   
}   */



function curlForce ($urlType, $refresh, $timespan, $Sign){

    $fetch = new Curl();
    $apiurl = "http://test.com/".$urlType."/?&cache=".$refresh."&timespan=".$timespan."&sign=".$Sign."&callback=category";
    return $fetch->get($apiurl);
}

function randomColor(){
    mt_srand((double)microtime()*1000000);
    $c = '';
    while(strlen($c)<6){
        $c .= sprintf("%02X", mt_rand(0, 255));
    }
    return '#'.$c;
}

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
//echo randomColor();

?>