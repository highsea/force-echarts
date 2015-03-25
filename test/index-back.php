<?php

/**
*   @author Gao Hai <admin@highsea90.com>
*   抓取 categoryapi 数据（该数据量较小，使用 session 存储）
*   
#数据服务器 
#60.191.125.156 test.com
#60.191.125.156 www.test.com
*/ 
session_start();
define("SEARVER_HOST","http://testapi.miningdata.com.cn/");
date_default_timezone_set("prc");  
$stringtime = date("Y-m-d H:i:s",time());
$Key = "aabbccdd";
$timespan = strtotime($stringtime);
$Sign = md5($timespan.$Key);
$categoriesArr=0;
$categoryapiLegendArr=0;
$alert = '';

$cache = isset($_GET['cache'])?$_GET['cache']:'yes';

if (!$_SESSION['categoriesArr']||!$_SESSION['categoryapiLegendArr']) {
    include 'include/api.php';
}elseif($cache=='refresh'){
    include 'include/api.php';
    $categoryapiLegendArr = $_SESSION['categoryapiLegendArr'];
    $categoriesArr = $_SESSION['categoriesArr'];

}else{
    $categoryapiLegendArr = $_SESSION['categoryapiLegendArr'];
    $categoriesArr = $_SESSION['categoriesArr'];

}

?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<meta charset="UTF-8">
<title>力导向布局图</title>
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
                <h4>力导向图</h4>
                <p>for 复杂网络节点</p>
                <p>by <i class="icon-inbox"></i> <a href="https://github.com/highsea/">highsea</a> </p>
                <button id="refreshBTN" type="button" class="btn btn-danger"> 刷新缓存 </button>
            </div>
            <div class="span6">
                <p>PHP.ini 请开启 curl 模块，<span class="label label-info">并在服务端</span> 对 hosts 做如下修改：</p>
                <p>60.191.125.156 test.com</p>
                <p>60.191.125.156 www.test.com</p>
                <p><i class="icon-fire"></i> 版本号 v1.0.0 ：当前功能支持 <code>时间</code> <code>分类</code> 查询 </p>
                <p> 
                    <a href="https://github.com/highsea/force-echarts/archive/master.zip" > <i class="icon-retweet"></i> download </a> 
                    <a href="http://wpa.qq.com/msgrd?v=3&amp;uin=644494365&amp;site=qq&amp;menu=yes" title="提需求" target="_blank"> <i class="icon-comment"></i> QQ </a>
                    <a href="https://github.com/highsea/force-echarts/issues"> <i class="icon-edit"></i> issues </a>
                    <a href="https://github.com/highsea/force-echarts/fork"> <i class="icon-eye-open"></i> fork</a>
                </p>
                
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
    <div class="row forcePic">
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


            <div class="bs-callout bs-callout-danger">
                <h4><i class="icon-fire"></i> V1.0.1将要优化</h4>
                <p> <code>localstorage</code>  、<code>ajax伪并发</code> 、系统 <code>自定义参数</code> 设置</p>
            </div>


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
//分类 部分由 php curl 获取

//echarts zrender 模块化配置
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
// 本地缓存 local store 兼容 ie6+
function initStore() {
    //store.disabled = 'ture';
    if (!store.enabled) {
        alert('警告：你的浏览器不支持本地缓存！由于节点数据量巨大，请更换浏览器！')
        return window.location.href = "http://rj.baidu.com/soft/detail/14744.html?ald"
    }
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



if (store.get('categoryapiLegendArr')==undefined||store.get('categoriesArr')==undefined||store.get('categoryapiLegendArr')==0||store.get('categoriesArr')==0) {
    store.set('categoryapiLegendArr', <?=$categoryapiLegendArr ?>);
    store.set('categoriesArr', <?=$categoriesArr ?>);  

}

var categoryapiLegendArr = store.get('categoryapiLegendArr'),
    categoriesArr = store.get('categoriesArr');


//console.log(store.get('categoryapiLegendArr'));
//console.log(categoriesArr);



//点击查询
$('#ajaxSearch').on('click',function(){

    var gaohai = store.get('gaohai'),
        seriesNodes = store.get('nodesapiArr'),
        seriesLinks = store.get('linksapiArr');

    var search_type = $('#search_type').val(),
        select_time = $('#select_time').val();
    userSelectTime = time_unix (select_time);

var hostError = '<?=$alert ?>';

if (!hostError=='') {

    alert(hostError);

}else if (seriesNodes==undefined||seriesLinks==undefined) {

    setTimeout(function(){ ajaxForce('nodesapi', search_type, userSelectTime, 'refresh')}, 0 );
    setTimeout(function(){ ajaxForce('linksapi', search_type, userSelectTime, 'refresh')}, 300 );

    //setTimeout(function(){ forceOption (categoryapiLegendArr, categoriesArr, seriesNodes, seriesLinks)}, 1500 );

    //console.log('seriesNodes==undefined||seriesLinks==undefined');
    //forceOption (categoryapiLegendArr, categoriesArr, seriesNodes, seriesLinks);

}else{

    //console.log(categoriesArr+':'+categoryapiLegendArr);
    forceOption (categoryapiLegendArr, categoriesArr, seriesNodes, seriesLinks);

};

    


});


//ajax
function ajaxForce (urlType, search_type, userSelectTime, refresh) {

    jQuery.ajax({
        type  : "get",
        async : false,
        url : '<?=SEARVER_HOST ?>'+urlType+'/',
        dataType : "jsonp",
        jsonp : "callback",
        data : {
            type:search_type,
            cache:refresh,
            timespan:"<?=$timespan ?>",
            time:userSelectTime,
            sign:"<?=$Sign ?>"
        },
        jsonpCallback : "dataList",
        success : function(dataList){
            //return dataList.data;
            if (dataList.data!=null) {

                store.set(urlType, urlType+'-ajax-OK');
                store.set(urlType+'Arr', dataList.data);
                //console.log(store.get(urlType));
                //console.log(store.get(urlType+'Arr'));

                if (typeof(cbfunction)=='function') {
                    setTimeout("cbfunction()",500);
                    //cbfunction();
                }else{
                    //console.log(cbfunction);
                };
            };
        },
        error: function(){
            alert(urlType+'网络错误！请刷新重试！')
        }
    });
}

$('#refreshBTN').on('click', function(){
    store.clear();
    //呵呵
    window.location.href="./?cache=refresh";
})

</script>
<script type="text/javascript">var cnzz_protocol = (("https:" == document.location.protocol) ? " https://" : " http://");document.write(unescape("%3Cspan id='cnzz_stat_icon_1254155462'%3E%3C/span%3E%3Cscript src='" + cnzz_protocol + "s95.cnzz.com/z_stat.php%3Fid%3D1254155462' type='text/javascript'%3E%3C/script%3E"));$('#cnzz_stat_icon_1254155462').hide();</script>
</body>
</html>