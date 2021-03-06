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
    <link href="./Public/Admin/Flat/docs/assets/css/demo.css" rel="stylesheet">
    <link rel="shortcut icon" href="./Public/Admin/Flat/img/favicon.ico">
    <!-- HTML5 shim, for IE6-8 support of HTML5 elements. All other JS at the end of file. -->
    <!--[if lt IE 9]>
    <script src="./Public/Admin/dist/js/vendor/html5shiv.js"></script>
    <script src="./Public/Admin/dist/js/vendor/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<span class="label label-info">货品列表</span>
<a href="javascript:history.go(-1)" class="btn btn-primary btn-lg active" role="button">返回上一页</a>
<a  class="btn btn-success"  href="<?php echo U('Darling/add',array('gid'=>Q('get.gid',0,'intval')))?>">添加货品</a>
<table class="table table-hover">
    <tr class="active">
        <th width="120">货品ID</th>
        <th width="120">货号</th>
        <th width="120">库存</th>
        <?php foreach ($tname as $n){?>
     <th><?php echo $n?></th>
        <?php }?>
        <th>操作</th>
    </tr>
    <?php foreach ($data as $v){?>
    <tr>

        <td><?php echo $v['did']?></td>
        <td><?php echo $v['dno']?></td>
        <td><?php echo $v['dstock']?></td>
        <?php foreach ($v['group'] as $vv){?>
        <td><?php echo $vv?></td>
        <?php }?>

        <td>
            <a href="<?php echo U('edit',array('did'=>$v['did']))?>" class="btn btn-sm btn-warning">编辑</a>
            <a href="javascript:if(confirm('确定删除吗?')) location.href='<?php echo U('del',array('did'=>$v['did']))?>;'" class="btn btn-sm btn-danger">删除</a>
        </td>
    </tr>
    <?php }?>
</table>
<!--	分页-->
<style type="text/css">
    #self-page ul.pagination li{
        background: #ccc;
        margin-left: 3px;
    }
</style>
<center id="self-page">
    <ul class="pagination">
        <?php echo $page?>
    </ul>
</center>
</body>
</html>


