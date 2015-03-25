<?php 

include './../include/config.php';


 ?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<meta charset="UTF-8">
<title> <?=$_GET['user'] ?> 的客户信息</title>
<link rel="stylesheet" href="./../css/bootstrap/css/bootstrap.min.css">
<!-- <link rel="stylesheet" href="./../css/bootstrap/css/bootstrap-theme.min.css"> -->
<link rel="stylesheet" type="text/css" href="./../css/jquery.dataTables.css">

<link rel="stylesheet" href="./../css/mystyle.css">
<style type="text/css">
.dataTables_length select,.dataTables_filter input{width: 90px;}

</style>
</head>
<body>



<div class="container-fluid">
	<div class="row-fluid">
		<div class="span12">
			<div class="accordion" id="accordion-629695">
				<div class="accordion-group">
					<div class="accordion-heading">
						 <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion-629695" href="#accordion-element-1">基本信息 <i class="icon-chevron-down"></i></a>
					</div>
					<div id="accordion-element-1" class="accordion-body in collapse">
						<div class="accordion-inner">
							<table class="table user_info tips">
				
				
				
							</table>
						</div>
					</div>
				</div>
				<div class="accordion-group">
					<div class="accordion-heading">
						 <a class="accordion-toggle associatecustomerapi" data-toggle="collapse" data-parent="#accordion-629695" href="#accordion-element-2">关联客户 <i class="icon-chevron-down"></i></a>
					</div>
					<div id="accordion-element-2" class="accordion-body collapse">
						<div class="accordion-inner">


						<table id="guanliankehu"></table>
							
						</div>
					</div>
				</div>
				<div class="accordion-group">
					<div class="accordion-heading">
						 <a class="accordion-toggle assetscustomerapi" data-toggle="collapse" data-parent="#accordion-629695" href="#accordion-element-3">资负信息 <i class="icon-chevron-down"></i></a>
					</div>
					<div id="accordion-element-3" class="accordion-body collapse">
						<div class="accordion-inner">

<!-- 图 -->
							<div class="">

								<ul>
								    <li> <a class="btn cunkuan_01">显示存款柱状图</a><br>
								    	<div id="main_lin01"></div>
								    </li>
								    <li> <a class="btn jinrongzichan_02 disabled">显示其他金融资产柱状图（接口有问题，待修改）</a><br>
								    	<div id="main_lin02"></div>
								    </li>
								    <li> <a class="btn daikuan_03">显示贷款柱状图</a><br>
								    	<div id="main_lin03"></div>
								    </li>
								    <li> <a class="btn daikuanmingxi_04">显示贷款明细表格</a> <br>
								    	<table id="main_table04"></table>
								    	<br>
								    </li>
								    
									
								</ul>

							</div>
<!-- end -->

						</div>
					</div>
				</div>
				<div class="accordion-group">
					<div class="accordion-heading">
						 <a class="accordion-toggle assetscustomerapi" data-toggle="collapse" data-parent="#accordion-629695" href="#accordion-element-4">交易信息 <i class="icon-chevron-down"></i></a>
					</div>
					<div id="accordion-element-4" class="accordion-body collapse">
						<div class="accordion-inner">
						    <ul>
						    	<li> <a class="btn jiaoyixinxi_05">交易信息折线图</a><br>
								    	<div id="main_lin05"></div>
							    </li>
							    <li> <a class="btn duishoujiaoyiliang_06 disabled">借记卡交易对手和交易量饼状图(存在技术问题)</a><br>
							    	<div id="main_bar06"></div>
							    </li>
						    </ul>
						</div>
					</div>
				</div>



			</div>
		</div>
	</div>
</div>







 
<!-- Modal -->
<div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3 id="myModalLabel">头部</h3>
  </div>
  <div class="modal-body" >
  <table id="modal_table">
  	
  </table>
    
  </div>
  <div class="modal-footer">
    <button class="btn" data-dismiss="modal" aria-hidden="true">关闭</button>
    <!-- <button class="btn btn-primary">保存</button> -->
  </div>
</div>




