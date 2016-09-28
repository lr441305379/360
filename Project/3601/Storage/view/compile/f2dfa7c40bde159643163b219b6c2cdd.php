<?php
/**
 * author:万玉涛
 * address:441305379@qq.com
 * 2016/8/29 17:33
 */
//header("Content-type: text/html; charset=utf-8");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" href="./Public/Home/css/Common.css">
    <link rel="stylesheet" href="./Public/Home/css/pay.css">
    <style>
        #my_car .city{
            text-align: right;
            margin-right:30px;
        }
        #my_car .line{
            text-align: right;
            margin-right:30px;
        }

    </style>
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
                        (                1                        )</a>


                </div>

                <div class="hidden">
                                    
                                    

                                        <div class="top">
                        <img src="Upload/Content/16/09/85361472904945.jpg" alt="" style="width: 60px; height: 60px;">
                        <span>360奇酷旅行随身拍            </span>
                        <b>￥806.00.00</b>
                        <i style="margin-left: 10px;cursor: pointer">X</i>

                    </div>
                                        <div class="bottom">

                        <span>共1件商品&nbsp</span><span> 总计：¥806</span>

                        <a href="http://localhost/Project/3601/index.php?m=Home&c=Shopcar&a=index">去购物车</a>

                    </div>


                    


                    
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


<!--中间支付界面开始-->

<div id="content">
    <div class="mall_modw">
        <div class="hd">
            <h3>收货地址</h3>
            <span style="color:red;font-size:14px;padding:10px">温馨提示：为了保证您的权益，防止黄牛倒卖，订单进入正在配货状态将不能修改收货地址和发票信息！</span></div>
        <!-- 地址选择部分 -->
        <div class="bd">
            <div class="init">
                <div class="sec_adr">

                    <ul class="sec_adr_ul">

                        <?php foreach ($address as $k){?>
                        <li >
                            <input class="input-radio" type="radio" name="radio" value="0"   checked="">
                            <lable for="address" class="va">
                                <?php echo $k?>
                            </lable>
                        <li>
                            <?php }?>
                    </ul>
                    <a class="add" href="javascript:;" title="添加新地址" data-monitor="user_address_add"></a>
                    <ul class="sec_adrlast">
                        <li>
                            <input class="input-radio" type="radio" name="radio" value="0"   checked="">
                            <label for="address">使用新地址</label>
                        </li>
                    </ul>
                </div>
                <div class="address">
                    <form action="" method="post" accept-charset="utf-8" id="form">
                        <div class="add-row">
                            <label class="consignee-add-label" for=""> <b>*</b>收货人姓名 </label>
                            <input name="name" type="text"  placeholder="收货人姓名" style="width: 230px;height:37px;" id="name">
                        </div>

                        <div class="add-row">
                            <label class="consignee-add-label" for=""> <b>*</b>地址 </label>
                            <!-- 引入三级地址选择 -->
                            <div class="info">
                                <div>
                                    <select id="s_province" name="s_province"></select>  
                                    <select id="s_city" name="s_city" ></select>  
                                    <select id="s_county" name="s_county"></select>
                                    <script class="resources library" src="./Public/Home/js/area.js" type="text/javascript"></script>

                                    <script type="text/javascript">_init_area();</script>
                                </div>
                                <div id="show"></div>
                            </div>

                            <script type="text/javascript">
                                var Gid  = document.getElementById;
                                var showArea = function(){
                                    Gid('show').innerHTML = "<h3>省" + Gid('s_province').value + " - 市" +
                                        Gid('s_city').value + " - 县/区" +
                                        Gid('s_county').value + "</h3>"
                                }
                                Gid('s_county').setAttribute('onchange','showArea()');
                            </script>
                            <!-- 引入三级地址选择结束 -->

                            <textarea name="address" placeholder="路名街道地址，或门牌号" id="address"></textarea>
                        </div>

                        <div class="add-row">
                            <label class="consignee-add-label" for="">邮政编码 </label>
                            <input name="yzbm" type="text"  placeholder="6位邮政编码" style="width: 230px;height:37px;" id="yzbm">
                        </div>

                        <div class="add-row">
                            <label class="consignee-add-label" for=""> <b>*</b>手机号码 </label>
                            <input name="number" type="text"  placeholder="11位手机号码" style="width: 230px;height:37px;" id="number">
                        </div>

                        <div class="sub">
                            <p>
                                <a href="javascript:;" id="consigneeAddBtn" class="save">保存</a>
                                <a href="javascript:;" id="consigneeCancelBtn" class="cancle">取消</a>
                            </p>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="mall_modw">
        <div class="hd">
            <h3>支付方式</h3>
        </div>
        <p>限在线支付</p>
    </div>
    <div class="mall_modw">
        <div class="hd">
            <h3>配送方式</h3>
        </div>
        <p>快递配送，费用5元</p>
    </div>
    <div class="mall_modw">
        <div class="hd">
            <h3>商品清单</h3>
        </div>

        <div id="my_car">
            <div class="car_list">
                <div class="title">
                    <ul>
                        <li class="lit">商品信息</li>
                        <li>单价</li>
                        <li>数量</li>
                        <li>合计</li>
                    </ul>
                </div>
            </div>
            <?php foreach ($goods as $k=>$v){?>
            <div class="list">
                <ul>
                    <li class="lit">
                        <div class="img">
                            <img src="./<?php echo $goodsData['glistimg']?>" alt="">
                        </div>
                        <a href="" title=""><?php echo $v['name']?></a>
                    </li>
                    <li><span><?php echo $v['price']?></span>元</li>
                    <li>×<span><?php echo $v['num']?></span></li>
                    <li class="xj"><span><?php echo $v['total']?></span>元</li>
                </ul>
            </div>
<?php }?>
            <!-- 商品价格总计 -->
            <div class="count">
                <div class="money">
                    共：<span style="color:orange;"><?php echo $_SESSION['cart']['total_rows']?></span>件 <br>
                    金额共计：<span style="color:red" class="t0"><?php echo $_SESSION['cart']['total']?></span>元 <br>
                    配送费：<span class="kd">5</span>元
                    <p>应付总额:<span class="total">999999</span>元</p>
                </div>
                <p class="city">寄送至: <span class="adr"></span> 邮编: <span class="bm"></span> </p>
                <p class="line">收件人: <span class="nm"></span> 电话:  <span class="num"></span> </p>
                <div class="btn">
                    <a href="javascript:void(0);" class="b2" title="立即下单" data-monitor="shopcart_placeorder_click">立即下单</a>
                    <span></span>
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



