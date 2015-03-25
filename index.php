<?php

/**
*   @author Gao Hai <admin@highsea90.com>
*   抓取 categoryapi 数据（该数据量较小，使用 session 存储）
*   
#数据服务器 
#60.191.125.156 test.com
#60.191.125.156 www.test.com
*/ 
include './include/config.php';


?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<meta charset="UTF-8">
<title>展示页</title>
<link rel="stylesheet" href="css/bootstrap/css/bootstrap.min.css">
<!-- <link rel="stylesheet" href="css/bootstrap/css/bootstrap-theme.min.css"> -->
<link rel="stylesheet" type="text/css" href="css/jquery.dataTables.css">

<link rel="stylesheet" href="css/mystyle.css">
</head>
<body>


<div class="container-fluid">
	<div class="row-fluid">
		<div class="span12">
			<h1>
				XX项目 <div class="tips"></div>
			</h1>
			
			<div class="row-fluid">
				<div class="span3">
					<div class="accordion" id="accordion-fn">
						<div class="accordion-group">
							<div class="accordion-heading">
								 <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion-msyh" href="#accordion-element-fn1">功能选择</a>
							</div>
							<div id="accordion-element-fn1" class="accordion-body collapse in">
								<div class="accordion-inner">

									<div class="accordion" id="accordion-msyh">
										<div class="accordion-group" data-choice="business-marketing">
											<div class="accordion-heading ">
												 <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion-msyh" href="#accordion-element-1">商户营销</a>
											</div>
											<div id="accordion-element-1" class="accordion-body collapse in">
												<div class="accordion-inner">
													<ul>
														<li class="business-hub"><a>枢纽商户</a></li>
														<li class="business-top"><a>顶层商户</a></li>
													</ul>
												</div>
											</div>
										</div>
										<div class="accordion-group" data-choice="risk-manage">
											<div class="accordion-heading ">
												 <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion-msyh" href="#accordion-element-2">风险管理</a>
											</div>
											<div id="accordion-element-2" class="accordion-body collapse">
												<div class="accordion-inner">
													<ul>
														<li class="risk-management"><a>风险监测</a></li>
														
													</ul>
													
												</div>
											</div>
										</div>
										<div class="accordion-group">
											<div class="accordion-heading">
												 <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion-msyh" href="#accordion-element-3">其他</a>
											</div>
											<div id="accordion-element-3" class="accordion-body collapse">
												<div class="accordion-inner">
													其他内容
												</div>
											</div>
										</div>
									</div>

								</div>
							</div>
						</div>
						<div class="accordion-group">
							<div class="accordion-heading">
								 <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion-msyh" href="#accordion-element-fn2">可扩展功能2</a>
							</div>
							<div id="accordion-element-fn2" class="accordion-body collapse">
								<div class="accordion-inner">
									可扩展功能2 的内容
								</div>
							</div>
						</div>
					</div>
					
				</div>
				<div class="span9">
					<section data-html="tips">
						<h2>还未设置默认页面，您应该从左侧工具栏选择！</h2>
					</section>
					<section data-html="business-marketing" class="none">
						<h3>
							商户营销
						</h3>
						<div class="tabbable" id="tabs-223904">
							<ul class="nav nav-tabs">
								<li class="active">
									<a href="#panel-01" data-toggle="tab">图形展示</a>
								</li>
								<li>
									<a href="#panel-02" data-toggle="tab">列表展示</a>
								</li>
							</ul>
							<div class="tab-content">
								<div class="tab-pane active" id="panel-01">
<!-- 版本二绘图部分  -->
<br>

<div class="row-fluid">
	<div class="span3">
		查询方式:
		<select class="span6 search_type" data-marketing="">
	    </select>
	</div>
	<div class="span3">
		期次：
		<select class="span6 search_date">
	    </select>
	</div>
	<div class="span3">
		绘制节点数:
		<select class="span4 search_num">
	        <option value="10">10</option>
	        <option value="20">20</option>
	        <option value="30">30</option>
	        <option value="40">40</option>
	        <option value="50">50</option>
	        <option value="60">60</option>
	        <option value="70">70</option>
	        <option value="80">80</option>
	        <option value="90">90</option>
	        <option value="100">100</option>
	    </select>
	</div>
	<div class="span3">
		<a class="btn btn-success start-force">绘制图形</a>
		<a class="btn btn-prim">导出数据</a>
	</div>
</div>


<div class="row-fluid">
	<div class="span12">
	    <div id="main">
	    </div>
	</div>
</div>
<!--  客户信息查询 -->

<div class="row-fluid">
	<div class="span12 userinfo">
		
<!-- <iframe src=""></iframe> -->

	</div>
</div>


<!--  客户信息查询  end -->

<!-- end 版本二绘图部分  -->
								</div>
								<div class="tab-pane" id="panel-02">
