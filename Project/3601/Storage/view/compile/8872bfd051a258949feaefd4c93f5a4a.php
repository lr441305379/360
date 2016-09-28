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
    <div class="alert alert-success">编辑货品</div>
    <span class="label label-info">基本信息</span>
    <a href="javascript:history.go(-1)" class="btn btn-primary btn-lg active" role="button">返回上一页</a>

    <?php foreach ($newdata as $k=>$v){?>
    <div class="form-group">
        <label for="exampleInputEmail1"><?php echo $k?></label>
        <select name="tid[]" class="form-control" id="">
            <option value="" >请选择</option>
            <?php foreach ($v as $t=>$vv){?>
            <?php foreach ($vv as $tt=>$vvv){?>
            <option value="<?php echo $tt?>"  <?php if(in_array($tt,$group)){?>
                selected
               <?php }?>  ><?php echo $vvv?></option>
            <?php }?>
            <?php }?>
        </select>


    </div>
    <?php }?>


    <div class="form-group">
        <label for="exampleInputEmail1">库存</label>
        <input id="exampleInputEmail1" class="form-control" type="text" placeholder=""  name="dstock" value="<?php echo $oldData['dstock']?>">
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">货号</label>
        <input id="exampleInputEmail1"class="form-control"   name="dno" value="<?php echo $oldData['dno']?>">
    </div>
    <input type="hidden" value="<?php echo $oldData['shop_goods_gid']?>" name="shop_goods_gid">
    <input type="hidden" value="<?php echo $_GET['did']?>" name="did">
    <button class="btn btn-primary btn-block" type="submit"> 确定 </button>

</form>
</body>

</html>
