<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>购物车页</title>
    <!--<link rel="stylesheet" href="./css/Common.css">-->
    <link rel="stylesheet" href="./Public/Home/css/Common.css">
    <link rel="stylesheet" href="./Public/Home/css/shopcar.css">
    <style>
        .empty{
            margin-top: 3px;
            text-align: center;
        }
        h3{
            border-bottom: 1px solid #DDDDDD;
        }
        .empty img{
            margin: 0 auto;
        }
        .r{
            text-align: right;
        }
        .r{
            text-align: left;
        }
       ..list .title .p{
            width: 200px;
        }
        #my_car .list ul .xj {
            text-align: right;
            width: 155px;
        }
        #my_car .list ul .del{
            text-align: center;
        }
        #my_car .list ul li{
            width: 240px;
        }
        #my_car .list ul .pr{
            margin-right: 50px;
        }
        .gg p{
            font-size:10px;
            width: 200px;
            height: 18px;
            line-height: 1px;

        }
        #my_car .list .title ul li.gg{
            width: 180px;
        }
        #my_car .list .title ul li.p span{
            width: 280px;
            margin-right: 50px;

        }
        #my_car .car_list .title #bt{
            width: 135px;
        }
        #my_car .list .title ul li.xj{

        }
        #my_car .list .title ul li.p{
            width: 260px;
        }
        #my_car .car_list  .title li#bt.ri{
            width: 165px;
        }

    </style>

    <script src="./Public/Home/js/jquery-2.0.3.min.js"></script>
    <script>
        $(function(){
//            total();
            $(".add").click(function(){
                var t=$(this).parent().find('input[class*=text_box]');
                if(parseInt(t.val())<6){
                    t.val(parseInt(t.val())+1);
                }
                var sid=$(this).attr('sid');
//                console.log(sid);
                var price=parseInt($(this).siblings('.pr').text());
                var num=parseInt($(this).siblings('.text_box').val());
                var p1=price*num;
                $(this).parent().next().children('span').text(p1);
//                total();
                var s=0;
                $(".title .p").each(function(){
                    var a=parseInt($(this).find('.text_box').val());
                    var b=parseFloat($(this).find('.pr').text());
                    s+=a*b;
                })
                $(".total").html(s.toFixed(2));//显示
                //异步编辑购物车
                $.ajax({
                    type:'post',//传送方式
                    url:"<?php echo U('Shopcar/edit')?>",//传送地址
                    data:{num:num,p1:p1,s:s,sid:sid},//传送的数据
                    dataType:'json',//返回数据类型
                    success:function(phpData){


                    }
                })
                

            })
            $(".cut").click(function(){
                var t=$(this).parent().find('input[class*=text_box]')
                t.val(parseInt(t.val())-1);
                 sid=$(this).attr('sid');
                if(parseInt(t.val())<1){
                    if(confirm('确定删除吗?')){
                        location.href="<?php echo U('del')?>"+'&sid='+sid;
                    }

                }
                if(parseInt(t.val())<0){
                    t.val(0);

                }
                var sid=$(this).attr('sid');
                var price=parseInt($(this).siblings('.pr').text());
                var num=parseInt($(this).siblings('.text_box').val());
                var p1=price*num;
                $(this).parent().next().children('span').text(p1);
//                total();
                var s=0;
                $(".title .p").each(function(){
                    var a=parseInt($(this).find('.text_box').val());
                    var b=parseFloat($(this).find('.pr').text());
                    s+=a*b;
                })
                $(".total").html(s.toFixed(2));//显示
                //异步编辑购物车
                $.ajax({
                    type:'post',//传送方式
                    url:"<?php echo U('Shopcar/edit')?>",//传送地址
                    data:{num:num,p1:p1,s:s,sid:sid},//传送的数据
                    dataType:'json',//返回数据类型
                    success:function(phpData){


                    }
                })

            })
//            function total(){
//                var s=0;
//                $(".title .p").each(function(){
//                    var a=parseInt($(this).find('.text_box').val());
//                    var b=parseFloat($(this).find('.pr').text());
//                    s+=a*b;
//                })
//                $(".total").html(s.toFixed(2));//显示
//
//            }

            //异步删除
//            $("#del").click(function () {
//                var sid=$(this).attr('sid');
//                console.log(sid);
//                $.ajax({
//                    type:'post',
//                    url:"<?php echo U('Shopcar/del')?>",
//                    data:{sid:sid},
//                    dataType:'json',
//                    success:function(phpData){
//
//                    }
//                })
//
//
//            })


        })
    </script>