<!-- datatable 部分 -->
<br>
<div class="row-fluid">
	<div class="span12">
		<div class="span3">
			选择期次：
			<select class="span6 search_date">
		    </select>
		</div>
		<div class="span3">
			<a class="btn btn-success start-table">查询</a>
		</div>
		<div class="span3"></div>
		<div class="span3">
			<a class="btn">导出数据</a>
		</div>

	</div>
	
	<div class="span12 table_wrap_hs">
	    
		

		<br>
		<br>
	</div>
</div>






<!-- datatable end -->
								</div>
							</div>
						</div>



					</section>
					<section data-html="risk-manage" class="none">
						<h3>
							风险监测
						</h3>
					</section>
					<section data-html="other-fn" class="none">
						<h3>
							其他内容
						</h3>
					</section>

				</div>
			</div>
		</div>
	</div>
</div>




<script src="http://libs.baidu.com/jquery/1.11.1/jquery.min.js"></script>
<script src="css/bootstrap/js/bootstrap.min.js"></script>
<!-- DataTables -->
<script type="text/javascript" charset="utf8" src="js/jquery.dataTables.js"></script>
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




$('#accordion-fn').on('click', '.business-hub,.business-top, .risk-management', function(e) {
	e.preventDefault();
	var this_text = $(this).text(),
		search_type = $('.search_type'),
		search_date = $('.search_date');

	search_type.html('');
	$('#main').html('');
	

	$('.search_num').val('50');

	//console.log(this_text);

	//console.log($(this).closest('.accordion-group').data('choice'));

	//加载期数
	//if (search_date.find('option').length==0) {

		ajaxForce ('installmentsapi', $('.search_date'), {}, function(dataList){
			search_date.html('');
			var d = dataList.data;
			for (var i = 0; i < d.length; i++) {
				var datatime = d[i],
				    str = '<option><a data-type="'+datatime+'">'+datatime+'</a></option>';
				search_date.append(str);
			}
		}) 
	//};

	//设置 统一文字／显示
	section_show = $('[data-html='+$(this).closest('.accordion-group').data('choice')+']');
	section_show.removeClass('none').siblings('section').removeClass('block').addClass('none');
	section_show.children('h3').html($(this).text());

	//设置 特定 界面
	if (this_text=='枢纽商户') {
		search_type.append('<option value="betweennesss">按商户紧密度</option><option value="closeness">按商户关键性</option>');
		search_type.data('marketing', 'hub');


	} else if (this_text=='顶层商户') {
		search_type.append('<option value="degree">按交易频率</option><option value="amount">节点交易金额数</option>');
		search_type.data('marketing', 'top');

	} else if (this_text=='风险监测') {
		alert('接口未找到，或 还未开发')
	} else{
		alert('未知错误！')

	}

});





//获取 表格

$('.start-table').on('click', function() {
	
	var installments_time = $(this).closest('div').siblings('div').children('.search_date').val(),
	    ajaxDataArr = {
	    	marketing 		: $('.search_type').data('marketing'),
	    	installments 	: installments_time
		
		};

	//console.log(installments_time);
	//console.log(ajaxDataArr.marketing);

	$('.table_wrap_hs').html('<?=LOADING ?>');

	ajaxForce ('listinformationapi', $('.table_wrap_hs'), ajaxDataArr, function(dataList){

	$('.table_wrap_hs').html('<div class="span12 shujushijian"></div><table id="table_id" class="span12 display"></table>');


		var l = dataList.data.data,
			dataArr = [],
			starttime = dataList.data.datatime.starttime,
			endtime = dataList.data.datatime.endtime;
		$('.shujushijian').html('<p>数据时间：<b>'+starttime+'</b> 至 <b>'+endtime+'</b></p>');

		if (ajaxDataArr.marketing=='hub') {
			
			for (var i = 0; i < l.length; i++) {

				var jinmudu  		= l[i].betweennesss,
					guanjianxing 	= l[i].closeness,
					qici 			= l[i].addtime,
					shangquanming 	= l[i].categoryName,
					xingming 		= l[i].CUST_NAME,
					kehuhao 		= l[i].name;

				var dataString = {
					"clent_id" 	: kehuhao,
					"business" 	: shangquanming,
					"name" 		: xingming,
					"top_hub1"	: jinmudu,
					"top_hub2"	: guanjianxing,
					"date" 		: qici
				};

				dataArr.push(dataString);

			};

		} else{//top
			
			for (var i = 0; i < l.length; i++) {
				var pinglv 	= l[i].degree,
				    jineshu = l[i].amount,
				    qici 	= l[i].addtime,
				    shangquanming = l[i].categoryName,
				    xingming = l[i].CUST_NAME,
					kehuhao  = l[i].name;

				var dataString = {
					"clent_id" 	: kehuhao,
					"business" 	: shangquanming,
					"name" 		: xingming,
					"top_hub1"	: jinmudu,
					"top_hub2"	: guanjianxing,
					"date" 		: qici
				};

				dataArr.push(dataString);
			};

		};

		data_tb_Arr = [
		    {data : 'clent_id'},
		    {data : 'name'},
		    {data : 'business'},
		    {data : 'top_hub1'},
		    {data : 'top_hub2'},
		    {data : 'date'}
		]

		install_TB('table_id', dataArr, data_tb_Arr, '<thead><tr><th>客户号</th><th>名称</th><th>商圈</th><th>商户紧密度</th><th>商户关键性</th><th>期次</th></tr></thead><tbody></tbody>');


	});
})





