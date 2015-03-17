<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title></title>
</head>
<body>

<script>
var userid = window.location.search.split('=')[1];
document.title = userid + '的客户信息';
document.write('你查询了：' + userid);
</script>
</body>
</html>