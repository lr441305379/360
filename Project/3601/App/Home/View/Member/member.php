<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>个人中心</title>
    <link rel="stylesheet" href="./Public/Home/css/Common.css">
    <link rel="stylesheet" href="./Public/Home/css/member.css">
</head>
<body>

<!--公共头部开始-->
{{include file="../Common/header"}}

<!--公共头部结束-->




<!--个人中心开始-->


<div id="member">

    <!--中间区域-->
    <div class="box">

        <!--左边操作区域-->
        <div class="left">
            <h3>个人中心</h3>

            <ul>

                <a href="{{U('Member/member')}}"><li> 我的订单</li></a>
                <a href="{{U('Member/like')}}"><li>我的喜欢 </li></a>
                <a href="{{U('Member/address')}}"><li> 送货地址</li></a>
                <a href="{{U('Member/modify')}}"><li> 修改密码</li></a>

            </ul>


        </div>

        <!--右边显示区域-->
        <div class="right">
            <div class="tp">
                <h4>我的订单</h4>

                <ul>
                    <li>全部订单</li>
                    <li>待付款{{$or}}</li>
                    <li>待发货{{$of}}</li>
                    <li>已发货</li>
                    <li>已完成</li>
                    <li>已关闭{{$oz}}</li>
                </ul>


            </div>

            <div class="md">
                <span class="s1">订单信息</span><span class="s2">订单金额</span><span class="s3">订单状态</span><span class="s4">操作</span>


            </div>

            <!--遍历开始-->

            <div class="bottom">

                <div>
{{foreach from="$data" value="$v"}}
                    <div class="down">

                        <div class="up" t="{{$v['otime']}}" >
                            <span class="s1"> 订单编号：{{$v['onumber']}}</span>
                            <span class="s2" >提交时间：<b>{{date("Y-m-d h:i:s", $v['otime']);}}</b> </span>

                        </div>

{{foreach from="$v['value']" value="$vv"}}
                        <div class="xx" >

                            <img src="./{{$vv['glistimg']}}" alt="" style="width: 60px;height: 60px;">
                            <span><a href="">{{$vv['gname']}}</a></span>
                            <span style="color:brown">￥{{$vv['oprice']}}元</span>
                            <span>x{{$vv['olnumber']}}</span>



                        </div>
                        {{endforeach}}
                        <div class="money">

                            <span style="color:red">
                                ￥{{$v['ototal']}}元

                            </span>

                        </div>
                        <div class="zt">
{{if value="$v['otime']+7200 < time()"}} <span oid="{{$v['oid']}}">已关闭</span>{{else}}
                            {{if value="$v['ozhuangt'] eq 2"}}
                            <span>等待付款</span>
                            {{else}}
                            <span>待发货</span>
                            {{endif}}
                            {{endif}}

                        </div>
                        <div class="cz" >

                            {{if value="$v['otime']+7200 > time()"}}

                            {{if value="$v['ozhuangt'] eq 2"}}

                            <p class="time">{{$v['otime']}}</p>
                            <p>    前完成付款</p>
                            <a href="{{U('Pay/pay',array('oid'=>$v['oid']))}}">去付款</a>
                            <a href="javascript:if(confirm('确定取消吗?')) location.href='{{U('del',array('oid'=>$v['oid']))}}';"  class="qx">取消订单</a>
                            {{else}}
                            <a href="" class="cg">付款成功</a>
                            {{endif}}


                            {{else}} <a href="javascript:if(confirm('确定删除吗?')) location.href='{{U('del',array('oid'=>$v['oid']))}}';"class="del">删除订单</a> {{endif}}


                        </div>


                    </div>
                    {{endforeach}}
                </div>


            </div>



        </div>


    </div>



</div>






<!--个人中心结束-->





<!--公共底部开始-->


{{include file="../Common/footer"}}





<!--公共底部结束-->

</body>
<script src="./Public/Home/js/jquery-2.0.3.min.js"></script>
<script>
    var nowtime = (new Date).getTime();/*当前时间戳*/
    $(function(){
        //点击开始倒计时
        $('#click').click(function(){
            time=setInterval("run()",1000);
        })
    })
    $(".zt").each(function(){
        var a=$(this).children('span').text();
        var oid=$(this).children('span').attr('oid');
        if(a=='已关闭'){
           $.ajax({
               url:'{{U('change')}}',
               data:{oid:oid},
               dataType:'json',
               type:'post',
               success:function () {
                   
               }
           })
        }
    })



</script>
</html>

