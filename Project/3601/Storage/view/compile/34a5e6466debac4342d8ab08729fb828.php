<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title></title>
    <link rel="stylesheet" href="./Public/Home/css/Common.css">
    <link rel="stylesheet" href="./Public/Home/css/pay.css">
    <link rel="stylesheet" type="text/css" href="./Public/Home/css/order.css">
    <link rel="stylesheet" type="text/css" href="./Public/Home/css/iconfont.css">

</head>
<script>
    $('div.shopcar').click(function () {
        $.ajax({
            type:'get',
            url:"http://localhost/Project/3601/index.php?m=Home&c=Content&a=checkU",
            dataType:'json',
            success:function(phpData){
                if(phpData){
                }else{
                    location.href="http://localhost/Project/3601/index.php?m=Home&c=Member&a=Login";
                }
            }
        })
    })

    $('div.shopcar a').click(function () {
        alert(1);
        $.ajax({
            type:'get',
            url:"http://localhost/Project/3601/index.php?m=Home&c=Content&a=checkU",
            dataType:'json',
            success:function(phpData){
                if(phpData){
                }else{
                    location.href="http://localhost/Project/3601/index.php?m=Home&c=Member&a=Login";
                }
            }
        })
    })

    //搜索功能



</script>
<div id="top">

    <div class="top1">
                <span class="user" style="color:white;line-height: 35px">欢迎您,admin</span>
        <a href="http://localhost/Project/3601/index.php?m=Home&c=Member&a=out" style="color:white">退出</a>
        <span class="myorder"><a href="http://localhost/Project/3601/index.php?m=Home&c=Member&a=member">我的订单</a></span>


                <p><a href="http://localhost/Project/3601/index.php?m=Home&c=Index&a=index" style="color:whitesmoke">欢迎来到360商城</a></p>

    </div>


</div>


<!--搜索栏区域-->

<div id="search">

    <div class="search1">

        <!--logo图片-->

        <div class="logo">

            <a href="http://localhost/Project/3601/index.php?m=Home&c=Index&a=index" target="_blank">
                <img src="./Public/Home/images/logo.jpg" alt=""/>
            </a>

        </div>

        <!--输入框-->

        <div class="searchright">

            <form action="http://localhost/Project/3601/index.php?m=Home&c=Cate&a=index" method="post">

                <input type="text" class="text" placeholder="360智能摄像机" name="sou"/>
                <input type="submit" value=""	 class="smt"/>
            </form>

            <!--购物车-->

            <div class="box">

                <div class="shopcar">
                    <a href="http://localhost/Project/3601/index.php?m=Home&c=Shopcar&a=index" target="_blank" class="car">购物车
                        (0
               )</a>


                </div>

                <div class="hidden">
                                    
                                        <span class="user" style="    color: #666;padding: 40px 0;text-align: center;line-height: 100px;">
                        您的购物车还没有商品，赶紧去选购吧！
                    </span>

                    
               


                    
                </div>

            </div>

        </div>


    </div>


</div>



<!--顶部导航条-->


<div id="nav">

    <div class="mid">

        <!--左边区域-->

        <div class="left">

            <a href="http://localhost/Project/3601/index.php?m=Home&c=Cate&a=index" target="_blank">全部智能酷品</a>

        </div>

        <div class="right">
            <ul>
                                <li>
                    <a href="http://localhost/Project/3601/index.php?m=Home&c=Cate&a=index&cid=1" target="_blank">手机</a>
                </li>
                                <li>
                    <a href="http://localhost/Project/3601/index.php?m=Home&c=Cate&a=index&cid=7" target="_blank">智能穿戴</a>
                </li>
                                <li>
                    <a href="http://localhost/Project/3601/index.php?m=Home&c=Cate&a=index&cid=13" target="_blank">智能家居</a>
                </li>
                                <li>
                    <a href="http://localhost/Project/3601/index.php?m=Home&c=Cate&a=index&cid=19" target="_blank">智能车品</a>
                </li>
                                <li>
                    <a href="http://localhost/Project/3601/index.php?m=Home&c=Cate&a=index&cid=25" target="_blank">影音娱乐</a>
                </li>
                                <li>
                    <a href="http://localhost/Project/3601/index.php?m=Home&c=Cate&a=index&cid=31" target="_blank">电脑/游戏</a>
                </li>
                                <li>
                    <a href="http://localhost/Project/3601/index.php?m=Home&c=Cate&a=index&cid=37" target="_blank">无人机/机器人</a>
                </li>
                                <li>
                    <a href="http://localhost/Project/3601/index.php?m=Home&c=Cate&a=index&cid=42" target="_blank">母婴玩具</a>
                </li>
                
            </ul>


        </div>



    </div>

    </div>

