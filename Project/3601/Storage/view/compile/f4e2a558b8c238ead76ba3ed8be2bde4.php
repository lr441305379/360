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
		<div class="alert alert-success" style="align-content: center">站点信息</div>
		<table class="table table-hover">
			<tr>
				<th colspan="100" style="text-align: center;">站点信息</th>
			</tr>

			<tr class="active">
			  <th>名称</th>
			  <th>值</th>
			  <th>描述</th>
			</tr>

			<?php foreach ($data as $v){?>
			<tr>
				<td><?php echo $v['name']?></td>
				<td>
					<input type="text" name="<?php echo $v['name']?>" id="" class="form-control" value="<?php echo $v['value']?>"/>
				</td>
				<td><?php echo $v['title']?></td>
			</tr>
			<?php }?>
		</table>
		<button class="btn btn-primary btn-block" type="submit"> 确定 </button>
	</form>

<!--//return array (-->
<!--//	'CODE_LEN' => '1',-->
<!--//	'CODE_COLOR' => '#14C2F0',-->
<!--//	'CODE_WD' => '100',-->
<!--//	'CODE_HT' => '56',-->
<!--//	'CODE_FONTSIZE' => '22',-->
<!--//	'CODE_FONT' => 'Public/7.ttf',-->
<!--//	'CODE_BG' => '#E8E8E8',-->
<!--//	'WEB_NAME' => '万玉涛的博客',-->
<!--//	'COPY_INFO' => 'Copyright © 2010-2015 houdunwang.com All Rights Reserved',-->
<!--//	'RECORD_NUMBER' => '京ICP备120668668号-6',-->
<!--//	'ADMIN_EMAIL' => '441305379@qq.com',-->
<!--//	'PAGE_CATE' => '6',-->
<!--//	'PAGE_ARC' => '3',-->
<!--//	'PAGE_TAG' => '6',-->
<!--//	'PAGE_RECYCLE' => '3',-->
<!--//	'PAGE_LINK' => '3',-->
<!--//);-->
	</body>
</html>

	</body>
</html>
