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
<meta http-equiv="content-Type" content="text/html; charset=UTF-8" />
<meta http-equiv="X-UA-Compatible" content="IE=Edge" />
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
				<div class="span2">
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
				<div class="span10">
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
<!-- 风险监测 table	 -->
<div class="row-fluid">

	<div class="span6">
		选择期次：
		<select class="span6 search_date_fxjc">
		</select>
	</div>
	
	<div class="span6">
		<a class="btn btn-success start-fxjc">查询</a>
		<a class="btn btn-prim">导出数据</a>
	</div>
</div>

<div class="row-fluid">
	<div class="span12 fxjc_date"></div>
	<div class="span12">
		<table id="fxjc_table">
			
		</table>
	</div>


</div>

<!-- 风险 end  -->

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
<script src="js/myFunction-1.0.0.js"></script>
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
	$('.table_wrap_hs').html('<div class="span12 shujushijian"></div><table id="table_id" class="span12 display"></table>');
	

	$('.search_num').val('50');

	//console.log(this_text);

	//console.log($(this).closest('.accordion-group').data('choice'));

	//加载期数
	if ($('.search_date').find('option').length==0) {

		ajaxForce ('installmentsapi', $('.search_date'), {}, function(dataList){
			search_date.html('');
			var d = dataList.data;
			for (var i = 0; i < d.length; i++) {
				var datatime = d[i],
				    str = '<option><a data-type="'+datatime+'">'+datatime+'</a></option>';
				search_date.append(str);
			}
		}) 
	};

	//设置 统一文字／显示
	section_show = $('[data-html='+$(this).closest('.accordion-group').data('choice')+']');
	section_show.removeClass('none').siblings('section').removeClass('block').addClass('none');
	section_show.children('h3').html($(this).text());

	//设置 特定 界面
	if (this_text=='枢纽商户') {
		search_type.append('<option value="betweenness">按商户紧密度</option><option value="closeness">按商户关键性</option>');
		search_type.data('marketing', 'hub');


	} else if (this_text=='顶层商户') {
		search_type.append('<option value="degree">按交易频率</option><option value="amount">按商户活跃度</option>');
		search_type.data('marketing', 'top');
		//section_show.children('h3').html('交易规模和商户活跃度');


	} else if (this_text=='风险监测') {
		//alert('接口未找到，或 还未开发')
		if ($('.search_date_fxjc').find('option').length==0) {

			ajaxForce ('RiskInstallments', $('.search_date_fxjc'), {}, function(dataList){
				var d = dataList.data;
				for (var i = 0; i < d.length; i++) {
					var datatime = d[i],
					    str = '<option><a data-type="'+datatime+'">'+datatime+'</a></option>';
					$('.search_date_fxjc').append(str);
				}
			})

		};

	} else{
		alert('未知错误！');

	}

});


