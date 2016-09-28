<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>我的喜欢</title>
    <link rel="stylesheet" href="./Public/Home/css/Common.css">
    <link rel="stylesheet" href="./Public/Home/css/like.css">
</head>


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


<!--公共头部结束-->




<!--个人中心开始-->


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
            <div class="hd2">

               <div class="myLike">
                   <span >我的喜欢</span>

               </div>

                <div class="bottom">


                      <!--foreach-->
                    <?php foreach ($goodsData as $v){?>
                    <div class="img">

                        <img src="./<?php echo $v['glistimg']?>" alt="" style="width: 120px;height: 145px;">
                        <a href=""><p><?php echo $v['gname']?></p></a>
                        <p>￥<?php echo $v['gprice']?></p>
                        <div class="hd3">
                            <a href="javascript:if(confirm('确定取消吗?')) location.href='<?php echo U('Member/likeDel',array('gid'=>$v['gid']))?>';"  class="qx">取消</a>
<!--                            <a href="javascript:if(confirm('确定删除吗?')) location.href='<?php echo U('Member/likeDel',array('gid'=>$v['gid']))?>" class="qx">取消</a>-->
                            <a href="<?php echo U('Content/index',array('gid'=>$v['gid']))?>" class="join">加入购物车</a>

                        </div>


                    </div>
                    <?php }?>


<!--                    <div class="img">-->
<!---->
<!--                        <img src="./images/like.jpg" alt="">-->
<!--                        <a href=""><p>360巴迪龙儿童手表SE</p></a>-->
<!--                        <p>￥199</p>-->
<!--                        <div class="hd3">-->
<!---->
<!--                            <a href="" class="qx">取消</a>-->
<!---->
<!--                            <a href="" class="join">加入购物车</a>-->
<!---->
<!--                        </div>-->
<!---->
<!---->
<!--                    </div>-->




















                </div>
                <!--<button ><a href="#tr"></a>回到顶部</button>-->

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









<!--个人中心结束-->






<!--公共底部开始-->


<!--<div id="footer">-->

    <!--<div class="ft">-->

        <!--<p>360商城©2013-2016 360公司版权所有 京ICP备08010314号-43 京公网安备11000002000006号-->
            <!--奇酷互联网络科技（深圳）有限公司 0755-61898999 深圳市南山区学苑大道1001号南山智园A2栋</p>-->

    <!--</div>-->



<!--</div>-->







<!--公共底部结束-->

</body>
</html>