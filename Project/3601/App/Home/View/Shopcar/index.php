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
                    url:"{{U('Shopcar/edit')}}",//传送地址
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
                        location.href="{{U('del')}}"+'&sid='+sid;
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
                    url:"{{U('Shopcar/edit')}}",//传送地址
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
//                    url:"{{U('Shopcar/del')}}",
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

{{include file="../Common/header"}}


<div id="my_car">
    <div class="car">
        <h3>我的购物车</h3>
    </div>
    {{if value="!empty($_SESSION['cart']['goods'])"}}


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
{{foreach from="$goods" value="$v" key="$k"}}
    <!--遍历整个div-->
    <div class="list">
        <div class="title">
            <ul>
                <li class="lit">
                    <a href="" title="">{{$v['name']}}</a>
                    <div class="img">
                        <img src="./{{$v['glistimg']}}" alt="" >
                    </div>

                </li>

                <li class="gg">
                   {{foreach from="$v['options']" key="$n" value="$vv"}}
                 <p>{{$n}}:{{$vv}}</p>
                   {{endforeach}}
                </li>
                <li class="p">
                    <span class="pr">{{$v['price']}}元</span>
                    <input class="cut" name="" type="button" value="-" sid="{{$k}}"/>
                    <input id='t' class="text_box" name="" type="text" value="{{$v['num']}}" />
                    <input class="add" name="" type="button" value="+"  sid="{{$k}}" />
                </li>
                <li class="xj"><span class="to">{{$v['total']}}</span>元</li>
                <li class="del"><a href="javascript:if(confirm('确定删除吗?')) location.href='{{U('del',array('sid'=>$k))}}';"  title=""  id="del">删除</a></li>
            </ul>
        </div>

    </div>

    {{endforeach}}

    <!--     商品价格总计 -->
    <div class="count">
        <div class="money">
            <p>商品总计:<span class="total">{{$shopcar['total']}}</span>元</p>
        </div>
        <div class="btn">
            <a href="{{U('Index/index')}}" class="b1" title="继续购物" data-monitor="shopcart_continueshop_click">继续购物</a>
            <a href="{{U('Pay/index')}}" class="b2" title="去结算" data-monitor="shopcart_placeorder_click">去结算</a>
        </div>



    </div>


</div>
{{else}}
<div class="empty">
    <img src="./Public/Home/images/empty.jpg" alt="">
</div>


    <!--//如果什么也没有加入购物车 ，不显示下面的-->
{{endif}}






<!--公共底部开始-->

{{include file="../Common/footer"}}






<!--公共底部结束-->
<li class="si"></li>

</body>


</html>