
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
function alertHtml(info, title, message){
    $('.tips').append('<div class="alert '+info+'"><button type="button" class="close" data-dismiss="alert">×</button><strong>'+title+'</strong>'+message+'</div>');

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
            subtext: '数据来自杜撰2',
            sublink: "http://www.miningdata.com.cn/",
            x:'right',
            y:'bottom'
        },
        tooltip : {
            trigger: 'item',
            formatter: '{a} : {b} 点击查看客户信息<br/> (节点权重:{c}; 节点类目索引:{d})<br/>',
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
                                color: '#000000'
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

