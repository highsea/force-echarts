<?php

/*date_default_timezone_set("prc");  
$stringtime = date("Y-m-d H:i:s",time());
//echo "stringtime:".$stringtime;
$Key = "aabbccdd";
$Sign = md5(strtotime($stringtime).$Key);*/

include 'include/api.php';

//echo strtotime($stringtime);
//echo strtotime($stringtime).$Key;
//echo strtotime("2015/01/22");
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<meta charset="UTF-8">
<title>ECharts之force力导向布局图</title>
<link rel="stylesheet" href="css/bootstrap/css/bootstrap.min.css">
<!-- <link rel="stylesheet" href="css/bootstrap/css/bootstrap-theme.min.css"> -->
<link rel="stylesheet" href="css/datetimepicker/bootstrap-datetimepicker.min.css">
<link rel="stylesheet" href="css/mystyle.css">
</head>
<body>

<div class="container" id="content">



    <div class="row">
        <div class="bs-callout bs-callout-info span12">
            <div class="span4">
                <h4>复杂网络节点展示（力导向图）</h4>
                <p>for 民生银行</p>
                <p>by miningdata</p>
            </div>
            <div class="span6">
                <p>PHP请开启 curl 模块，<span class="label label-info">并在服务端</span> 对 hosts 做如下修改：</p>
                <p>60.191.125.156 test.com</p>
                <p>60.191.125.156 www.test.com</p>
                <p>版本号 v1.0.0 ：当前支持 时间+分类查询 </p>
                <p>下载 <a href="testapi.com.rar">轻点这里 </a> <a href="http://wpa.qq.com/msgrd?v=3&amp;uin=644494365&amp;site=qq&amp;menu=yes" title="提需求" target="_blank"> 点这里提需求</a></p>
                
            </div>

        </div>
        <div class="row">
            <div class="span1"><span>选择时间</span></div>
            <div id="datetimepicker" class="input-append date span3">
                
                <input id="select_time" type="text" class="span2" value="2015/01"></input>
                <span class="add-on">
                <i data-time-icon="icon-time" data-date-icon="icon-calendar"></i>
                </span>
            </div>
            <div class="span1"><span>选择分类</span></div>
            <div class="span4">
                <select id="search_type" class="span2">
                    <option value="linknum">交易频率</option>
                    <option value="nodeamount">交易金额数</option>
                    <option value="betweennesss">betweennesss值</option>
                    <option value="k-core">k-core值</option>
                </select>
            </div>
            <div class="span2">
                <button id="ajaxSearch" type="button" class="btn btn-primary"> 查 询 </button>
            </div>
        </div>
    </div>
    <div class="row">
        <div id="main" style="height:800px" class="span12"></div>
<!--         <div class="span12">
    <span>查看商户列表</span>
    <ul>
        <li>商户基本信息</li>
        <li>商户基本信息</li>
        <li>商户基本信息</li>

    </ul>
</div> -->
        <div class="row footer">
            <p> <i class="icon-fire"></i> V1.0.1将要优化：localstorage、ajax并发、系统自定义参数设置</p>
        </div>
    </div>
</div>

<script src="http://libs.baidu.com/jquery/1.11.1/jquery.min.js"></script>
<script src="css/bootstrap/js/bootstrap.min.js"></script>
<script src="css/datetimepicker/bootstrap-datetimepicker.min.js"></script>
<script src="js/esl.js"></script>
<script src="js/store1.1.1.min.js"></script>
<script src="js/myFunction.js"></script>
<script type="text/javascript">
//立即获取分类
//ajaxForce ('categoryapi', 0, 0, 'refresh', 0);


//ajaxForce('nodesapi', search_type, userSelectTime, 'refresh', '');

//配置例子
require.config({
    packages: [
        {
            name: 'echarts',
            location: 'echarts/src',      
            main: 'echarts'
        },
        {
            name: 'zrender',
            location: 'zrender/src', // zrender与echarts在同一级目录
            main: 'zrender'
        }
    ]
});



/*initStore();
function initStore() {
    //store.disabled = 'ture';
    if (!store.enabled) {
        alert('警告：你的浏览器不支持本地缓存！由于节点数据量巨大，请更换浏览器！')
        return window.location.href = "http://rj.baidu.com/soft/detail/14744.html?ald"
    }
    store.set('username', 'highsea');
    var user = store.get('username');
    //console.log(user);
}
*/
//时间控件
$('#datetimepicker').datetimepicker({
    format: 'yyyy/MM',//'MM/dd/yyyy hh:mm'
    language: 'en',
    pickDate: true,
    //pickTime: true,
    //hourStep: 1,
    //minuteStep: 15,
    //secondStep: 30,
    inputMask: true,
    autoclose: true
});





