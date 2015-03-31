/*!
 * Copyright highsea90.com All rights reserved.
 * myFunction.js
 * @version 1-0-0
 */


//获取浏览器页面可见高度和宽度
var _PageHeight = document.documentElement.clientHeight,
    _PageWidth = document.documentElement.clientWidth;
//计算loading框距离顶部和左部的距离（loading框的宽度为215px，高度为61px）
var _LoadingTop = _PageHeight > 61 ? (_PageHeight - 61) / 2 : 0,
    _LoadingLeft = _PageWidth > 215 ? (_PageWidth - 215) / 2 : 0;
//在页面未加载完毕之前显示的loading Html自定义内容
var _LoadingHtml = '<div id="loadingDiv" style="position:absolute;left:0;width:100%;height:' + _PageHeight + 'px;top:0;background:#f3f8ff;opacity:0.8;filter:alpha(opacity=80);z-index:10000;"><div style="position: absolute; cursor1: wait; left: ' + _LoadingLeft + 'px; top:' + _LoadingTop + 'px; width: auto; height: 57px; line-height: 57px; padding-left: 50px; padding-right: 5px; background: #ccc; border: 2px solid #95B8E7; color: #696969; font-family:\'Microsoft YaHei\';">页面加载中，请等待...</div></div>';
//呈现loading效果
document.write(_LoadingHtml);

//window.onload = function () {
//    var loadingMask = document.getElementById('loadingDiv');
//    loadingMask.parentNode.removeChild(loadingMask);
//};

//监听加载状态改变
document.onreadystatechange = completeLoading;

//加载状态为complete时移除loading效果
function completeLoading() {
    if (document.readyState == "complete") {
        var loadingMask = document.getElementById('loadingDiv');
        loadingMask.parentNode.removeChild(loadingMask);
    }
}



// 格式时间 转 unix时间戳
function time_unix (time) {
    var _date = new Date(time);
        commonTime = new Date(Date.UTC(_date.getFullYear(),_date.getMonth(),_date.getDate(),_date.getHours(),_date.getMinutes(), _date.getSeconds()));
    return commonTime.getTime()/1000 - 8*60*60;
}
//随机颜色 #000000

function randomColor(){
    return '#'+('00000'+(Math.random()*0x1000000<<0).toString(16)).slice(-6);
}

// 弹框
/*function alertHtml(info, title, message){
    $('.tips').append('<div class="alert '+info+'"><button type="button" class="close" data-dismiss="alert">×</button><strong>'+title+'</strong>'+message+'</div>');

}*/
var nodeColor = ['#FF7F50', '#87CEFA', '#DA70D6', '#32CD32', '#6495ED', '#FF69B4', '#BA55D3', '#CD5C5C', '#FFA500', '#40E0D0', '#1E90FF', '#FF6347', '#7B68EE', '#00FA9A', '#FFD700'];
var biaozhiArr = {
    "0" : "<b class='btn btn-success disabled'>正常</b>",
    "1" : "<b class='btn btn-danger disabled'>关注</b>"
};

var xingbie = {
    "1" : "女",
    "2" : "男",
    'null' : "未知"
};
var yunying = {
    "1": "已婚 <a class='btn btn-info chakanpeiou' data-toggle='modal' data-target='#myModal'>查看配偶信息</a>",
    "0": "未婚",
    "Z": "未知",
    "null" : "未知"
};
var jieqingBZarr = {
    "1" : "未结清",
    "0" : "结清"
}
var zichan_name = {
    //'a120': '理财',//
    //'a130': '基金',//
    //'a140': '国债',//
    'a150': '第三方存管',
    //'a160': '贵金属',//
    //'a170': '保险',//
    'a180': '私银撮合',
    'a190': '个人外汇实盘',
    'a101': '活期存款',
    'a100': '存款',
    'a110': '贷款',
    'a500': '非存储金融资产'
}

var pieName = {
    "0":"未知名称"
};

// 弹框 0.0
function alertHtml( dom, info, title, message){
    dom.html('<div class="alert '+info+'"><button type="button" class="close" data-dismiss="alert">×</button><strong>'+title+'</strong>'+message+'</div>');
}


//生成表格
function install_TB(t, dataArr, columnArr, tableHead){

    $('.modal-body').html('<table id="modal_table"></table>');
    $('#'+t).html('')
    .append(tableHead)
    .DataTable({
        data    : dataArr,
        columns : columnArr,
        "sDom"  : "l f t i p r",
        "oLanguage": {
        "sLengthMenu": "每页显示 _MENU_ 条",
        "sZeroRecords": "哎哟，找不到……",
        "sInfo": "从 _START_ 到 _END_ /共 _TOTAL_ 条数据",
        "sInfoEmpty": "没有数据",
        "sInfoFiltered": "(从 _MAX_ 条数据中检索)",
        "sSearch" : "任意关键字检索",
        "oPaginate": {
            "sFirst": "首页",
            "sPrevious": "前一页",
            "sNext": "后一页",
            "sLast": "尾页"
            },
        "sZeroRecords": "没有检索到数据",
        "sProcessing": "<img src='http://images.cnitblog.com/blog2015/531703/201503/241551310675303.gif' />"
        }
    });

}