</div>

</body>
<script src="./Public/Home/js/jquery-2.0.3.min.js"></script>
<script src="./Public/Home/js/adr.js"></script>
<script>
    var a=$(".t0").text();
    var b=$('.kd').text();
    var c=parseFloat(a)+parseFloat(b);
    $("span.total").html(c);
    $(function () {


        $('.save').click(function () {
            var xinxi=$('#form').serialize();
            $.ajax({
                type:'post',
                url:"<?php echo U('Pay/address')?>",
                dataType:'json',
                data:xinxi,
                success:function(phpData){
                    html='';
                    if(phpData){
                        console.log(phpData);
                        html+='<li><input class="input-radio" type="radio" name="radio" value="0"   checked=""><lable for="address" class="va">';
                        html+=phpData.name+','+phpData.s_province+'-'+phpData.s_city+'-'+phpData.s_county+'-'+phpData.address+','+phpData.yzbm+','+phpData.number;
                        html+='</lable><li>';
                    }
                    $('.sec_adr_ul').after(html);
                    location.href="<?php echo U('Pay/index')?>";
                }


            })



            
        })

        //异步选择显示地址信息

       $('input[name="radio"]').click(function(){
           var address=$(this).siblings('.va').text();
//           console.log(address);
           arrA=address.split(',');
           var name=arrA[0];
           var adr=arrA[1];
           var bm=arrA[2];
           var number=arrA[3];
           $(".city .adr").html(adr);
           $(".city .bm").html(bm);
           $(".line .nm").html(name);
           $(".line .num").html(number);
//           $.ajax({
//
//           })

       })

        //异步传输订单信息

        $('.b2').click(function(){
            var total=$(".total").html();
            var address=$('input[name="radio"]:checked').siblings('.va').text();
            var adr= $(".city .adr").html();
            if(!adr){
                $('.btn span').html('<b style="color:orangered"> 请选择收货地址</b>').show(600).delay(3000).hide(300);
            }else{
                $.ajax({
                    type:'post',
                    url:"<?php echo U('Pay/check')?>",
                    dataType:"json",
                    data:{adr:address},
                    success:function(phpData){
                        location.href="<?php echo u('Pay/pay')?>"+'&oid='+phpData;
                    }
                })




            }


        })


    })
</script>
</html>
