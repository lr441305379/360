<?php
/**
 * author:万玉涛
 * address:441305379@qq.com
 * 2016/8/15 9:39
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
<span class="label label-info">品牌列表</span>
<table class="table table-hover">
    <tr class="active">
        <th width="120">品牌ID</th>
        <th>品牌名称</th>
        <th>LOGO</th>
        <th>排序</th>
        <th>是否热门</th>
        <th width="300">操作</th>
    </tr>
    <?php foreach ($data as $v){?>
    <tr>
        <td><?php echo $v['bid']?></td>
        <td><?php echo $v['bname']?></td>
        <td><img src="<?php echo $v['blogo']?>" alt=""></td>
        <td><?php echo $v['bsort']?></td>

        <td><?php if($v['bis_hot']==0 ){?>
                否<?php }else{?>是
               <?php }?>

          </td>
        <td>
            <a href="<?php echo U('edit',array('bid'=>$v['bid']))?>" class="btn btn-sm btn-warning">编辑</a>
            <a href="javascript:if(confirm('确定删除吗?')) location.href='<?php echo U('del',array('bid'=>$v['bid']))?>;'" class="btn btn-sm btn-danger">删除</a>
        </td>
    </tr>
    <?php }?>
</table>
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

<!--<img src="<?php echo $oldData['thumb']?>"/>-->
<!--<input type="hidden" name="thumb" value="<?php echo $oldData['thumb']?>"/>-->
</body>
</html>