//绘图 柱状


function linebar (titleArr ,dataArr, categoryArr, seriesArr, mainId){

var option = {
    title: titleArr,
    
    tooltip : {
        trigger: 'axis',
        /*formatter:function(a){
           var relVal = "";
           relVal = a[0]+"万元<br/>";
           //relVal += a[1]+"笔";
           return relVal;
        }*/
    },
    legend: {
        x: 'right',
        data:dataArr
        /*['2010','2011','2012','2013']*/
    },
    toolbox: {
        show: true,
        orient: 'vertical',
        y: 'center',
        feature: {
            mark: {show: true},
            dataView: {show: true, readOnly: false},
            restore: {show: true},
            saveAsImage: {show: true}
        }
    },
    calculable: true,
    grid: {
        y: 80,
        y2: 40,
        x2: 40
    },
    xAxis: [
        {
            type: 'category',
            data: categoryArr
            /*['食品', '衣着', '居住', '家庭设备及用品', '医疗保健', '交通和通信', '文教娱乐服务', '其他']*/
        }
    ],
    yAxis: [
        {
            type: 'value',
            name: '万元',
            axisLabel : {
                formatter: '{value} 万元'
            }
        }
    ],

    series: seriesArr
    /*[
        {
            name: '2010',
            type: 'bar',
            //itemStyle: itemStyle,
            data: [4804.7,1444.3,1332.1,908,871.8,1983.7,1627.6,499.2]
        },
        {
            name: '2011',
            type: 'bar',
            //itemStyle: itemStyle,
            data: [5506.3,1674.7,1405,1023.2,969,2149.7,1851.7,581.3]
        },
        {
            name: '2012',
            type: 'bar',
            //itemStyle: itemStyle,
            data: [6040.9,1823.4,1484.3,1116.1,1063.7,2455.5,2033.5,657.1]
        },
        {
            name: '2013',
            type: 'bar',
            //itemStyle: itemStyle,
            data: [6311.9,1902,1745.1,1215.1,1118.3,2736.9,2294,699.4]
        }
    ]*/
};
                    

        require(
            [
                'echarts',
                'echarts/chart/line',
                'echarts/chart/bar'
            ],
            function (ec) {
                var myChart = ec.init(document.getElementById(mainId));
                myChart.setOption(option);
            }
        )

}








//绘制双线 双坐标 图
function shuangxian(legendArr, categoryArr, seriesArr ,mainId){

    var option = {

        tooltip : {
            trigger: 'axis'/*,
            formatter:function(a){
               var relVal = "";
               relVal = a[0]+"万元<br/>";
               relVal += a[1]+"笔";
               return relVal;
            }*/
        },
        toolbox: {
            show : true,
            feature : {
                mark : {show: true},
                dataView : {show: true, readOnly: false},
                magicType: {show: true, type:['line'] /* ['line', 'bar']*/},
                restore : {show: true},
                saveAsImage : {show: true}
            }
        },
        calculable : true,
        legend: {
            data:legendArr
            /*['交易金额','交易笔数']*/
        },
        xAxis : [
            {
                type : 'category',
                data : categoryArr
                /*['1月','2月','3月','4月','5月','6月','7月','8月','9月','10月','11月','12月']*/
            }
        ],
        yAxis : [
            {
                type : 'value',
                name : '万元',
                axisLabel : {
                    formatter: '{value} 万元'
                }
            },
            {
                type : 'value',
                name : '笔数',
                axisLabel : {
                    formatter: '{value} 笔'
                }
            }
        ],
        series : seriesArr/*[

            {
                name:'交易金额',
                type:'line',
                data:[2.6, 5.9, 9.0, 26.4, 28.7, 70.7, 175.6, 182.2, 48.7, 18.8, 6.0, 2.3]
            },
            {
                name:'交易笔数',
                type:'line',
                yAxisIndex: 1,
                data:[2.0, 2.2, 3.3, 4.5, 6.3, 10.2, 20.3, 23.4, 23.0, 16.5, 12.0, 6.2]
            }
        ]*/
    };
                        

    require(
        [
            'echarts',
            'echarts/chart/line',
            'echarts/chart/bar'
        ],
        function (ec) {
            var myChart = ec.init(document.getElementById(mainId));
            myChart.setOption(option);

            var ecConfig = require('echarts/config');
            //alert(ecConfig); 
            var zrEvent = require('zrender/tool/event'); 
            myChart.on(ecConfig.EVENT.CLICK,function (param){ 
                //alert(JSON.stringify(param)+'点击任意节点显示饼图有技术问题');
                var this_name = seriesArr[param.seriesIndex].name,
                    this_data = seriesArr[param.seriesIndex].data[param.dataIndex],
                    this_time = categoryArr[param.dataIndex];

                if (param.seriesIndex=='0') {
                    var other_name = seriesArr[1].name,
                        other_data = seriesArr[1].data[param.dataIndex];
                }else{
                    var other_name = seriesArr[0].name,
                        other_data = seriesArr[0].data[param.dataIndex];
                }

                //alert('您点击的点的名称：'+this_name+'；数据：'+this_data+"\n"+'竖线对应的点名称：'+other_name+'；数据：'+other_data+"\n"+'时间是：'+this_time+'；UID是：'+ userid);


                click_pie(this_time);

                
            });

        }
    )

}