<script src="http://libs.baidu.com/jquery/1.11.1/jquery.min.js"></script>
<script src="./../css/bootstrap/js/bootstrap.min.js"></script>
<!-- DataTables -->
<script type="text/javascript" charset="utf8" src="./../js/jquery.dataTables.js"></script>
<script src="./../js/esl.js"></script>
<!-- <script src="js/store1.1.1.min.js"></script> -->
<script src="./../js/myFunction.js"></script>
<script>


//echarts zrender 模块化配置
require.config({
    packages: [
        {
            name: 'echarts',
            location: './../echarts/src',      
            main: 'echarts'
        },
        {
            name: 'zrender',
            location: './../zrender/src', // zrender与echarts在同一级目录
            main: 'zrender'
        }
    ]
});




var marketing = "<?= $_GET['marketing'] ?>",
	userid = "<?=$_GET['user'] ?>";


var dataArr = {
	uid 		: userid,
	marteting 	: marketing
};

//客户基本信息
ajaxForce('customerbaseapi', $('.user_info'), dataArr, function (dataList) {
	var yunying = {
		"1": "已婚 <a class='btn btn-info chakanpeiou' data-toggle='modal' data-target='#myModal'>查看配偶信息</a>",
		"0": "未婚"
	}
	var d = dataList.data;
	//if (d!='') {
		$('.user_info').append('<tr><td>姓名</td><td><p class="">'+d.CUST_NAME+'</p></td><td>性别</td><td><p>'+d.GENDER_CD+'</p></td></tr><tr><td>证件号码</td><td><p>'+d.DOCUMENT_NUM+'</p></td><td>手机号码</td><td><p>'+d.MOBILE_NUM+'</p></td></tr><tr><td>年龄</td><td><p>'+d.AGE+'</p></td><td>婚姻情况</td><td><p>'+yunying[d.MARRG_STAT_CD]+'</p></td></tr><tr><td>金融资产余额</td><td><p>'+d.FIN_ASSET_BAL+'</p></td><td>存款</td><td><p>'+d.DPSIT_BAL+'</p></td></tr><tr><td>商住地址</td><td><p>'+d.CONT_ADDR+'</p></td><td>其中：活期存款</td><td><p>'+d.DPSIT_BAL+'</p></td></tr><tr><td>主营范围</td><td><p>'+d.MainAreas+'</p></td><td>客户经理</td><td><p>'+d.AccountManager+'</p></td></tr><tr><td>所属商圈</td><td><p>'+d.CUST_NAME+'</p></td><td>经办行</td><td><p>'+d.LineManagers+'</p></td></tr>');
	//} 
	$('.chakanpeiou').on('click', function(){

		$('#myModalLabel').html('配偶信息详情表');

		ajaxForce('spousebaseapi', $('#myModalLabel'), {uid:userid}, function(dataList){
			var d = dataList.data;
			$('#modal_table').append('<tr><td>姓名</td><td><p class="">'+d.MEM_NAM+'</p></td><td>性别</td><td><p>'+d.MEM_GENDER+'</p></td></tr><tr><td>证件号码</td><td><p>'+d.MEM_CTIF_NO+'</p></td><td>手机号码</td><td><p>'+null+'</p></td></tr><tr><td>户口本_住址</td><td><p>'+d.MEM_ADDRESS+'</p></td><td>户口本_籍贯</td><td><p>'+d.MEM_NATIVEPLACE+'</p></td></tr><tr><td>居住证_住址</td><td><p>'+d.MEM_ADDRESS_RES+'</p></td><td>居住证_到期日</td><td><p>'+d.MEM_EXPDATE+'</p></td></tr><tr><td>家庭电话</td><td><p>'+d.MEM_CONT_PHONE_NO+'</p></td><td>银行贷款余额</td><td><p>'+d.MEM_LOAN_BALANCE+'</p></td></tr><tr><td>对外担保余额</td><td><p>'+d.MEM_EXTENAL_ASSURE_BALANCE+'</p></td><td>当前逾期金额</td><td><p>'+d.MEM_OVRDUE_TOT_AMT+'</p></td></tr><tr><td>累计逾期次数</td><td><p>'+d.CUST_NAME+'</p></td><td>最高逾期期数</td><td><p>'+d.MEM_OVRDUE_ALL_TIME+'</p></td></tr><tr><td>信用状况</td><td><p>'+d.MEM_PAY_CREDIT+'</p></td><td>是否涉诉</td><td><p>'+d.MEM_INVOLVE_LAWSUIT+'</p></td></tr><tr><td>存款金额</td><td><p>'+null+'</p></td><td>更新时间</td><td><p>'+d.LAST_UPD_DT+'</p></td></tr>');
			$('#modal_table').find('td').css({'border-color':'#000','border-width': '1px','border-style': 'solid'})
		});

	});
});

