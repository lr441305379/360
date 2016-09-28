<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" href="./Public/Home/css/Common.css">
    <link rel="stylesheet" href="./Public/Home/css/member.css">
    <style>
   .dizhi{
       width: 620px;
       min-height: 300px;
       float:left;
   }
   .dizhi ul li{
       text-align: center;
       margin-bottom: 10px;
       border-bottom: 1px dashed #2B3335 ;
   }
        .caozuo{
            width:200px;
            min-height: 300px;

            float:left;
        }
        .caozuo ul li{
            text-align: center;
            margin-bottom:10px;
            border-bottom: 1px dashed #2B3335 ;
        }



    </style>
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


<div id="member">

    <!--中间区域-->
    <div class="box">

        <!--左边操作区域-->
        <div class="left">
            <h3>个人中心</h3>

            <ul>

                <a href="<?php echo U('Member/member')?>"><li> 我的订单</li></a>
                <a href="<?php echo U('Member/like')?>"><li>我的喜欢 </li></a>
                <a href="<?php echo U('Member/address')?>"><li> 送货地址</li></a>
                <a href="<?php echo U('Member/modify')?>"><li> 修改密码</li></a>

            </ul>


        </div>

        <!--右边显示区域-->
        <div class="right">
            <div class="tp">
                <h4>我的地址</h4>


            </div>

            <div class="md">
                <span class="s1">地址信息</span><span class="s4">操作</span>


            </div>

            <div class="dizhi">

                <ul>
                    <?php foreach ($arrAdd as $k=>$v){?>
                    <li class="a<?php echo $k?>"><?php echo $v?></li>
                    <?php }?>
                </ul>

            </div>

            <div class="caozuo">

                <ul>
                    <?php foreach ($arrAdd as $k=>$v){?>
                    <li key="<?php echo $k?>" class="b<?php echo $k?>"><a href="">删除</a> </li>
                    <?php }?>

                </ul>

            </div>


            </div>



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
<script src="./Public/Home/js/adr.js"></script>
<script>
$(function(){
    $('.caozuo a').click(function () {
        var k=$(this).parent().attr('key');
        $.ajax({
            type:'post',
            dateType:'json',
            url:"<?php echo U('adrDel')?>",
            data:{k:k},
            success:function(phpData){

            }
        })
        $('.a'+k).remove();
        $('.b'+k).remove();

    })
})

</script>
</html>