//绘图 力导向

/*var seriesNodes,
    seriesLinks,
    categoriesArr,
    categoryapiLegendArr;*/

function forceOption(categoryapiLegendArr, categoriesArr, seriesNodes, seriesLinks){


    var option = {
        title : {
            text: '力导向图demo',
            subtext: '数据来自杜撰',
            sublink: "http://www.miningdata.com.cn/",
            x:'right',
            y:'bottom'
        },
        tooltip : {
            trigger: 'item',
            formatter: '{a} : {b} 点击查看客户信息<br/> (节点权重:{c})<br/>',
            /*formatter:function(a){
               var relVal = JSON.stringify(a);
               
               return relVal;
            },*/
            islandFormatter : '{a} <br/> {b} : {c}'
        },
        //右上角工具，还原force、保存图表
        toolbox: {
            show : true,
            feature : {
                restore : {show: true},
                magicType: {
                    show: true,
                    type: ['force', 'chord'],
                    option: {
                        chord: {
                            minRadius : 2,
                            maxRadius : 10,
                            ribbonType: false,
                            itemStyle: {
                                normal: {
                                    label: {
                                        show: true,
                                        rotate: true
                                    },
                                    chordStyle: {
                                        opacity: 0.2
                                    }
                                }
                            }
                        },
                        force: {
                            minRadius : 5,
                            maxRadius : 8,
                            itemStyle : {
                                normal : {
                                    label: {
                                        show: false
                                    },
                                    linkStyle : {
                                        opacity : 0.5
                                    }
                                }
                            }
                        }
                    }
                },
                saveAsImage : {show: true}
            }
        },
        //php curl
        legend:categoryapiLegendArr,

        isShowScrollBar:false,
        series: [
            {
                type:'kforce',
                // php curl
                categories : categoriesArr,
                itemStyle: {
                    normal: {
                        label: {
                            show: true,
                            textStyle: {
                                color: 'rgba(255,215,0,0)'
                            }
                        },
                        nodeStyle : {
                            brushType : 'both',
                            strokeColor : 'rgba(255,215,0,0.8)',
                            lineWidth : 2
                        }
                    },emphasis:{
                        linkStyle : { 
                        	strokeColor : '#5182AB'
                        }
                    }
                },
                minRadius : 15,
                maxRadius : 25,
                density : 0.8,
                attractiveness: 0.8,
                //ajax
                nodes:seriesNodes,
                links:seriesLinks,
            }
        ]
    };


    //ajax 加载数据完成 绘制开始
	require_EC();

	function require_EC () {
		require(
		    [
		        'echarts',
		        //载入force模块
		        'echarts/chart/kforce'
		    ],
		    function (ec) {
		    	//确定需要绘制的DOM
		        setChats(ec);
		    }
		)
	}

	function setChats (ec) {
		var myChart = ec.init(document.getElementById('main'));
		// 过渡---------------------
		myChart.showLoading({
		    text: '正在玩命加载中...',
		});
		myChart.setOption(option);
	}

}



//饼图
function pie_view(titleArr, categoryArr, seriesArr, mianId){


    option = {
        title : titleArr/*{
            text: '借记卡交易对手&交易量',
            subtext: '纯属虚构',
            x:'center'
        }*/,
        tooltip : {
            trigger: 'item',
            formatter: "{a} <br/>{b} : {c} ({d}%)"
        },
        legend: {
            orient : 'vertical',
            x : 'left',
            data: categoryArr
            //['直接访问','邮件营销','联盟广告','视频广告','搜索引擎']
        },
        toolbox: {
            show : true,
            feature : {
                mark : {show: true},
                dataView : {show: true, readOnly: false},
                magicType : {
                    show: true, 
                    type: ['pie', 'funnel'],
                    option: {
                        funnel: {
                            x: '25%',
                            width: '50%',
                            funnelAlign: 'left',
                            max: 1548
                        }
                    }
                },
                restore : {show: true},
                saveAsImage : {show: true}
            }
        },
        calculable : true,
        series : seriesArr/*[
            {
                name:'交易量',
                type:'pie',
                radius : '55%',
                center: ['50%', '60%'],
                data: [
                    {value:335, name:'直接访问'},
                    {value:310, name:'邮件营销'},
                    {value:234, name:'联盟广告'},
                    {value:135, name:'视频广告'},
                    {value:1548, name:'搜索引擎'}
                ]
            }
        ]*/
    };
                        
    require_EC();

    function require_EC () {
        require(
            [
                'echarts',
                //载入force模块
                'echarts/chart/pie',
                //'echarts/chart/funnel'
            ],
            function (ec) {
                //确定需要绘制的DOM
                setChats(ec);
            }
        )
    }

    function setChats (ec) {
        var myChart = ec.init(document.getElementById(mianId));
        // 过渡---------------------
        myChart.showLoading({
            text: '正在玩命加载中...',
        });
        myChart.setOption(option);
    }

}