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
{{include file="../Common/header"}}
<body style="background:#f9f9f9;">
<div class="payoff-z">
    <div class="payoff-z">
        <div class="payoff-ok"><i class="iconfont">&#xe63c;</i><span>支付中心</span></div>
        <div class="payoff">
            <div class="payoff-title">
                <div class="payoff-left"><i class="iconfont">&#xe615;</i></div>
                <div class="payoff-mid">
                    <div class="payoff-mid-order"  time="{{$orderData['otime']}}">
                        <p>订单已提交,请在二小时内完成支付!<span>过期订单将被取消</span> <a href="{{U('Member/member')}}">查看详细 </a></p>
                    </div>
                    <div class="payoff-mid-bot">
                        <span class="payoff-dd">订单编号: {{$orderData['onumber']}}</span>
                        <span class="djs" style="color:royalblue"></span>
                    </div>
                </div>

                <div class="payoff-right">
                    <p>支付金额</p>
                    <h5 >￥{{$orderData['ototal']}}元</h5>
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


            <a href="javascript:;" class="payoff-btn" oid="{{$orderData['oid']}}">立即支付</a>
        </div>
    </div>




{{include file="../Common/footer"}}

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
                url:"{{U('Pay/paid')}}",
                success:function(phpData){
                    if(phpData){
                        alert('支付成功');
                        location.href="{{U('Member/member')}}"

                    }

                }
            })
        })
</script>
</html>
