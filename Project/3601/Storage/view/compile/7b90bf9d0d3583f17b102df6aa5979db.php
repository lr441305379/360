<?php
/**
 * author:万玉涛
 * address:441305379@qq.com
 * 2016/8/12 16:59
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
<span class="label label-success">属性列表</span>
<a href="javascript:history.go(-1)" class="btn btn-primary btn-lg active" role="button">返回上一页</a>
<table class="table table-hover">
    <tr class="active">
        <th width="120">属性ID</th>
        <th width="120">属性名称</th>
        <th width="120">属性类别</th>
        <th width="900">属性值</th>
        <th >操作</th>
    </tr>
    <?php foreach ($data as $v){?>
    <tr>
        <td><?php echo $v['tpid']?></td>
        <td><?php echo $v['tpname']?></td>
        <td><?php if($v['tptype']==0){?>
                属性<?php }else{?>规格
               <?php }?></td>
        <td><?php echo $v['tpvalue']?></td>
        <td>
            <a href="<?php echo U('edit',array('tpid'=>$v['tpid']))?>" class="btn btn-sm btn-warning">编辑</a>
            <a href="javascript:if(confirm('确定删除吗?')) location.href='<?php echo U('del',array('tpid'=>$v['tpid']))?>';" class="btn btn-sm btn-danger">删除</a>
        </td>

    </tr>
    <?php }?>
    


    <a  class="btn btn-success"  href="<?php echo U('Type_pp/add',array('shop_type_tid'=>Q('get.tid',0,'intval')))?>">添加属性</a>


</table>
<!--<style type="text/css">-->
<!--    #self-page ul.pagination li{-->
<!--        background: #ccc;-->
<!--        margin-left: 3px;-->
<!--    }-->
<!--</style>-->
<!--<center id="self-page">-->
<!--    <ul class="pagination">-->
<!--        <?php echo $page?>-->
<!--    </ul>-->
<!--</center>-->
</body>
</html>