</head>
<body>

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
                        (                0                        )</a>


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
<script>
    $(".shopdel").click(function () {
        var sid=$(this).attr('sid');
        location.href="http://localhost/Project/3601/index.php?m=Home&c=Shopcar&a=del"+'&sid='+sid;

    })
    </script>


<div id="my_car">
    <div class="car">
        <h3>我的购物车</h3>
    </div>
    <?php if(!empty($_SESSION['cart']['goods'])){?>
                


    <div class="car_list">
        <div class="title">
            <ul>
                <li class="lit">商品信息</li>
                <li class="yanse">规格</li>
                <li class="ri" id="bt">单价</li>
                <li class="r">数量</li>
                <li class="r">小计</li>
                <li class="r">操作</li>
            </ul>
        </div>
    </div>
<?php foreach ($goods as $k=>$v){?>
    <!--遍历整个div-->
    <div class="list">
        <div class="title">
            <ul>
                <li class="lit">
                    <a href="" title=""><?php echo $v['name']?></a>
                    <div class="img">
                        <img src="./<?php echo $v['glistimg']?>" alt="" >
                    </div>

                </li>

                <li class="gg">
                   <?php foreach ($v['options'] as $n=>$vv){?>
                 <p><?php echo $n?>:<?php echo $vv?></p>
                   <?php }?>
                </li>
                <li class="p">
                    <span class="pr"><?php echo $v['price']?>元</span>
                    <input class="cut" name="" type="button" value="-" sid="<?php echo $k?>"/>
                    <input id='t' class="text_box" name="" type="text" value="<?php echo $v['num']?>" />
                    <input class="add" name="" type="button" value="+"  sid="<?php echo $k?>" />
                </li>
                <li class="xj"><span class="to"><?php echo $v['total']?></span>元</li>
                <li class="del"><a href="javascript:if(confirm('确定删除吗?')) location.href='<?php echo U('del',array('sid'=>$k))?>';"  title=""  id="del">删除</a></li>
            </ul>
        </div>

    </div>

    <?php }?>

    <!--     商品价格总计 -->
    <div class="count">
        <div class="money">
            <p>商品总计:<span class="total"><?php echo $shopcar['total']?></span>元</p>
        </div>
        <div class="btn">
            <a href="<?php echo U('Index/index')?>" class="b1" title="继续购物" data-monitor="shopcart_continueshop_click">继续购物</a>
            <a href="<?php echo U('Pay/index')?>" class="b2" title="去结算" data-monitor="shopcart_placeorder_click">去结算</a>
        </div>



    </div>


</div>
<?php }else{?>
<div class="empty">
    <img src="./Public/Home/images/empty.jpg" alt="">
</div>


    <!--//如果什么也没有加入购物车 ，不显示下面的-->

               <?php }?>






<!--公共底部开始-->

<div id="footer">


    <div class="ft">

        <p>360商城©2013-2016 360公司版权所有 京ICP备08010314号-43 京公网安备11000002000006号
            奇酷互联网络科技（深圳）有限公司 0755-61898999 深圳市南山区学苑大道1001号南山智园A2栋</p>

    </div>



</div>







<!--公共底部结束-->
<li class="si"></li>

</body>


</html>