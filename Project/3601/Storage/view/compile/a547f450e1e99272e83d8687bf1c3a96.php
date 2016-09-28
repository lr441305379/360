<?php
/**
 * author:万玉涛
 * address:441305379@qq.com
 * 2016/8/14 17:22
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
    <a href="javascript:history.go(-1)" class="btn btn-primary btn-lg active" role="button">返回上一页</a>
    <div class="alert alert-success">编辑分类</div>
    <div class="form-group">
        <label for="exampleInputEmail1">分类</label>
        <textarea name="cname" rows="5" cols=""  class="form-control" placeholder="请输入分类按照逗号分开"><?php echo $oldData['cname']?></textarea>
    </div>

    <div class="form-group">
        <label for="exampleInputEmail1">所属分类</label>
        <select name="pid" class="form-control">
            <option value="0">顶级分类</option>
            <?php foreach ($cateData as $v){?>
            <option value="<?php echo $v['cid']?>"  <?php if($oldData['pid']==$v['cid']){?>
                selected
               <?php }?>  ><?php echo $v['_name']?></option>
            <?php }?>
        </select>
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">分类排序</label>
        <input id="exampleInputEmail1" class="form-control" type="text" placeholder="请输入分类排序" required="" name="csort" value="<?php echo $oldData['csort']?>">
    </div>
<!--    <input type="text" name="csort" value="<?php echo $oldData['csort']?>">-->
    <input type="hidden" name="cid" value="<?php echo $_GET['cid']?>">
    <button class="btn btn-primary btn-block" type="submit"> 确定 </button>
</form>
</body>
</html>
