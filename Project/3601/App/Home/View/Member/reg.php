<?php
/**
 * author:万玉涛
 * address:441305379@qq.com
 * 2016/8/24 14:41
 */
header("Content-type: text/html; charset=utf-8");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>注册页面</title>
    <link rel="stylesheet" href="./Public/Home/css/reg.css">
    <link rel="stylesheet" href="./Public/Home/login/font.css">
    <script src="./Public/Home/js/jquery-2.0.3.min.js"></script>
    <script src="./Public/hdjs/hdjs.min.js" type="text/javascript" charset="utf-8"></script>
    <link rel="stylesheet" href="./Public/hdjs/hdjs.css">
</head>
<body>
<div id="top">
    <div class="top_l">

        <a href="{{U('Index/index')}}" title="返回首页"><img src="./Public/Home/images/logo.jpg" alt=""></a>
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
                    <h3>360商城</h3>
                </div>
                <div class="login_rtr">
                    <a href="{{U('login')}}">登录</a>
                </div>

            </div>
            <form onsubmit="return hd_submit(this,'{{U('reg')}}','{{U('login')}}')">
                <div class="login_rt1">
                    <input id="ucount" type="text" name="username" placeholder="用户名">
                    <span class="count"></span>
                </div>

                <div class="login_rt1">

                    <input type="text" name="password" placeholder="密码">

                </div>

                <div class="login_rt1" style="width:200px;float: left;">
                    <input type="text" id="code" class="ucount" placeholder="验证码" name="code" style="width:193px;">
                    <span class="code"></span>

                </div>
                <img id="change" style="margin-left:5px;" src="{{U('code')}}&ran=1" alt=""><a style="font-size: 14px;" href="javascript:;" onclick="a()">看不清换一张</a>
                <div class="login_rc2">
                    <input type="submit" value="立即注册">
                </div>


            </form>
        </div>

    </div>
</div>
</body>
<script>
    function a(){
        var b=document.getElementById('change');
        b.src="{{U('code')}}&ran="+Math.random();
    }
    $("#change").click(function () {
        $(this).attr('src',"{{U('code')}}&ran="+Math.random());

    })
</script>

</html>






