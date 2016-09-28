<?php
$topCate=new \Common\Model\Cate();
$topCate=$topCate->where('pid=0')->orderBy('csort','DESC')->get();
//购物车
if(isset($_SESSION['cart'])){
    $shopcar=$_SESSION['cart'];
    $goods=$_SESSION['cart']['goods'];
    View::with('goods',$goods);
    View::with('shopcar',$shopcar);
}else{
    View::with('shopcar',[]);

}





//购物车

?>
<script>
    $('div.shopcar').click(function () {
        $.ajax({
            type:'get',
            url:"<?php echo U('Content/checkU')?>",
            dataType:'json',
            success:function(phpData){
                if(phpData){
                }else{
                    location.href="<?php echo U('Member/Login')?>";
                }
            }
        })
    })

    $('div.shopcar a').click(function () {
        alert(1);
        $.ajax({
            type:'get',
            url:"<?php echo U('Content/checkU')?>",
            dataType:'json',
            success:function(phpData){
                if(phpData){
                }else{
                    location.href="<?php echo U('Member/Login')?>";
                }
            }
        })
    })

    //搜索功能



</script>
<div id="top">

    <div class="top1">
<?php if(isset($_SESSION['in'])){?>
                <span class="user" style="color:white;line-height: 35px">欢迎您,<?php echo $_SESSION['in']['username']?></span>
        <a href="<?php echo U('Member/out')?>" style="color:white">退出</a>
        <span class="myorder"><a href="<?php echo U('Member/member')?>">我的订单</a></span>


        <?php }else{?>
        <span class="login"><a href="<?php echo U('Member/login')?>" target="_blank">登录</a></span>
        <span class="reg"><a href="<?php echo U('Member/reg')?>" target="_blank">注册</a></span>


               <?php }?>
        <p><a href="<?php echo U('Index/index')?>" style="color:whitesmoke">欢迎来到360商城</a></p>

    </div>


</div>


<!--搜索栏区域-->

<div id="search">

    <div class="search1">

        <!--logo图片-->

        <div class="logo">

            <a href="<?php echo U('Index/index')?>" target="_blank">
                <img src="./Public/Home/images/logo.jpg" alt=""/>
            </a>

        </div>

        <!--输入框-->

        <div class="searchright">

            <form action="<?php echo U('Cate/index')?>" method="post">

                <input type="text" class="text" placeholder="360智能摄像机" name="sou"/>
                <input type="submit" value=""	 class="smt"/>
            </form>

            <!--购物车-->

            <div class="box">

                <div class="shopcar">
                    <a href="<?php echo U('Shopcar/index')?>" target="_blank" class="car">购物车
                        (<?php if(isset($_SESSION['cart'])){?>
                <?php echo $_SESSION['cart']['total_rows']?>
                        <?php }else{?>0
               <?php }?>)</a>


                </div>

                <div class="hidden">
                    <?php if(isset($_SESSION['in'])){?>
                
                    <?php if(!empty($_SESSION['cart'])){?>
                

                    <?php foreach ($goods as $v){?>
                    <div class="top">
                        <img src="<?php echo $v['glistimg']?>" alt="" style="width: 60px; height: 60px;">
                        <span><?php echo $v['name']?></span>
                        <b>￥<?php echo $v['price']?>.00</b>
                        <i style="margin-left: 10px;cursor: pointer">X</i>

                    </div>
                    <?php }?>
                    <div class="bottom">

                        <span>共<?php echo $_SESSION['cart']['total_rows']?>件商品&nbsp</span><span> 总计：¥<?php echo $_SESSION['cart']['total']?></span>

                        <a href="<?php echo U('Shopcar/index')?>">去购物车</a>

                    </div>


                    <?php }else{?>
                    <span class="user" style="    color: #666;padding: 40px 0;text-align: center;line-height: 100px;">
                        您的购物车还没有商品，赶紧去选购吧！
                    </span>

                    
               <?php }?>



                    <?php }else{?>


                    <span style="line-height: 100px;">请</span> <a href="<?php echo U('Member/login')?>" target="_blank">登录</a> <span style="line-height: 100px;">后查看您的购物车</span>




                    
               <?php }?>

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

            <a href="<?php echo U('Cate/index')?>" target="_blank">全部智能酷品</a>

        </div>

        <div class="right">
            <ul>
                <?php foreach ($topCate as $v){?>
                <li>
                    <a href="<?php echo U('Cate/index',['cid'=>$v['cid']])?>" target="_blank"><?php echo $v['cname']?></a>
                </li>
                <?php }?>

            </ul>


        </div>



    </div>

    </div>
