<?php
/**
 * author:万玉涛
 * address:441305379@qq.com
 * 2016/8/24 17:17
 */
header("Content-type: text/html; charset=utf-8");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>登录页面</title>
    <link rel="stylesheet" href="./Public/Home/css/reg.css">
    <link rel="stylesheet" href="./Public/Home/login/font.css">
    <script src="./Public/Home/js/jquery-2.0.3.min.js"></script>
    <script src="./Public/hdjs/hdjs.min.js" type="text/javascript" charset="utf-8"></script>
    <link rel="stylesheet" href="./Public/hdjs/hdjs.css">
    <style>
        #top{
            width: 100%;
            height: 50px;
            background: #E5E5E5;
            padding: 30px 0;
        }
    </style>
</head>
<body>
<!-- 头部 -->
<div id="top">
    <div class="top_l">
        <a href="<?php echo U('Index/index')?>" title="返回首页"><img src="./Public/Home/images/logo.jpg" alt=""></a>
    </div>
</div>
<div id="login">
    <div class="login">
        <div class="login_l">
            <img src="./Public/Home/images/mls17.jpg" alt="">
        </div>
        <div class="login_r">
            <div class="login_rt">
                <div class="login_rtl">
                    <h3>登录360商城</h3>
                </div>
                <div class="login_rtr">
                    <a href="<?php echo U('reg')?>">注册</a>
                </div>
            </div>
            <form onsubmit="return hd_submit(this,'<?php echo U('login')?>','<?php echo U('Index/index')?>')">
                <div class="login_rt1">

                    <input type="text" name="username" placeholder="用户名">
                </div>
                <div class="login_rt1">

                    <input type="password" name="password" placeholder="密码">
                </div>

                <div class="login_rt1" style="width:200px;float: left;">
                    <input type="text" placeholder="验证码" name="code" style="width:193px;">

                </div>
                <img id="change" style="margin-left:5px;" src="<?php echo U('code')?>&ran=1" alt="">
                <a href="javascript:;" onclick="a()">看不清换一张</a>

                <div class="login_rc2">
                    <input type="submit" value="立即登录">
                </div>
            </form>
        </div>

    </div>
</div>
</body>
<script>
    function a(){
        var b=document.getElementById('change');
        b.src="<?php echo U('code')?>&ran="+Math.random();
    }
    $("#change").click(function () {
        $(this).attr('src',"<?php echo U('code')?>&ran="+Math.random());

    })
</script>
</html>
