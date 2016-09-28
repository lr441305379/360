<?php
/**
 * author:万玉涛
 * address:441305379@qq.com
 * 2016/8/18 10:07
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
    <!--    <link href="./Public/Admin/Flat/docs/assets/css/demo.css" rel="stylesheet">-->
    <link rel="shortcut icon" href="./Public/Admin/Flat/img/favicon.ico">

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements. All other JS at the end of file. -->
    <!--[if lt IE 9]>
    <script src="./Public/Admin/dist/js/vendor/html5shiv.js"></script>
    <script src="./Public/Admin/dist/js/vendor/respond.min.js"></script>

    <![endif]-->

</head>
<body>

<form action="" method="post">
    <div class="alert alert-success">添加货品</div>
    <span class="label label-info">基本信息</span>
    <a href="javascript:history.go(-1)" class="btn btn-primary btn-lg active" role="button">返回上一页</a>
    {{foreach from="$newdata" key="$k" value="$v"}}
    <div class="form-group">
        <label for="exampleInputEmail1">{{$k}}</label>
        <select name="tid[]" class="form-control" id="">
            <option value="" >请选择</option>
            {{foreach from="$v" key="$t" value="$vv"}}
            {{foreach from="$vv" key="$tt" value="$vvv"}}
<!--            <option value="{{$tt}}">{{$vvv}}</option>-->
            <option value="{{$tt}}">{{$vvv}}</option>
            {{endforeach}}
            {{endforeach}}
        </select>


    </div>
    {{endforeach}}

    <div class="form-group">
        <label for="exampleInputEmail1">库存</label>
        <input id="exampleInputEmail1" class="form-control" type="text" placeholder=""  name="dstock">
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">货号</label>
        <input id="exampleInputEmail1"class="form-control"   name="dno">
    </div>
    <input type="hidden" value="{{$_GET['gid']}}" name="shop_goods_gid">
    
    <button class="btn btn-primary btn-block" type="submit"> 确定 </button>

</form>
</body>

</html>
