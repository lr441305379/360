<?php
/**
 * author:万玉涛
 * address:441305379@qq.com
 * 2016/8/12 17:43
 */
header("Content-type: text/html; charset=utf-8");
?>

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
<form action="" method="post">
    <a href="javascript:history.go(-1)" class="btn btn-primary btn-lg active" role="button">返回上一页</a>
    <div class="alert alert-success">编辑属性</div>
    <div class="form-group">
        <label for="exampleInputEmail1">属性名称</label>
        <input id="exampleInputEmail1" class="form-control" type="text" placeholder=""  name="tpname" value="<?php echo $data['tpname']?>">
    </div>
    <div id="">
        <label for="">属性类别</label>
        <br />
        <label class="checkbox checkbox-inline" for="">
            <input type="radio" name="tptype" value="0" <?php if($data['tptype']==0){?>
                 checked 
               <?php }?>>属性
            <input type="radio" name="tptype" value="1" <?php if($data['tptype']==1){?>
                 checked 
               <?php }?>>规格
        </label>

    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">属性值</label>
        <textarea name="tpvalue" rows="5" cols=""  class="form-control" placeholder="请输入属性值按照逗号分开"><?php echo $data['tpvalue']?></textarea>
    </div>
    <input type="hidden" name="tpid" value="<?php echo $_GET['tpid']?>">
    <button class="btn btn-primary btn-block" type="submit"> 确定 </button>
</form>
</body>
</html>


