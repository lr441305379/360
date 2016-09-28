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




{{include file="../Common/header"}}

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
                <h4>我的地址</h4>


            </div>

            <div class="md">
                <span class="s1">地址信息</span><span class="s4">操作</span>


            </div>

            <div class="dizhi">

                <ul>
                    {{foreach from="$arrAdd" value="$v" key="$k"}}
                    <li class="a{{$k}}">{{$v}}</li>
                    {{endforeach}}
                </ul>

            </div>

            <div class="caozuo">

                <ul>
                    {{foreach from="$arrAdd" value="$v" key="$k"}}
                    <li key="{{$k}}" class="b{{$k}}"><a href="">删除</a> </li>
                    {{endforeach}}

                </ul>

            </div>


            </div>



        </div>


    </div>


{{include file="../Common/footer"}}

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
            url:"{{U('adrDel')}}",
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