//点击查询
$('#ajaxSearch').on('click',function(){
    var search_type = $('#search_type').val(),
        select_time = $('#select_time').val();
    //ajaxSearchTime = time_unix (new Date());
    userSelectTime = time_unix (select_time);
    //console.log("222:"+search_type+":"+select_time+":"+userSelectTime);
    //nodesapi linksapi isolated

//ajaxForce('nodesapi', search_type, userSelectTime, 'refresh', '');
//ajaxForce('nodesapi', search_type, userSelectTime, 'refresh');

setTimeout(function(){ ajaxForce('nodesapi', search_type, userSelectTime, 'refresh')}, 300 );

setTimeout(function(){ ajaxForce('linksapi', search_type, userSelectTime, 'refresh')}, 700 );



/*
$.when( ajaxForce('nodesapi', search_type, userSelectTime, 'refresh', '') ).
done(function(){

   　　　　 ajaxForce ('linksapi', search_type, userSelectTime, 'refresh', '')

　　　　}).
fail(function(){
　　
   　　　　 alert("fail");
    
　　　　});*/

    //var urlTypeArr = ['nodesapi', 'linksapi', 'isolatedapi'];

/*    for (var i = urlTypeArr.length-1; i >= 0; i--) {
        //判断 是否已经执行过，已经执行则跳出本次循环
        if (store.get(urlTypeArr[i])==urlTypeArr[i]+'-ajax-OK') {
            continue; 
        //判断 上一次的结果，上次成功则继续
        }else if(i==2){
            ajaxForce (urlTypeArr[i], search_type, userSelectTime, 'refresh');
            //alert('ok');
            //store.get(urlTypeArr[i])==urlTypeArr[i]+'-ajax-OK'
        }else if(i!=2){
            alert('1');
        }else{
           //失败则 跳出循环
           break; 
        }
    };*/

/*
                categoriesArr = store.get('categoryapiArr');
                //console.log(categoriesArr[0]);

                var categoryapiLegendData = [],
                    categoryapiLegendSelected = [],
                    newCategory = {},
                    newCategoryapiLegendSelected={};
                for(var i in categoriesArr){
                    categoryapiLegendData[i] = ' '+categoriesArr[i].name+' '; 
                    categoryapiLegendSelected[i] = categoriesArr[i].name;

                    newCategoryapiLegendSelected[i] = {

                    }

                    newCategory[i] = {
                        'name':categoriesArr[i].name,
                        'base':categoriesArr[i].base,
                        'itemStyle':{
                            'normal':{
                                'brushType':'both',
                                'color':randomColor(),
                                'strokeColor':randomColor(),
                                'lineWidth':'1'
                            }
                        }
                    }  
                }*/ 
//console.log('新的：'+newCategory[0].itemStyle.normal.color);

//console.log('categoryapiLegendData:'+categoryapiLegendData+';;'+categoryapiLegendSelected);

            /*categoryapiLegendArr = {
                x: 'left',
                //selected:categoryapiLegendSelected,
                data:categoryapiLegendData,
                orient : 'vertical'
            }*/
//console.log('legend:'+categoryapiLegendArr.selected+':'+categoryapiLegendArr.data);

seriesNodes = store.get('nodesapiArr');
seriesLinks = store.get('linksapiArr');



forceOption (<?=$categoryapiLegendArr ?>, <?=$categoriesArr ?>, seriesNodes, seriesLinks);


});




//ajax
function ajaxForce (urlType, search_type, userSelectTime, refresh) {

    jQuery.ajax({
        type  : "get",
        async : false,
        url : 'http://test.com/'+urlType+'/',
        dataType : "jsonp",
        jsonp : "callback",
        //processData: false, //防止jQuery来为你添加一个Content-Type头
        data : {
            type:search_type,
            cache:refresh,
            timespan:"<?=strtotime($stringtime) ?>",
            time:userSelectTime,
            sign:"<?=$Sign ?>"
        },
        jsonpCallback : "dataList",
        success : function(dataList){
            //console.log(dataList);

            //return dataList.data;
            if (dataList.data!=null) {

                store.set(urlType, urlType+'-ajax-OK');
                store.set(urlType+'Arr', dataList.data);
                //console.log(store.get(urlType));
                //console.log(store.get(urlType+'Arr'));

/*                if (typeof(cbfunction)=='function') {
                    setTimeout("cbfunction()",2000);
                    //cbfunction();
                }else{
                    //console.log(cbfunction);
                };*/

            };




        },
        error: function(){
            //console.log(urlType+'网络错误！')
        }
    });
}


<?php 

/*function curlForce ($urlType, search_type, $refresh){

    $fetch = new Curl();
    $apiurl = "http://test.com/".$urlType."/?type=".$search_type."&cache=".$refresh."&timespan=".strtotime($stringtime)."&time=".$userSelectTime."&sign=".$Sign;
    $body = $fetch->get($apiurl);
}*/

?>




</script>
</body>
</html>