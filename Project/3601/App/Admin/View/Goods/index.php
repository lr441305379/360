<?php
/**
 * author:万玉涛
 * address:441305379@qq.com
 * 2016/8/15 18:01
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
<span class="label label-info">商品列表</span>
<table class="table table-hover">
    <tr class="active">
        <th width="120">商品ID</th>
        <th width="360">商品名称</th>
        <th width="120">所属类型</th>
        <th width="120">所属分类</th>
        <th width="120">所属品牌</th>
        <th width="160">货号</th>
        <th width="160">市场价</th>
        <th width="160">商城价</th>
        <th width="160">点击次数</th>
        <th width="160">库存量</th>
        <th  width="160">添加时间</th>
        <th width="100">添加人ID</th>
        <th width="360">操作</th>
    </tr>
    {{foreach from = "$data" value = "$v"}}
    <tr>
        <td>{{$v['gid']}}</td>
        <td>{{$v['gname']}}</td>
        <td>{{$v['tname']}}</td>
        <td>{{$v['cname']}}</td>
        <td>{{$v['bname']}}</td>
        <td>{{$v['gno']}}</td>
        <td>{{$v['gmprice']}}元</td>
        <td>{{$v['gprice']}}元</td>
        <td>{{$v['gclick']}}次</td>
        <th>{{$v['gstock']}}</th>
        <td>{{date("Y/m/d H:m:i",$v['gsendtime'])}}</td>
        <td>{{$v['shop_adminuser_id']}}</td>
        <td>
            <a href="{{U('Darling/index',array('gid'=>$v['gid']))}}" class="btn btn-primary"> 货品列表 </a>
            <a href="{{U('edit',array('gid'=>$v['gid']))}}" class="btn btn-sm btn-warning">编辑</a>
            <a href="javascript:if(confirm('确定删除吗?')) location.href='{{U('del',array('gid'=>$v['gid']))}};'" class="btn btn-sm btn-danger">删除</a>
        </td>
    </tr>
    {{endforeach}}
</table>
<style type="text/css">
    #self-page ul.pagination li{
        background: #ccc;
        margin-left: 3px;
    }
</style>
<center id="self-page">
    <ul class="pagination">
        {{$page}}
    </ul>
</center>
</body>
</html>