<body style="background:#f9f9f9;">
<div class="payoff-z">
    <div class="payoff-z">
        <div class="payoff-ok"><i class="iconfont">&#xe63c;</i><span>支付中心</span></div>
        <div class="payoff">
            <div class="payoff-title">
                <div class="payoff-left"><i class="iconfont">&#xe615;</i></div>
                <div class="payoff-mid">
                    <div class="payoff-mid-order"  time="<?php echo $orderData['otime']?>">
                        <p>订单已提交,请在二小时内完成支付!<span>过期订单将被取消</span> <a href="<?php echo U('Member/member')?>">查看详细 </a></p>
                    </div>
                    <div class="payoff-mid-bot">
                        <span class="payoff-dd">订单编号: <?php echo $orderData['onumber']?></span>
                        <span class="djs" style="color:royalblue"></span>
                    </div>
                </div>

                <div class="payoff-right">
                    <p>支付金额</p>
                    <h5 >￥<?php echo $orderData['ototal']?>元</h5>
                </div>
            </div>

            <div class="payoff-style">
                <ul>
                    <li>
                        <span>扫一扫支付</span>
                        <img src="./Public/Home/images/qq.jpg"/>
                        <i class="iconfont">&#xe6ab;</i>
                    </li>

                    <li class="payoff-no">
                        <span class="wx">扫一扫支付</span>
                        <img src="./Public/Home/images/wx.png"/>
                        <i class="iconfont wx">&#xe60c;</i>
                    </li>
                </ul>

            </div>


            <a href="javascript:;" class="payoff-btn" oid="<?php echo $orderData['oid']?>">立即支付</a>
        </div>
    </div>




<div id="footer">


    <div class="ft">

        <p>360商城©2013-2016 360公司版权所有 京ICP备08010314号-43 京公网安备11000002000006号
            奇酷互联网络科技（深圳）有限公司 0755-61898999 深圳市南山区学苑大道1001号南山智园A2栋</p>

    </div>



</div>


</body>
<script src="./Public/Home/js/jquery-2.0.3.min.js"></script>
<script>
    var nowtime = (new Date).getTime();/*当前时间戳*/
    var timestamp=$(".payoff-mid-order").attr('time');
    /*转换时间，计算差值*/
    function comptime(beginTime,endTime){

        var secondNum = parseInt((endTime-beginTime*1000)/1000);//计算时间戳差值

        if(secondNum>=0&&secondNum<60){

            return secondNum+'秒前';

        }

        else if (secondNum>=60&&secondNum<3600){

            var nTime=parseInt(secondNum/60);

            return nTime+'分钟前';

        }

        else if (secondNum>=3600&&secondNum<3600*24){

            var nTime=parseInt(secondNum/3600);

            return nTime+'小时前';

        }

        else{

            var nTime = parseInt(secondNum/86400);

            return nTime+'天前';

        }

    }

    t = comptime(timestamp,nowtime);//timestamp为PHP通过ajax回传的时间戳
    $('.djs').html(t);

    //点击立即支付,将状态更改为已发货,扣除库存
    $('.payoff-btn').click(function(){
            var oid=$(this).attr('oid');
            $.ajax({
                type:'post',
                dataType:'json',
                data:{oid:oid},
                url:"<?php echo U('Pay/paid')?>",
                success:function(phpData){
                    if(phpData){
                        alert('支付成功');
                        location.href="<?php echo U('Member/member')?>"

                    }

                }
            })
        })
</script>
</html>
