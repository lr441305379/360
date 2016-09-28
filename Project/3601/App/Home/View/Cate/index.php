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
{{include file="../Common/header"}}
<!--公共头部结束-->



<!--中间大区域开始-->

<!--点击搜索盒子开始-->

<div id="cate">

    <div class="list">

        <!--显示位置-->
        <div class="top">


            <!--首页>全部搜索结果 >智能家居(顶级分类) >家居办公(子分类) >插座(再分类) > 控客(品牌)  全部-->
            <!--用PHP输出当前点击的品牌还是用JS-->
            <a href="{{U('Index/index')}}">首页</a>
            <a href="{{U('Cate/index')}}">>全部搜索结果</a>



            <span>>全部</span>    <!--不遍历的-->


        </div>

        <!--显示位置结束-->


        <!--分类显示-->
        <!--如果选了品牌 品牌这个盒子消失-->

        <div class="bottom">

             <!--分类盒子-->
            {{foreach from="$name"  key="$k" value="$v"}}
            <?php
            $temp=$param;
            $temp[$k]=0;
//            p($temp)
            ?>



<!--            改样式-->

            <div class="cate">
                <ul>
                    <li>
                        <span>{{$v['name']}}</span>
                        <a href="{{U('index',['cid'=>$_GET['cid'],'param'=>implode('_',$temp)])}}" {{if value="$param[$k] eq 0"}}class="hover"{{endif}}>不限</a>
                        {{foreach from="$v['value']" value="$vv"}}
                        <?php
                        $temp[$k] = $vv['gpid'];
                        ?>
                        <a href="{{U('index',['cid'=>$_GET['cid'],'param'=>implode('_',$temp)])}}" {{if value="$vv['gpid'] eq $param[$k]"}}class="hover"{{endif}}  >{{$vv['gpvalue']}}</a>
                        {{endforeach}}

                    </li>
                </ul>

            </div>
            {{endforeach}}

        </div>


    </div>



</div>



<!--点击搜索盒子结束-->

<div id="show_data">
    <div class="show">
        <ul class="list">

            <!-- 图片部分 -->
{{foreach from="$data" value="$v"}}
            <a href="{{U('Content/index',['gid'=>$v['gid']])}}" target="_blank" title="">
                <li class="li_item">
                    <div class="img">
                        <img src="./{{$v['glistimg']}}" alt="" style="width: 180px;height: 180px" class="shake shake-opacity">
                    </div>

                    <div class="des">
                        <p class="p1">{{$v['gname']}}</p>
                        <p class="p2">￥{{$v['gprice']}}</p>
                    </div>
                </li>
            </a>
            {{endforeach}}

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