//关联客户
$('.associatecustomerapi').on('click', function(dataList){

	var guanliankehu = $('#guanliankehu'),
		data_tableArr = [];


	if (guanliankehu.html()=='') {

		guanliankehu.html('<?=LOADING ?>');

		ajaxForce('associatecustomerapi', guanliankehu, dataArr, function(dataList){


			var d = dataList.data;
			for (var i = 0; i < d.length; i++) {
				var customertype = d[i].customertype,
					name = d[i].name,
					new_data = {
						"xuhao" : i+1,
						"kehuleixing" : customertype,
						"kehuhao" : name,
						"gongtongkehu" : '<td><a data-toggle="modal" data-target="#myModal" class="btn togethercustomer">查看共同客户</a></td>'
					};
					data_tableArr.push(new_data);
					//str = '<tr><td>'+customertype+'</td><td>'+name+'</td><td><a class="btn ">查看共同客户</a></td></tr>';
			};
			//console.log(data_tableArr);

			var columnArr = [
					    { data : 'xuhao'},
					    { data : 'kehuleixing'},
					    { data : 'kehuhao'},
					    { data : 'gongtongkehu'}
					];
			install_TB('guanliankehu', data_tableArr, columnArr, '<thead><tr><th>序号</th><th>客户类型</th><th>客户号</th><th>共同客户</th></tr></thead><tbody></tbody>');

		})
		
	} 

})


//获取共同客户信息接口
$('#guanliankehu').on('click', '.togethercustomer', function(){
	var togetherid = $(this).closest('tr').children('td').eq(2).text(),
		data_tableArr = [];
	//console.log(togetherid);
	var ajax_dataArr = {
		uid 		: userid,
		marteting 	: marketing,
		togetherid 	: togetherid
	}
	ajaxForce('togethercustomerapi', $('#modal_table'), ajax_dataArr, function(dataList){
		var d = dataList.data;
		for (var i = 0; i < d.length; i++) {
			var HOST_CUST_ID = d[i].HOST_CUST_ID,
				CustomerMark = d[i].CustomerMark,
				new_data = {
					"xuhao" : i+1,
					"biaoshi" : CustomerMark ,
					"kehuhao" : HOST_CUST_ID
				};
			data_tableArr.push(new_data);
		};
		var columnArr = [
			    { data : 'xuhao'},
			    { data : 'biaoshi'},
			    { data : 'kehuhao'}
			];
		install_TB('modal_table', data_tableArr, columnArr, '<thead><tr><th>序号</th><th>客户标识</th><th>客户号</th></tr></thead><tbody></tbody>');
		//获取共同客户 的模态框
		//$('#myModal').on('show', function () {
			$('#myModalLabel').html('获取共同客户信息接口');
		//})
	})

})

//资产信息接口(合)


