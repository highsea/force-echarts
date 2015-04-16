<?php 

include './../include/config.php';


 ?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<meta http-equiv="content-Type" content="text/html; charset=UTF-8" />
<meta http-equiv="X-UA-Compatible" content="IE=Edge" />

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
								    <li> <a class="btn cunkuan_01">显示存款变化图</a><br>
								    	<div id="main_lin01"></div>
								    </li>
								    <li> <a class="btn jinrongzichan_02">显示金融资产变动</a><br>
								    	<div id="main_lin02"></div>
								    </li>
								    <li> <a class="btn daikuan_03">显示贷款变化图</a><br>
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
							    <li> 借记卡交易对手和交易量饼状图（请 猛击上面折线图节点）
							    	<br><br>
							    	<div id="main_bar06"></div>
							    </li>
							    <li>
							    	<a class="btn list_jiaoyi_07">交易信息详细列表</a><br>
							    	<div id="main_table_07">
							    		
							    	</div>
							    	<div id="main_table_08">

							    	</div>
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




<script src="./../js/jquery.min.js"></script>
<script src="./../css/bootstrap/js/bootstrap.min.js"></script>
<!-- DataTables -->
<script type="text/javascript" charset="utf8" src="./../js/jquery.dataTables.js"></script>
<script src="./../js/esl.js"></script>
<!-- <script src="js/store1.1.1.min.js"></script> -->
<script src="./../js/myFunction-1.0.2.js"></script>
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
	userall = "<?=$_GET['user'] ?>";
	

if (userall.indexOf(':')==-1) {
	userid = userall;
}else{
	userid = userall.split(':')[1];
}

var dataArr = {
	uid 		: userid,
	marteting 	: marketing
};

//客户基本信息
ajaxForce('customerbaseapi', $('.user_info'), dataArr, function (dataList) {

	var d = dataList.data;

	//if (d!='') {
		$('.user_info').append('<tr><td>姓名</td><td><p class="">'+d.CUST_NAME+'</p></td><td>性别</td><td><p>'+xingbie[d.GENDER_CD]+'</p></td></tr><tr><td>证件号码</td><td><p>'+d.DOCUMENT_NUM+'</p></td><td>手机号码</td><td><p>'+d.MOBILE_NUM+'</p></td></tr><tr><td>年龄</td><td><p>'+d.AGE+'</p></td><td>婚姻情况</td><td><p>'+yunying[d.MARRG_STAT_CD]+'</p></td></tr><tr><td>金融资产余额</td><td><p>'+d.FIN_ASSET_BAL+'</p></td><td>存款</td><td><p>'+d.DPSIT_BAL+'</p></td></tr><tr><td>商住地址</td><td><p>'+d.CONT_ADDR+'</p></td><td>其中：活期存款</td><td><p>'+d.a101+'</p></td></tr><tr><td>主营范围</td><td><p>'+d.MainAreas+'</p></td><td>客户经理</td><td><p>'+d.AccountManager+'</p></td></tr><tr><td>所属商圈</td><td><p>'+d.categoryName+'</p></td><td>经办行</td><td><p>'+d.LineManagers+'</p></td></tr><tr><td colspan="4" class="user_fxyc"><a class="btn btn-info ">点击查看 '+d.CUST_NAME+' 的风险预测</a></td></tr>');

		$('.user_fxyc').on('click', function() {
			// 客户风险预计
			ajaxForce('riskcustomerbaseapi', $('.user_fxyc'), {uid:userid}, function(dataList){
				var d = dataList.data;
				$('.user_fxyc').closest('tr').html('<td colspan="4"><table><tr><td>客户标示</td><td>'+biaozhiArr[d.Marked]+'</td><td>我行合作年限</td><td>'+d.FIRST_OPEN_CARD_YEAR+'</td></tr><tr><td>我行贷款余额</td><td>'+d.a110+' </td><td>我行存款余额</td><td>'+d.a100+' </td></tr><tr><td>我行非储余额</td><td>'+d.NonStorageBalance+'  </td><td></td><td></td></tr></table></td>');

			})

		});
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

		$('#myModal').on('show', function () {
			$(this).css({
				width: '500px',
				marginLeft: '-250px'
			});
		});

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

				//柱状图改成标准折线图
				var categoryArr = ['存款余额', '月日均', '季日均', '年日均'];
				var titleArr = {
					text: '存款变化',
		        	//subtext: '数据来自杜撰',
		        	//sublink: 'http://miningdata.com.cn'
				};
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
				seriesArr = [
						{
				            name: '存款余额',
				            type: 'line',
				            data: zichanyueArr,
				            //markPoint : markPointArr,
				            //markLine : markLineArr
				        },
				        {
				            name: '月日均',
				            type: 'line',
				            data: jirijunArr,
				        },
				        {
				            name: '季日均',
				            type: 'line',
				            data: nianrijunArr,
				        },
				        {
				            name: '年日均',
				            type: 'line',
				            data: yuerijunArr,
				        }
				];


				bLine (titleArr ,riqiArr, categoryArr, seriesArr, 'main_lin01');


				//柱状图 改成 折线图
				/*var riqiArr = [],
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
					text: '存款变化',
		        	//subtext: '数据来自杜撰',
		        	//sublink: 'http://miningdata.com.cn'
				};
				var categoryArr = ['存款余额', '月日均', '季日均', '年日均'];

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

		 		linebar (titleArr ,categoryArr, riqiArr, seriesArr, 'main_lin01');*/
		 		//linebar (titleArr , 'main_lin01');


			};
		})

	} 

})