//获取 categories
var categoriesArr = [],
	categoryapiLegenddata = [],
	shangquan = [];


//验证绘图数据 开始绘图
$('.start-force').on('click',function(){

    var pagecount_num = $('.search_num').val(),
    	allinformationapi_type = $('.search_type').val(),
    	installments_time = $(this).closest('div').siblings('div').children('.search_date').val(),
    	marketing = $('.search_type').data('marketing');
    //console.log(installments_time);


    if (pagecount_num!=''&&allinformationapi_type!=''&installments_time!='') {

    	//console.log(pagecount_num+allinformationapi_type+installments_time);
    	//开始绘图
    	var ajaxDataArr = {
    		type 			: allinformationapi_type,
    		installments 	: installments_time,
    		pagecount 		: pagecount_num,
    		marketing 		: marketing
    	}

    	$('#main').html('<?=LOADING ?>');
    	ajaxForce ('graphinformationapi', $('#main'), ajaxDataArr, function(dataList){


		    /*var cate_a = dataList.data.category;
			for (var i = 0; i < cate_a.length; i++) {

				var Arr = {
					"name" 		: cate_a[i].name,
					"keyword" 	: {},
					"base" 		: cate_a[i].base,
					"itemStyle" : {
		                "normal": {
		                    "brushType" 	: "both",
		                    "color"         : randomColor(),
		                    "strokeColor"   : randomColor(),
		                    "lineWidth" 	: 1
		                }
					}
				};
				var str = '"'+cate_a[i].name+'":true'; 

				categoriesArr.push(Arr);
				categoryapiLegenddata.push(cate_a[i].name);
				shangquan.push(str);
			}


			//console.log(categoriesArr);
			console.log($.parseJSON('{'+shangquan.join(',')+'}'));
			console.log('结果2：'+categoriesArr);

    		//console.log('links:'+dataList.data.links+'；nodes:'+dataList.data.nodes);
    		var categoryapiLegendArr = {
			        data : categoryapiLegenddata,
			        selected:$.parseJSON('{'+shangquan.join(',')+'}'),
			        orient : 'vertical',
			        x : 'left'
				};
			//console.log(dataList.data.nodes.length);
			//console.log(dataList.data.links.length);
			console.log(categoryapiLegendArr);*/

			var categoryapiLegendArr 	= dataList.data.category.legend,
				categoriesArr 			= dataList.data.category.category;

			var d = dataList.data.nodes;
			var nodesArr = [];

			for (var i = 0; i < d.length; i++) {
				var category = d[i].category,
					name = d[i].name,
					value = d[i].value;
					strArr = {
						"name" 		: name,
						"category" 	: category,
						"value" 	: value,
						onclick 	: function(params){
										var thisText = params.target.style.text;
										thisText = "去看"+thisText+"的客户信息";
										if (top.location == self.location){
											//top.location.href = window.location.protocol+"//"+window.location.host+"?user="+params.target.style.text;
											//top.location.href = '<?=SEARVER_HOST?>customerbaseapi?callback=dataList&sign=<?=$Sign ?>&timespan=<?=$timespan ?>&uid='+params.target.style.text;
											window.open('public/user.php?user='+params.target.style.text+'&marketing='+marketing, thisText,'height=800,width=960,top=0,left=0,toolbar=yes,menubar=yes,scrollbars=yes,resizable=yes,location=yes,status=yes');
										}
										
									}
					};
				nodesArr.push(strArr);
			};
			//console.log($.parseJSON(nodesArr));
			//+',"onclick":function(params){alert(params.target.style.text);}'
			//console.log(nodesArr);
			//console.log(categoryapiLegendArr);
			//console.log(categoriesArr);
			//console.log( dataList.data.nodes);
			//console.log(dataList.data.links);


    		forceOption(categoryapiLegendArr, categoriesArr, nodesArr, dataList.data.links)
    	})
    }else{
    	alertHtml('alert-warning', '注意：', '貌似您还没选择完呢！');
    }

});



</script>
<script type="text/javascript">//var cnzz_protocol = (("https:" == document.location.protocol) ? " https://" : " http://");document.write(unescape("%3Cspan id='cnzz_stat_icon_1254155462'%3E%3C/span%3E%3Cscript src='" + cnzz_protocol + "s95.cnzz.com/z_stat.php%3Fid%3D1254155462' type='text/javascript'%3E%3C/script%3E"));$('#cnzz_stat_icon_1254155462').hide();</script>
</body>
</html>