//存款
$('.cunkuan_01').on('click', function(){
	


	var dataArr = {
		uid 		: userid,
		//marteting 	: marketing,
		assetstype 	: '100'
	};
	var main_lin01 = $('#main_lin01');
	if (main_lin01.html()=='') {

		$(this).siblings('#main_lin01').css('height', '400px').html('<?=LOADING ?>');

		ajaxForce('assetscustomerapi', main_lin01, dataArr, function(dataList){
			var d = dataList.data.a100;
			if (d=='') {
				alertHtml( main_lin01, 'alert-info', '<b data-code="1008">数据不存在: </b>', '存款绘图失败');
			} else{

				var riqiArr = [],
					zichanyueArr = [],
					jirijunArr = [],
					nianrijunArr = [],
					yuerijunArr = [];
				for (var i = 0; i < d.length; i++) {
					var riqi = d[i].STAT_DT,
						zichanyue = d[i].FIN_ASSET_BAL,
						yuerijun = d[i].FIN_ASSET_BAL_MONTH_DAY_AVG,
						jirijun = d[i].FIN_ASSET_BAL_QUAR_DAY_AVG,
						nianrijun = d[i].FIN_ASSET_BAL_YEAR_DAY_AVG;

					riqiArr.push(riqi);
					zichanyueArr.push(zichanyue);
					jirijunArr.push(jirijun);
					nianrijunArr.push(nianrijun);
					yuerijunArr.push(yuerijun);
				};
				var titleArr = {
					text: '存款图形信息',
		        	subtext: '数据来自杜撰',
		        	sublink: 'http://miningdata.com.cn'
				};
				var categoryArr = riqiArr;

				var seriesArr = [
				        {
				            name: '存款余额',
				            type: 'bar',
				            data: zichanyueArr
				        },
				        {
				            name: '月日均',
				            type: 'bar',
				            data: jirijunArr
				        },
				        {
				            name: '季日均',
				            type: 'bar',
				            data: nianrijunArr
				        },
				        {
				            name: '年日均',
				            type: 'bar',
				            data: yuerijunArr
				        }
				    ];

		 		linebar (titleArr ,riqiArr ,categoryArr, seriesArr, 'main_lin01');

			};
		})

	} 

})


//金融资产
$('.jinrongzichan_02').on('click', function(){

	var dataArr = {
		uid 		: userid,
		//marteting 	: marketing,
		assetstype 	: '100,101,102,110'
	};
	var main_lin02 = $('#main_lin02');
	if (main_lin02.html()=='') {

		ajaxForce('assetscustomerapi', main_lin02, dataArr, function(dataList){
			var d = dataList.data.a100;
			console.log(d);
			/*for (var i = 0; i < d.length; i++) {
				d[i].
			};*/
		})

	} 


})

//获取贷款图形
$('.daikuan_03').on('click', function(){

	$(this).siblings('#main_lin03').css('height', '400px').html('<?=LOADING ?>');
	var riqiArr = [],
		daikuanyueArr = [],
		jirijunArr = [],
		nianrijunArr = [],
		yuerijunArr = [];
	ajaxForce('graphloancustomerapi', $('#main_lin03'), dataArr, function(dataList){
		var d = dataList.data;
		for (var i = 0; i < d.length; i++) {
			var riqi = d[i].STAT_DT,
				daikuanyue = d[i].REMAIN_PRIN,
				jirijun = d[i].LOAN_QUAR_DAY_AVG,
				nianrijun = d[i].LOAN_YEAR_DAY_AVG,
				yuerijun = d[i].LOAN_MONTH_DAY_AVG;

			riqiArr.push(riqi);
			daikuanyueArr.push(daikuanyue);
			jirijunArr.push(jirijun);
			nianrijunArr.push(nianrijun);
			yuerijunArr.push(yuerijun);
		};
		var titleArr = {
			text: '贷款图形信息',
        	subtext: '数据来自杜撰',
        	sublink: 'http://miningdata.com.cn'
		};
		var categoryArr = riqiArr;

		var seriesArr = [
		        {
		            name: '贷款余额',
		            type: 'bar',
		            data: daikuanyueArr
		        },
		        {
		            name: '月日均',
		            type: 'bar',
		            data: jirijunArr
		        },
		        {
		            name: '季日均',
		            type: 'bar',
		            data: nianrijunArr
		        },
		        {
		            name: '年日均',
		            type: 'bar',
		            data: yuerijunArr
		        }
		    ];

 		linebar (titleArr ,riqiArr ,categoryArr, seriesArr, 'main_lin03');
	})

})