//金融资产变动
$('.jinrongzichan_02').on('click', function(){

	var dataArr = {
		uid 		: userid,
		//marteting 	: marketing,
		//assetstype 	: '100,101,110,150,180,190,500'
	};
	var main_lin02 = $('#main_lin02');
	if (main_lin02.html()=='') {

		$(this).siblings('#main_lin02').css('height', '400px').html('<?=LOADING ?>');

		ajaxForce('depositcustomerapi', main_lin02, dataArr, function(dataList){
			var d = dataList.data;

			var riqi = [],
				cun_kuan = [],
				qitajinrong = [];

			for (var i = 0; i < d.length; i++) {
				riqi.push(d[i].STAT_DT);
				cun_kuan.push(d[i].a100_FIN_ASSET_BAL);
				qitajinrong.push(d[i].a500_FIN_ASSET_BAL);
			};
			var titleArr = {
				text: '金融资产变动',
	        	//subtext: '数据来自杜撰',
	        	//sublink: 'http://miningdata.com.cn'
			};
			var categoryArr = ['存款', '非储金融资产'];

			var seriesArr = [
			        {
			            name: '存款',
			            type: 'line',
			            data: cun_kuan
			        },
			        {
			            name: '非储金融资产',
			            type: 'line',
			            data: qitajinrong
			        }
			    ];

			bLine (titleArr , riqi, categoryArr,  seriesArr, 'main_lin02');

		
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
        	//subtext: '数据来自杜撰',
        	//sublink: 'http://miningdata.com.cn'
		};
		var categoryArr = ['贷款余额', '月日均', '季日均', '年日均'];

		var seriesArr = [
		        {
		            name: '贷款余额',
		            type: 'line',
		            data: daikuanyueArr
		        },
		        {
		            name: '月日均',
		            type: 'line',
		            data: jirijunArr
		        },
		        {
		            name: '季日均',
		            type: 'line',
		            data: nianrijunArr
		        },
		        {
		            name: '年日均',
		            type: 'line',
		            data: yuerijunArr
		        }
		    ];

 		linebar (titleArr , categoryArr, riqiArr, seriesArr, 'main_lin03');
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
				    'jieqingbiaozhi' :jieqingBZarr[d[i].PAYOFF_IND],
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

			var columnArr04 = [
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

			$('#myModalLabel').html('贷款详情 <small>表格可以左右滚动</small>');
			$('#myModal').on('show', function () {
				$(this).css({
					width: '1024px',
					marginLeft: '-512px'
				});
			});

			install_TB('modal_table', data_tableArr, columnArr04, '<thead><tr><th>借据号</th><th>结清标志</th><th>发放机构</th><th>放款日期</th><th>贷款期限</th><th>担保方式</th><th>执行利率</th><th>所属项目</th><th>到期日期</th><th>剩余本金</th><th>累计逾期次数</th><th>五级分类</th><th>还款卡当余额</th><th>本期应还款额</th></tr></thead><tbody></tbody>');
			$('#modal_table').find('[type=search]').closest('label').html('借据号过滤: <input type="search" class="" placeholder="" aria-controls="main_table04">');
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


function click_pie(time){

	$('#main_bar06').css({
		height: '500px',
	});

	//if ($('#main_bar06').html()=='') {
	    
    ajaxForce('amountandcounterpartyapi', ('#main_bar06'), {uid: userid, stat_dt: time}, function(dataList){
    	var d = dataList.data.c1,
    		e = dataList.data.c0,
    		categoryArr = [],
    		seriesAllArr = [
    			{value:d.all, name:pieYinhang[c1]},
    			{value:e.all, name:pieYinhang[c0]}
    		],
    		seriesDataArr = [];
    	for (var i = 0; i < d.list.length; i++) {

    		seriesDataArr.push({value:d.list[i].transamount, name:d.list[i].OPP_NAME, uid:d.list[i].OPP_PARTY_ID});
    		categoryArr.push(d.list[i].OPP_NAME);
    	};
    	for (var i = 0; i < e.list.length; i++) {

    		seriesDataArr.push({value:e.list[i].transamount, name:e.list[i].OPP_NAME, uid:e.list[i].OPP_PARTY_ID});
    		categoryArr.push(e.list[i].OPP_NAME);
    	};

    	var titleArr = {
	            text: '借记卡交易对手&交易量',
	            //subtext: '纯属虚构',
	            x:'center'
	        },
	        seriesArr = [
		            {
		                name:'行内外用户交易量',
		                type:'pie',
		                radius : [0, 70],
		                selectedMode: 'single',
		                x: '20%',
			            width: '40%',
			            funnelAlign: 'right',
			            max: 1548,
			            
			            itemStyle : {
			                normal : {
			                    label : {
			                        position : 'inner'
			                    },
			                    labelLine : {
			                        show : false
			                    }
			                }
			            },
		                data: seriesAllArr
		            },
			        {
			            name:'借记卡交易对手交易量',
			            type:'pie',
			            radius : [100, 140],
			            // for funnel
			            x: '60%',
			            width: '35%',
			            funnelAlign: 'left',
			            max: 1048,
			            data:seriesDataArr
			        }
		        ];
		//console.log(categoryArr, seriesArr);
    	pie_view(titleArr, categoryArr, seriesArr, 'main_bar06', marketing);
	})
//}
}


$('.list_jiaoyi_07').on('click', function(event) {
	event.preventDefault();
	$('#main_table_07, #main_table_08').html('<?=LOADING ?>');

	ajaxForce('listamountandcounterpartyapi', $('#main_table_07, #main_table_08'), {uid:userid}, function(dataList){

		var d = dataList.data.c1,
			e = dataList.data.c0,
			data_tableArrC1 = [],
			data_tableArrC0 = [];
		for (var i = 0; i < d.length; i++) {

			var new_data = {
				    'jiaoyishijian' : d[i].ETL_TX_DT,
				    'kehuhao' : '<a target="_blank" href="?user='+ d[i].OPP_PARTY_ID+'&marketing='+marketing+'">'+ d[i].OPP_PARTY_ID+'</a>',
				    'jiaoyiliang' : d[i].tansamount,
				    'duishouming': d[i].OPP_NAME,
			    };

			data_tableArrC1.push(new_data);
		}


		for (var i = 0; i < e.length; i++) {

			var new_data = {
				    'jiaoyishijian' : e[i].ETL_TX_DT,
				    'kehuhao' : '<a target="_blank" href="?user='+ e[i].OPP_PARTY_ID+'&marketing='+marketing+'">'+ e[i].OPP_PARTY_ID+'</a>',
				    'jiaoyiliang' : e[i].tansamount,
				    'duishouming': e[i].OPP_NAME,
			    };

			data_tableArrC0.push(new_data);
		}


		var columnArr = [
			    { data : 'kehuhao'},
			    { data : 'duishouming'},
			    { data : 'jiaoyiliang'},
			    { data : 'jiaoyishijian'},
			];
		$('#main_table_07').html('<h4>'+pieYinhang['c0']+'交易对手</h4><table id="main_table_C0"></table>');
		$('#main_table_08').html('<h4>'+pieYinhang['c1']+'交易对手</h4><table id="main_table_C1"></table>');

		install_TB('main_table_C1', data_tableArrC1, columnArr, '<thead><tr><th>客户号</th><th>姓名</th><th>交易金额 / 元</th><th>交易时间</th></tr></thead><tbody></tbody>');
		install_TB('main_table_C0', data_tableArrC0, columnArr, '<thead><tr><th>客户号</th><th>姓名</th><th>交易金额 / 元</th><th>交易时间</th></tr></thead><tbody></tbody>');

	})

});



</script>
</body>
</html>

