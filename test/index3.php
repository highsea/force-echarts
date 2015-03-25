<?php

/**
*   @author Gao Hai <admin@highsea90.com>
*   抓取 categoryapi 数据（该数据量较小，使用 session 存储）
*   
#数据服务器 
#60.191.125.156 test.com
#60.191.125.156 www.test.com
*/ 

define("SEARVER_HOST","http://testapi.miningdata.com.cn/");
date_default_timezone_set("prc");  
$stringtime = date("Y-m-d H:i:s",time());
$Key = "aabbccdd";
$timespan = strtotime($stringtime);
$Sign = md5($timespan.$Key);

//include './include/api.php';
//phpexcel



?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<meta charset="UTF-8">
<title>顶层商户 枢纽节点展示页</title>
<link rel="stylesheet" href="css/bootstrap/css/bootstrap.min.css">
<!-- <link rel="stylesheet" href="css/bootstrap/css/bootstrap-theme.min.css"> -->
<link rel="stylesheet" href="css/mystyle.css">
</head>
<body>


<div class="container-fluid">
    <div class="row-fluid">
        <div class="span12">
            <h3 class="text-center">
                顶层商户 枢纽节点展示页
            </h3>
            <div class="tips"></div>

            <div class="row-fluid select-something">
                <div class="span6">
                    <div class="tabbable" id="tabs-114976">
                        <ul class="nav nav-tabs">
                            <li class="active">
                                <a data-toggle="tab" href="#panel-1">商户选择</a>
                            </li>
                            <li class="ajax_installments">
                                <a data-toggle="tab" href="#panel-2">可选期数</a>
                            </li>
                            <li>
                                <a data-toggle="tab" href="#panel-3">枢纽节点数目</a>
                            </li>
                            
                        </ul>
                        <div class="tab-content">

                            <div data-father="allinformationapi" class="tab-pane active" id="panel-1">
                                <section class="span6">
                                    <h5>按枢纽商户</h5>
                                    <ul class="choose-type">
                                        <li>
                                            <a data-type="amount">按交易规模</a>
                                        </li>
                                        <li>
                                            <a data-type="degree">按商户活跃度</a>
                                        </li>
                                    </ul>
                                </section>
                                <section class="span6">
                                    <h5>按顶层商户</h5>
                                    <ul class="choose-type">
                                        <li>
                                            <a data-type="betweennesss">按商户紧密度</a>
                                        </li>
                                        <li>
                                            <a data-type="closeness">按商户关键性</a>
                                        </li>
                                    </ul>
                                </section>

                            
                            </div>
                            <div data-father="installments" class="tab-pane" id="panel-2">
                                <ul class="installmentsapi choose-type">
                                    
                                </ul>
                            </div>
                            <div class="tab-pane" id="panel-3">
                                <div data-father="pagecount" class="pagination">
                                <ul class="choose-type">
                                    <li>
                                         <a data-type="10">10</a>
                                    </li>
                                    <li>
                                         <a data-type="20">20</a>
                                    </li>
                                    <li>
                                         <a data-type="30">30</a>
                                    </li>
                                    <li>
                                         <a data-type="40">40</a>
                                    </li>
                                    <li>
                                         <a data-type="50">50</a>
                                    </li>
                                    <li>
                                         <a data-type="60">60</a>
                                    </li>
                                    <li>
                                         <a data-type="70">70</a>
                                    </li>
                                    <li>
                                         <a data-type="80">80</a>
                                    </li>
                                    <li>
                                         <a data-type="90">90</a>
                                    </li>
                                    <li>
                                         <a data-type="100">100</a>
                                    </li>
                                </ul>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
                <div class="span6">
                    <div class="row-fluid">
                        <div class="span8">
                            <div class="tab-pane" id="panel-4">
                                <h5>您选择了</h5>
                                <ul>
                                    <li class="allinformationapi_type">商户选项：<a data-type="" data-toggle="tab" href="#panel-1">去选择</a></li>
                                    <li class="installments_type">期数选项：<a data-type="" data-toggle="tab" href="#panel-2">去选择</a></li>
                                    <li class="pagecount_type">节点选项：<a data-type="" data-toggle="tab" href="#panel-3">去选择</a></li>
                                </ul>
                                <button class="btn btn-success start-force" type="button">开始绘图</button>
                            </div>
                        </div>
                        <div class="span4">
                            <button class="btn btn-info" type="button">导出客户号 </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row-fluid">
                <div class="span12">
                    <div id="main">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- <div id='example' class='modal hide fade in' style='display:none;'>
            <div class='modal-header'>
                <a class='close' data-dismiss='modal'>X</a>
                <h3>我是拟态框的头部</h3>
            </div>
            <div class='modal-body'>
                <h4>我是拟态框的中间部分</h4>
                <p>我是描述部分</p>
            </div>
            <div class='modal-footer'>
                <a href='#' class='btn btn-success'>成功</a>
                <a href='#' class='btn' data-dismiss='modal'>关闭</a>
            </div>
        </div>
        <p>
            <a href='#example' data-toggle='modal' class='btn btn-primary btn-large'>点我弹出拟态框</a>
        </p> -->



<script src="http://libs.baidu.com/jquery/1.11.1/jquery.min.js"></script>
<script src="css/bootstrap/js/bootstrap.min.js"></script>
<script src="js/esl.js"></script>
<!-- <script src="js/store1.1.1.min.js"></script> -->
<script src="js/myFunction.js"></script>
<script type="text/javascript">
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