//查询 风险监测
$('.start-fxjc').on('click', function() {
	
	var data_choice = $('.search_date_fxjc').val();
	//alert('请赶紧提供 风险监测 API；另外 客户风险监测表格 放哪里')
	if (data_choice&&$('#fxjc_table').find('td').length==0) {

		$('.fxjc_date').html('<?=LOADING ?>');

		ajaxForce ('RiskWarningInformationapi', $('#fxjc_table'), {installments:data_choice}, function(dataList){

			$('.fxjc_date').html('<p>数据时间：'+dataList.data.datatime[0]+'到'+dataList.data.datatime[1]+'</p>');
			var l = dataList.data.data,
				dataArr = [];

			for (var i = 0; i < l.length; i++) {

				var kehuhao 	= l[i].HOST_CUST_ID,
				    mingcheng = l[i].CUST_NAME,
				    shoujihao 	= l[i].MOBILE_NUM,
				    shangquanming = l[i].categoryName,
				    guishuzhihang = l[i].FIRST_OPEN_ACCT_DT,
					huankuankayue  = l[i].REPAY_CARD_BAL,
					daikuanyue = l[i].REMAIN_PRIN,
					danbaofangshi = l[i].GUAR_MODE_CD,
					daoqishijian = l[i].MATURE_DT,
					biaozhi = biaozhiArr[l[i].Marked];

				var dataString = {
					"clent_id" 	: '<a target="_blank" href="./public/user.php?user='+kehuhao+'&marketing=fengxian">'+kehuhao+'</a>',
					"name" 	: mingcheng,
					"phone_num" : shoujihao,
					"categoryName" 	: shangquanming,
					"guishuzhihang" : guishuzhihang,
					"huankuankayue"	: huankuankayue,
					"daikuanyue"	: daikuanyue,
					"danbaofangshi" : danbaofangshi,
					"daoqishijian" : daoqishijian,
					"biaozhi" : biaozhi
				};

				dataArr.push(dataString);
			};

			data_tb_Arr = [
			    {data : 'clent_id'},
			    {data : 'name'},
			    {data : 'phone_num'},
			    {data : 'categoryName'},
			    {data : 'guishuzhihang'},
			    {data : 'huankuankayue'},
			    {data : 'daikuanyue'},
			    {data : 'danbaofangshi'},
			    {data : 'daoqishijian'},
			    {data : 'biaozhi'}
			]

		install_TB('fxjc_table', dataArr, data_tb_Arr, '<thead><tr><th>客户号</th><th>名称</th><th>手机号</th><th>商圈</th><th>归属支行</th><th>还款卡上余额</th><th>贷款余额</th><th>担保方式</th><th>贷款到期时间</th><th>标识</th></tr></thead><tbody></tbody>');

		})

	};
	
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
			starttime = dataList.data.datatime[0],
			endtime = dataList.data.datatime[1];
		$('.shujushijian').html('<p>数据时间：<b>'+starttime+'</b> 至 <b>'+endtime+'</b></p>');

		if (ajaxDataArr.marketing=='hub') {
			
			for (var i = 0; i < l.length; i++) {

				var jinmudu  		= l[i].betweenness,
					guanjianxing 	= l[i].closeness,
					qici 			= l[i].addtime,
					shangquanming 	= l[i].categoryName,
					xingming 		= l[i].CUST_NAME,
					kehuhao 		= l[i].name;

				var dataString = {
					"clent_id" 	: '<a href="./public/user.php?user='+kehuhao+'&marketing=hub" target="_blank">'+kehuhao+'</a>',
					"business" 	: shangquanming,
					"name" 		: xingming,
					"top_hub1"	: jinmudu,
					"top_hub2"	: guanjianxing,
					//"date" 		: qici
				};

				dataArr.push(dataString);

			};

			data_tb_Arr = [
			    {data : 'clent_id'},
			    {data : 'name'},
			    {data : 'business'},
			    {data : 'top_hub1'},
			    {data : 'top_hub2'},
			    //{data : 'date'}
			]
			install_TB('table_id', dataArr, data_tb_Arr, '<thead><tr><th>客户号</th><th>名称</th><th>商圈</th><th>商户紧密度</th><th>商户关键性</th></tr></thead><tbody></tbody>');

		} else{//top
			
			for (var i = 0; i < l.length; i++) {
				var pinglv 	= l[i].degree,
				    jineshu = l[i].amount,
				    //qici 	= l[i].addtime,
				    shangquanming = l[i].categoryName,
				    xingming = l[i].CUST_NAME,
					kehuhao  = l[i].name;

				var dataString = {
					"clent_id" 	: '<a href="./public/user.php?user='+kehuhao+'&marketing=top" target="_blank">'+kehuhao+'</a>',
					"business" 	: shangquanming,
					"name" 		: xingming,
					"guimo"	: jineshu,
					"huoyue"	: pinglv,
					//"date" 		: qici
				};

				dataArr.push(dataString);
			};


			data_tb_Arr = [
			    {data : 'clent_id'},
			    {data : 'name'},
			    {data : 'business'},
			    {data : 'guimo'},
			    {data : 'huoyue'},
			    //{data : 'date'}
			]

			install_TB('table_id', dataArr, data_tb_Arr, '<thead><tr><th>客户号</th><th>名称</th><th>商圈</th><th>交易规模</th><th>商户活跃度</th></tr></thead><tbody></tbody>');

		};

		


	});
})








//验证绘图数据 开始绘图
$('.start-force').on('click',function(){

//获取 categories
var categoriesArr = [],
	categoryapiLegenddata = [],
	shangquan = [];

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


		    var cate_a = dataList.data.category.category;
			for (var i = 0; i < cate_a.length; i++) {

				var Arr = {
					"name" 		: cate_a[i].name,
					//"keyword" 	: {},
					//"base" 		: cate_a[i].base,
					"itemStyle" : {
		                "normal": {
		                    //"brushType" 	: "both",
		                    "color"         : nodeColor[i],
		                    //"strokeColor"   : '#000',
		                    //"lineWidth" 	: 1
		                }
					}
				};
				var str = '"'+cate_a[i].name+'":true'; 

				categoriesArr.push(Arr);
				categoryapiLegenddata.push(cate_a[i].name);
				shangquan.push(str);
			}


			//console.log(categoriesArr);
			//console.log($.parseJSON('{'+shangquan.join(',')+'}'));
			//console.log('结果2：'+categoriesArr);

    		//console.log('links:'+dataList.data.links+'；nodes:'+dataList.data.nodes);
    		var categoryapiLegendArr = {
			        data : categoryapiLegenddata,
			        selected:$.parseJSON('{'+shangquan.join(',')+'}'),
			        orient : 'vertical',
			        x : 'left'
				};

			//console.log(categoryapiLegendArr);

			//var categoryapiLegendArr 	= dataList.data.category.legend;
			

			var d = dataList.data.nodes;
			var nodesArr = [];

			for (var i = 0; i < d.length; i++) {
				var category = d[i].category,
					name = d[i].name,
					cn_name = d[i].CUST_NAME
					value = d[i].value;
					strArr = {
						"name" 		: cn_name+':'+name,
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