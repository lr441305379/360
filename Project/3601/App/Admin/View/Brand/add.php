<?php
/**
 * author:万玉涛
 * address:441305379@qq.com
 * 2016/8/15 9:40
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
    <!--载入百度编辑器-->
    <script type="text/javascript" charset="utf-8" src="./Public/Admin/ueditor1_4_3/ueditor.config.js"></script>
    <script type="text/javascript" charset="utf-8" src="./Public/Admin/ueditor1_4_3/ueditor.all.min.js"> </script>
    <script type="text/javascript" charset="utf-8" src="./Public/Admin/ueditor1_4_3/lang/zh-cn/zh-cn.js"></script>
</head>
<body>
<form action="" method="post" enctype="multipart/form-data">
    <a href="javascript:history.go(-1)" class="btn btn-primary btn-lg active" role="button">返回上一页</a>
    <div class="alert alert-success">添加品牌</div>
    <div class="form-group">
        <label for="exampleInputEmail1">品牌名称</label>
        <input id="exampleInputEmail1" class="form-control" type="text" placeholder=""  name="bname">
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">品牌LOGO</label>
        <input id="exampleInputEmail1" type="file"  name="blogo">
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">品牌排序</label>
        <input id="exampleInputEmail1" class="form-control" type="text" placeholder="" required="" name="bsort" value="100">
    </div>
    <div id="">
        <label for="">是否热门</label>
        <br />
        <label class="checkbox checkbox-inline" for="">
            <input type="radio" name="bis_hot" value="0">不热门
            <input type="radio" name="bis_hot" value="1">热门
        </label>

    </div>
    <button class="btn btn-primary btn-block" type="submit"> 确定 </button>
</form>
</body>
</html>

