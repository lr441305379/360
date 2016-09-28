<?php
/**
 * author:万玉涛
 * address:441305379@qq.com
 * 2016/8/12 15:28
 */
header("Content-type: text/html; charset=utf-8");
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title></title>
    <meta name="viewport" content="width=1000, initial-scale=1.0, maximum-scale=1.0">
    <!-- Loading Bootstrap -->
    <link href="./Public/Admin/Flat/dist/css/vendor/bootstrap.min.css" rel="stylesheet">
    <!-- Loading Flat UI -->
    <link href="./Public/Admin/Flat/dist/css/flat-ui.css" rel="stylesheet">
    <link href="./Public/Admin/Flat/docs/assets/css/demo.css" rel="stylesheet">
    <link rel="shortcut icon" href="./Public/Admin/Flat/img/favicon.ico">
    <!-- HTML5 shim, for IE6-8 support of HTML5 elements. All other JS at the end of file. -->
    <!--[if lt IE 9]>
    <script src="./Public/Admin/dist/js/vendor/html5shiv.js"></script>
    <script src="./Public/Admin/dist/js/vendor/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<form action="" method="post">
   
    <div class="alert alert-success">添加类型</div>
    <div class="form-group">
        <label for="exampleInputEmail1">类型</label>
        <textarea name="tname" rows="5" cols=""  class="form-control" placeholder="请输入类型按照逗号分开"></textarea>
    </div>
    <button class="btn btn-primary btn-block" type="submit"> 确定 </button>
</form>
</body>
</html>