//console.log(store.get('categoryapiLegendArr'));
//console.log(categoriesArr);



//验证绘图数据
$('.start-force').on('click',function(){

    var pagecount_num = $('.pagecount_type > a').data('type'),
        allinformationapi_type = $('.allinformationapi_type > a').data('type'),
        installments_time = $('.installments_type > a').data('type');

    if (pagecount_num!=''&&allinformationapi_type!=''&installments_time!='') {

        //console.log(pagecount_num+allinformationapi_type+installments_time);
        //开始绘图
        var ajaxDataArr = {
            type            : allinformationapi_type,
            installments    : installments_time,
            pagecount       : pagecount_num
        }
        ajaxForce ('allinformationapi', ajaxDataArr, function(dataList){

            //console.log('links:'+dataList.data.links+'；nodes:'+dataList.data.nodes);
            var categoryapiLegendArr = {
                    data : categoryapiLegenddata,
                    selected:$.parseJSON('{'+shangquan.join(',')+'}'),
                    orient : 'vertical',
                    x : 'left'
                };

            //console.log(dataList.data.nodes.length);
            //console.log(dataList.data.links.length);

            //console.log(categoryapiLegendArr);

            var d = dataList.data.nodes;
            var nodesArr = [];

            for (var i = 0; i < d.length; i++) {
                var category = d[i].category,
                    name = d[i].name,
                    value = d[i].value;
                    strArr = {
                        "name"      : name,
                        "category"  : category,
                        "value"     : value,
                        "onclick"     : function(params){
                                        alert(params.target.style.text);
                                        var thisText = params.target.style.text;
                                        //thisText = "去看"+thisText+"的客户信息";
                                        alert(thisText);
                                        if (top.location == self.location){
                                            
                                            window.open('public/user.php?user='+params.target.style.text, thisText, 'height=800,width=960,top=0,left=0,toolbar=yes,menubar=yes,scrollbars=yes,resizable=yes,location=yes,status=yes');
                                        }
                                        
                                    }
                    };
                nodesArr.push(strArr);
            };
            //console.log($.parseJSON(nodesArr));
            //+',"onclick":function(params){alert(params.target.style.text);}'
            //console.log(nodesArr);


            forceOption(categoryapiLegendArr, categoriesArr, nodesArr, dataList.data.links)
        })
    }else{
        alertHtml('alert-warning', '注意：', '貌似您还没选择完呢！');
    }

});

var  installmentsapi = $('.installmentsapi');
// 获取 组合数值
$('.tabbable').on('click', '.choose-type > li', function(){
    //console.log($(this).find('a').text()+'，分类：'+$(this).find('a').data('type'));
    //console.log($('.'+$(this).closest('div').data('father')+'_type > a'));

    $('.'+$(this).closest('div').data('father')+'_type > a').data('type', $(this).find('a').data('type')).text($(this).find('a').text());

})
//可选期数
$('.ajax_installments,.installments_type').on('click', function() {

    if (installmentsapi.find('li').length==0) {

        ajaxForce ('installmentsapi', {}, function(dataList){
            var d = dataList.data;
            for (var i = 0; i < d.length; i++) {
                var datatime = d[i],
                    str = '<li><a data-type="'+datatime+'">'+datatime+'</a></li>';
                installmentsapi.append(str);
            }
        }) 
    };

});


//ajax
function ajaxForce (urlType, data, callback) {

    jQuery.ajax({
        type  : "get",
        async : false,
        url : '<?=SEARVER_HOST ?>'+urlType+'/?sign=<?=$Sign ?>&timespan=<?=$timespan ?>',
        dataType : "jsonp",
        jsonp : "callback",
        data : data,
        jsonpCallback : "dataList",
        success : function(dataList){
            if (dataList.code==1000) {
                
                callback(dataList);
            }else{
                alertHtml('alert-info', dataList.message, '错误代码：'+dataList.code);
            }
        },
        error: function(){
            alertHtml('alert-error', '网络错误', '请检查您的网络是否能正确访问：<?=SEARVER_HOST ?>');
        }
    });
}


//获取 categories
var categoriesArr = [],
    categoryapiLegenddata = [],
    shangquan = [];

ajaxForce ('categoryapi', {}, function(dataList){

    var d = dataList.data;

    //console.log(d);
    //console.log(d.length);

    for (var i = 0; i < d.length; i++) {

        var Arr = {
            "name"      : d[i].name,
            "keyword"   : {},
            "base"      : d[i].base,
            "itemStyle" : {
                "normal": {
                    "brushType"     : "both",
                    "color"         : randomColor(),
                    "strokeColor"   : randomColor(),
                    "lineWidth"     : 1
                }
            }
        },
            str = '"'+d[i].name+'":true'; 


        categoriesArr.push(Arr);
        categoryapiLegenddata.push(d[i].name);
        shangquan.push(str);
    }
    //console.log(categoriesArr);
    //console.log($.parseJSON('{'+shangquan.join(',')+'}'));
})




</script>
<script type="text/javascript">var cnzz_protocol = (("https:" == document.location.protocol) ? " https://" : " http://");document.write(unescape("%3Cspan id='cnzz_stat_icon_1254155462'%3E%3C/span%3E%3Cscript src='" + cnzz_protocol + "s95.cnzz.com/z_stat.php%3Fid%3D1254155462' type='text/javascript'%3E%3C/script%3E"));$('#cnzz_stat_icon_1254155462').hide();</script>
</body>
</html>