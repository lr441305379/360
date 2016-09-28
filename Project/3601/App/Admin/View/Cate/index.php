<?php
/**
 * author:万玉涛
 * address:441305379@qq.com
 * 2016/8/14 17:04
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
<span class="label label-info">分类列表</span>
<table class="table table-hover">
    <tr class="active">
        <th width="30">cid</th>
        <th>分类名称</th>
        <th>类型</th>
        <th>排序</th>
        <th width="300">操作</th>
    </tr>
    {{foreach from = "$data" value = "$v"}}
    <tr>
        <td>{{$v['cid']}}</td>
        <td>{{$v['_name']}}</td>
        <td>{{$v['tname']}}</td>
        <td>{{$v['csort']}}</td>
        <td>
            <a href="{{U('addSon',array('cid'=>$v['cid']))}}" class="btn btn-primary"> 添加子分类 </a>
            <a href="{{U('edit',array('cid'=>$v['cid']))}}" class="btn btn-sm btn-warning">编辑</a>
            <a href="javascript:if(confirm('确定删除吗?')) location.href='{{U('del',array('cid'=>$v['cid']))}};'" class="btn btn-sm btn-danger">删除</a>
        </td>
    </tr>
    {{endforeach}}
</table>
<!--	分页-->
<!--<style type="text/css">-->
<!--    #self-page ul.pagination li{-->
<!--        background: #ccc;-->
<!--        margin-left: 3px;-->
<!--    }-->
<!--</style>-->
<!--<center id="self-page">-->
<!--    <ul class="pagination">-->
<!--        {{$page}}-->
<!--    </ul>-->
<!--</center>-->
</body>
</html>
