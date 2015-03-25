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
define('LOADING', '<img src="http://images.cnitblog.com/blog2015/531703/201503/241551310675303.gif">');
date_default_timezone_set("prc");  
$stringtime = date("Y-m-d H:i:s",time());
$Key = "aabbccdd";
$timespan = strtotime($stringtime);
$Sign = md5($timespan.$Key);

//include './include/api.php';
//phpexcel

 ?>

<script type="text/javascript">
	


//ajax
function ajaxForce (urlType, dom, data, callback) {

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
            }else if (dataList.code==1008) {
                
                alertHtml( dom, 'alert-info', '<b data-code="1008">用户不存在</b>', '请查询其他用户');

            }else{
                alertHtml( dom, 'alert-info', dataList.message, '错误代码：'+dataList.code);
            }
        },
        error: function(){
            alertHtml( dom, 'alert-error', '网络错误', '请检查您的网络是否能正确访问：<?=SEARVER_HOST ?>');
        }
    });
}





</script>