//获取贷款列表信息
$('.daikuanmingxi_04').on('click', function(){

	var data_tableArr = [];
	$('#main_table04').html('<?=LOADING ?>');

	ajaxForce('listloancustomerapi', $('#main_table04'), dataArr, function(dataList){
		var d = dataList.data;
		for (var i = 0; i < d.length; i++) {

			var new_data = {
				    'jiejuhao' : d[i].ACCT_NUM,
				    'fangkuanriqi' : d[i].DISTR_DT,
				    'shengyubenjin' :  d[i].REMAIN_PRIN,
				    'suoshuxiangmu': d[i].PROJ_NUM,
				    'daoqiriqi': d[i].MATURE_DT,
				    'leijiyuqicishu' :d[i].ACCUM_OVDUE_CNT,
				    'danbaofangshi': d[i].GUAR_MODE_CD,
				    'benyueyinghuan': d[i].THMONTH_SHLD_REPAY_AMT,
				    'fangkuanjigou' :d[i].DISTR_CHAN_CD,
				    'huankuankayue': d[i].REPAY_CARD_BAL,
				    '5jifenlei' :d[i].GRADE5_CLASS_CD,
				    'zhixinglilv': d[i].EXEC_INT_RATE,
				    'fangkuanjine': d[i].DISTR_AMT,
				    'tianjiariqi': d[i].STAT_DT,
				    'jieqingbiaozhi' :d[i].PAYOFF_IND,
				    'daikuanqixian': d[i].LOAN_TERM
			    };

			data_tableArr.push(new_data);
		}

		var columnArr = [
			    { data : 'jiejuhao'},
			    { data : 'jieqingbiaozhi'},
			    { data : 'fangkuanjigou'},
			    { data : 'fangkuanriqi'},
			    { data : 'fangkuanjine'},
			    { data : '5jifenlei'},
			    { data : 'shengyubenjin'}
			];
		install_TB('main_table04', data_tableArr, columnArr, '<thead><tr><th>借据号</th><th>结清标志</th><th>发放机构</th><th>放款日期</th><th>放款金额</th><th>五级分类</th><th>剩余本金</th></tr></thead><tbody></tbody>');

		//console.log($(this));

		$('.daikuanmingxi_04').closest('li').append('<a class="btn btn-info xiangxi04" data-toggle="modal" data-target="#myModal">显示详细信息</a><br>');
		
		$('.xiangxi04').on('click', function(){

			var columnArr = [
			    { data : 'jiejuhao'},
			    { data : 'jieqingbiaozhi'},
			    { data : 'fangkuanjigou'},
			    { data : 'fangkuanriqi'},
			    { data : 'daikuanqixian'},
			    { data : 'danbaofangshi'},
			    { data : 'zhixinglilv'},
			    { data : 'suoshuxiangmu'},
			    { data : 'daoqiriqi'},
			    { data : 'shengyubenjin'},
			    { data : 'leijiyuqicishu'},
			    { data : '5jifenlei'},
			    { data : 'huankuankayue'},
			    { data : 'benyueyinghuan'}
			];

			$('#myModalLabel').html('获取贷款列表详细信息');
			install_TB('modal_table', data_tableArr, columnArr, '<thead><tr><th>借据号</th><th>结清标志</th><th>发放机构</th><th>放款日期</th><th>贷款期限</th><th>担保方式</th><th>执行利率</th><th>所属项目</th><th>到期日期</th><th>剩余本金</th><th>累计逾期次数</th><th>五级分类</th><th>还款卡当余额</th><th>本期应还款额</th></tr></thead><tbody></tbody>');
		})

	})

})


$('.jiaoyixinxi_05').on('click', function(){

	$(this).siblings('#main_lin05').css('height', '400px').html('<?=LOADING ?>');
	var legendArr = ['交易金额','交易笔数'],
		categoryArr = [],
		seriesArr = [],
		shuliangArr = [],
		jin_eArr = [];


	ajaxForce('amountandcountapi', $(this).siblings('#main_lin05'), {uid: userid}, function(dataList){
		var d = dataList.data;
		for (var i = 0; i < d.length; i++) {
			var shijian = d[i].STAT_DT,
			    shuliang = d[i].tanscount,
			    jin_e = d[i].tansamount;

			categoryArr.push(shijian);
			shuliangArr.push(shuliang);
			jin_eArr.push(jin_e);

		};

		var seriesArr = [
				{
	                name:'交易金额',
	                type:'line',
	                data:jin_eArr
	            },
	            {
	                name:'交易笔数',
	                type:'line',
	                yAxisIndex: 1,
	                data:shuliangArr
	            }

			];
		shuangxian(legendArr, categoryArr, seriesArr ,'main_lin05');



	})
})


</script>
</body>
</html>

