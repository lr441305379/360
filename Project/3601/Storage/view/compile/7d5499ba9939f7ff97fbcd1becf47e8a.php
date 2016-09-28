<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>分类页面</title>
    <link rel="stylesheet" href="./Public/Home/css/Common.css">
    <link rel="stylesheet" href="./Public/Home/css/cate.css">
    <link rel="stylesheet" href="./Public/Home/css/shake.css" media="all">
    <script src="./Public/Home/js/jquery-2.0.3.min.js"></script>
</head>
<body>
<!--公共头部开始-->
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

<!--公共头部结束-->



<!--中间大区域开始-->

<!--点击搜索盒子开始-->

<div id="cate">

    <div class="list">

        <!--显示位置-->
        <div class="top">


            <!--首页>全部搜索结果 >智能家居(顶级分类) >家居办公(子分类) >插座(再分类) > 控客(品牌)  全部-->
            <!--用PHP输出当前点击的品牌还是用JS-->
            <a href="<?php echo U('Index/index')?>">首页</a>
            <a href="<?php echo U('Cate/index')?>">>全部搜索结果</a>



            <span>>全部</span>    <!--不遍历的-->


        </div>

        <!--显示位置结束-->


        <!--分类显示-->
        <!--如果选了品牌 品牌这个盒子消失-->

        <div class="bottom">

             <!--分类盒子-->
            <?php foreach ($name as $k=>$v){?>
            <?php
            $temp=$param;
            $temp[$k]=0;
//            p($temp)
            ?>



<!--            改样式-->

            <div class="cate">
                <ul>
                    <li>
                        <span><?php echo $v['name']?></span>
                        <a href="<?php echo U('index',['cid'=>$_GET['cid'],'param'=>implode('_',$temp)])?>" <?php if($param[$k]==0){?>
                class="hover"
               <?php }?>>不限</a>
                        <?php foreach ($v['value'] as $vv){?>
                        <?php
                        $temp[$k] = $vv['gpid'];
                        ?>
                        <a href="<?php echo U('index',['cid'=>$_GET['cid'],'param'=>implode('_',$temp)])?>" <?php if($vv['gpid']==$param[$k]){?>
                class="hover"
               <?php }?>  ><?php echo $vv['gpvalue']?></a>
                        <?php }?>

                    </li>
                </ul>

            </div>
            <?php }?>

        </div>


    </div>



</div>



<!--点击搜索盒子结束-->

<div id="show_data">
    <div class="show">
        <ul class="list">

            <!-- 图片部分 -->
<?php foreach ($data as $v){?>
            <a href="<?php echo U('Content/index',['gid'=>$v['gid']])?>" target="_blank" title="">
                <li class="li_item">
                    <div class="img">
                        <img src="./<?php echo $v['glistimg']?>" alt="" style="width: 180px;height: 180px" class="shake shake-opacity">
                    </div>

                    <div class="des">
                        <p class="p1"><?php echo $v['gname']?></p>
                        <p class="p2">￥<?php echo $v['gprice']?></p>
                    </div>
                </li>
            </a>
            <?php }?>

        </ul>
    </div>



<!--中间大区域结束-->









<!--公共底部开始-->

<div id="footer">

    <div class="ft">

        <p>360商城©2013-2016 360公司版权所有 京ICP备08010314号-43 京公网安备11000002000006号
            奇酷互联网络科技（深圳）有限公司 0755-61898999 深圳市南山区学苑大道1001号南山智园A2栋</p>

    </div>



</div>







<!--公共底部结束-->




</body>
</html>

</html>

