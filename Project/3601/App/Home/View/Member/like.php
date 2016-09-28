<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>我的喜欢</title>
    <link rel="stylesheet" href="./Public/Home/css/Common.css">
    <link rel="stylesheet" href="./Public/Home/css/like.css">
</head>


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
            <div class="hd2">

               <div class="myLike">
                   <span >我的喜欢</span>

               </div>

                <div class="bottom">


                      <!--foreach-->
                    {{foreach from="$goodsData" value="$v"}}
                    <div class="img">

                        <img src="./{{$v['glistimg']}}" alt="" style="width: 120px;height: 145px;">
                        <a href=""><p>{{$v['gname']}}</p></a>
                        <p>￥{{$v['gprice']}}</p>
                        <div class="hd3">
                            <a href="javascript:if(confirm('确定取消吗?')) location.href='{{U('Member/likeDel',array('gid'=>$v['gid']))}}';"  class="qx">取消</a>
<!--                            <a href="javascript:if(confirm('确定删除吗?')) location.href='{{U('Member/likeDel',array('gid'=>$v['gid']))}}" class="qx">取消</a>-->
                            <a href="{{U('Content/index',array('gid'=>$v['gid']))}}" class="join">加入购物车</a>

                        </div>


                    </div>
                    {{endforeach}}


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




{{include file="../Common/footer"}}








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