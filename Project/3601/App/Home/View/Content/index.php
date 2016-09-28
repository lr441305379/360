<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>商品详情页</title>
    <link rel="stylesheet" href="./Public/Home/css/Common.css">
    <link rel="stylesheet" href="./Public/Home/css/cont.css">
    <script src="./Public/Home/js/jquery-2.0.3.min.js"></script>
    <style type="text/css">
        .cate ul li a.now{
            outline:1.5px solid #FA5437;

        }
        #ts{
            color:#1E911E;
            font-size:16px;
        }
    </style>
</head>
<body id="bodyCon">

<!--公共头部开始-->
{{include file="../Common/header"}}

<!--公共头部结束-->

<!--公共头部结束-->

<!--中间开始部分-->

<div id="bigBox">

<div id="conShow">

    <!--左边图片展示区域-->

    <div class="left">

        <!--大图盒子商品描述表-->
     
        <div class="top">

            <img src="{{$gdimg[0]}}" alt="" class="imgB" style="width: 482px;height: 482px">


        </div>

        <!--小图盒子-->
        {{foreach from="$gdimg" value="$v"}}
        <div class="bottom">


<!--                 <img src="{{$v}}" alt="" class="imgS" style="width: 64px;height: 64px">-->

            <img src="{{$v}} " alt="" style="width: 64px;height: 64px" class="imgS" num="1">
            
<!--            <ul>-->
<!--                <li>-->
<!--                    <img src="{{$v}}"  style="width: 64px;height: 64px">-->
<!--                    -->
<!--                </li>-->
<!--            </ul>-->



        </div>
        {{endforeach}}

    </div>


    <!--右边文字选购部分-->

    <div class="right">

        <!--标题-->

        <div class="title">

            <p gid="{{$goodsData['gid']}}">{{$goodsData['gname']}}
            </p>

        </div>

        <div class="des">
            <span>{{$goodsData['gdes']}}</span>
        </div>

        <!--价格-->
        <div class="price">

        <span>￥&nbsp<b>{{$goodsData['gprice']}}</b></span>
        </div>



        <!--分类-->
        {{foreach from="$end" value="$v"}}
        <div class="cate">

            <span>{{$v['name']}}</span>

            <ul>
                {{if value="isset($v['name'])"}}
                {{foreach from="$v['value']" value="$vv"}}


                                <li><a href="javascript:;" fid="{{$vv['gpid']}}">{{$vv['gpvalue']}}</a></li>

                {{endforeach}}
                {{endif}}



            </ul>

        </div>
{{endforeach}}
        <!--数量与库存-->
        <div class="num">

            <span>数量(库存: <i>0</i>) </span>

            <div class="numBox">

                <input class="cut" name="" type="button" value="-" sid="{}" />
                <input class="text_box" name="" type="text" value="1" />
                <input class="add" name="" type="button" value="+" sid="{}" />

            </div>





        </div>


        <!--买  收藏-->
        <div class="buy">


            <!--加入购物车-->

            <a href="javascript:;" class="joinCar"  >

                <div class="car">

                </div>
                <span>
                    加入购物车
                </span>


            </a>
            <span id="ts"></span>

            <!--喜欢-->


            <a href="javascript:;" class="like">
                <span>喜欢</span>
                <div class="hot">

                </div>


            </a>

        </div>

        <!--保障-->

        <div class="sure">

        </div>




    </div>

</div>

</div>



<!-- 内容图片部分开始	 -->
<br>
<br>
<br>
<br>
<br>
<div id="tab_bar">
    <div class="tab">
        <a href="" title="">产品详情</a><span>/</span>
        <a href="" title="">规格参数</a><span>/</span>
        <a href="" title="">常见问题</a>
    </div>
</div>


<div id="pic">
    <div class="full_pic">
        <div class="super">
            {{$gdesData['gdimages']}}
        </div>

<!--        <p style="height: 1372px; background-image: url(./Public/Home/images/c001.jpg);">-->
<!--        </p>-->
<!--        <p style="height: 1350px; background-image: url(./Public/Home/images/c002.jpg);">-->
<!--        </p>-->
<!--        <p style="height: 1503px; background-image: url(./Public/Home/images/c003.jpg);">-->
<!--        </p>-->
<!--        <p style="height: 2232px; background-image: url(./Public/Home/images/c004.jpg);">-->
<!--        </p>-->
<!--        <p style="height: 2339px; background-image: url(./Public/Home/images/c005.jpg);">-->
<!--        </p>-->
<!--        <p style="height: 890px; background-image: url(./Public/Home/images/c006.jpg);">-->
<!--        </p>-->
<!--        <p style="height: 1008px; background-image: url(./Public/Home/images/c007.jpg);">-->
<!--        </p>-->
<!--        <p style="height: 1010px; background-image: url(./Public/Home/images/c008.jpg);">-->
<!--        </p>-->
<!--        <p style="height: 1008px; background-image: url(./Public/Home/images/c009.jpg);">-->
<!--        </p>-->
<!--        <p style="height: 307px; background-image: url(./Public/Home/images/c010.jpg);">-->
<!--        </p>-->
        <p><br></p>
    </div>
</div>
<div id="ggcs">
    <div class="ggcs">
        <span>规格参数</span>
    </div>
</div>
<!--<div id="ggmx">-->
    <!--<div class="gCon">-->
        <!--<div class="gArg">-->

        <!--</div>-->
        <!--<table cellpadding="0" cellspacing="0" class="col2">-->
            <!--<tbody>-->
            <!--<tr> <td class="wd207">型号</td> <td>1501-M02</td>  </tr>-->
            <!--<tr> <td class="wd207">高度</td> <td>142mm</td>  </tr>-->
            <!--<tr> <td class="wd207">宽度</td> <td>70.1mm</td>  </tr>-->
            <!--<tr> <td class="wd207">厚度</td> <td>最薄处4.86mm</td>  </tr>-->
            <!--<tr> <td class="wd207">机身重量</td> <td>128g</td>  </tr>-->
            <!--<tr> <td class="wd207">双卡使用说明</td> <td>两张移动卡可以任意使用，任意一张卡可选 4G 网络，另一张为 GSM 网络。</td>  </tr>-->
            <!--<tr> <td class="wd207">摄像头</td> <td>1300万像素图像传感器</td>  </tr>-->
            <!--<tr> <td class="wd207">副摄像头</td> <td>500万像素</td>  </tr>-->
            <!--<tr> <td class="wd207">操作系统</td> <td>360OS</td>  </tr>-->
            <!--<tr> <td class="wd207">电池容量</td> <td>2500mAh</td>  </tr>-->
            <!--<tr> <td class="wd207">电池类型</td> <td>锂电池</td>  </tr>-->
            <!--<tr> <td class="wd207">CPU频率</td> <td>ARM® cortex®-A53™ 1.3GHz*8</td>  </tr>-->
            <!--<tr> <td class="wd207">CPU型号</td> <td>MT 6753</td>  </tr>-->
            <!--<tr> <td class="wd207">Wi-Fi</td> <td>802.11 a/b/g/n，支持5GHz和2.4GHz频段</td>  </tr>-->
            <!--<tr> <td class="wd207">网络制式</td> <td>移动4G，移动3G，移动/联通2G</td>  </tr>-->
            <!--<tr> <td class="wd207">最大存储扩展</td> <td>128GB存储扩展</td>  </tr>-->
            <!--<tr> <td class="wd207">机身内存</td> <td>16GB ROM</td>  </tr>-->
            <!--<tr> <td class="wd207">运行内存</td> <td>2GB RAM</td>  </tr>-->
            <!--<tr> <td class="wd207">存储卡类型</td> <td>MicroSD(TF)</td>  </tr>-->
            <!--<tr> <td class="wd207">分辨率</td> <td>1280x720</td>  </tr>-->
            <!--<tr> <td class="wd207">屏幕尺寸</td> <td>5.0 英寸</td>  </tr>-->
            <!--<tr> <td class="wd207">重力感应</td> <td>是</td>  </tr>-->
            <!--<tr> <td class="wd207">光线传感器</td> <td>是</td>  </tr>-->
            <!--<tr> <td class="wd207">陀螺仪</td> <td>是</td>  </tr>-->
            <!--<tr> <td class="wd207">质保期</td> <td>一年</td>  </tr>-->
            <!--<tr> <td class="wd207">售后服务</td> <td>全国联保</td>  </tr>-->
            <!--<tr> <td class="wd207">包装清单</td> <td>手机*1，电源适配器*1，USB 数据线*1，SIM 卡顶针*1，手机保修证书*1，说明书*1</td>  </tr>-->
            <!--</tbody>-->
        <!--</table>-->
    <!--</div>-->
<!--</div>-->

<div id="ggcs">
    <div class="ggcs">
        <span>常见问题</span>
    </div>
</div>
<div id="trouble">
    <img src="./Public/Home/images/trouble.png" alt="">

</div>










<!--中间结束部分-->




<!--公共底部开始-->

{{include file="../Common/footer"}}







<!--公共底部结束-->

</body>


<script>
    $(function(){
        $(".cate ul li a").click(function(){
            $(this).addClass('now').parent('li').siblings().find('a').removeClass('now');
            $spanlen=$('.cate span ').length;
            $nowlen=$('.now').length;

            if($nowlen==$spanlen){
                var group='';

                $.each($('.now'),function(){
                    group+=$(this).attr('fid')+',';
                })

                $.ajax({
                    type:'get',
                    url:"{{U('Content/changeP',['gid'=>$_GET['gid']])}}",
                    data:{group:group,goodsPrice:{{$goodsData['gprice']}}},
                    dataType:'json',
                    success:function(phpData){
//                        console.log(phpData);
                        if(phpData.stock){
                            $(".num i").text(phpData.stock)
                        }else{
                            $(".num i").text(0);
                            $('.joinCar').removeClass('no');//判断库存有否的

                        }
                        if(phpData.price){
//                            var a=$(".price span b").text();
//                            var t=parseInt(a)+parseInt(phpData.price);
                            $(".price span b").text(phpData.price+'.00');
                            
                        }




                    //检测登录,判断数量
                    $('.joinCar').click(function () {

                        if(phpData['user']){//登录
                            var stock=$(".num i").text();//库存
                            var num=$('.text_box').val();//购买量

                            if(stock!=0&&num!=0&&num<stock){//判断购买数量是否库存
                                var gid=$('.title p').attr('gid');
                                var price=$('.price b').text();
                                var gname=$('.title p').text();
                                var num=$('.text_box').val();
                                var group='';
                                //抓取元素
                                var name='';
                                var value='';
                                console.log(price);
                                $.each($(".cate"),function(){

                                    name+=$(this).find('span').text()+',';
                                    value+=$(this).find('a.now').text()+',';

                                })
                                $.each($('.now'),function(){
                                    group+=$(this).attr('fid')+',';
                                })
                                console.log(name,value);
                                $.ajax({
                                    type:'post',
                                    url:"{{U('Shopcar/add')}}",
                                    data:{price:price,gid:gid,gname:gname,group:group,num:num,name:name,value:value},
                                    //前台抓取元素组合好直接发到后台
                                    dataType:'json',
                                    success:function(phpData){
                                        if(phpData){
                                            location.href="{{U('Shopcar/index')}}";

                                        }

                                    }

                                })
//                                $.ajax({
//                                    type:'post',
//                                    url:"{{U('Shopcar/index')}}",
//                                    data:{price:price,gid:gid,gname:gname,group:group,num:num,name:name,value:value},
//                                    //前台抓取元素组合好直接发到后台
//                                    dataType:'json',
//                                    success:function(phpData){
//
//                                    }
//
//                                })

//                                location.href="{{U('Shopcar/index')}}";

                            }else{
                                if(stock==0){
                                    $("#ts").html("没有此类商品").show(600).delay(3000).hide(300);

                                }
                                if(num==0){
                                    $("#ts").html("请选择商品数量").show(600).delay(3000).hide(300);


                                }



                            }



                        }else{

                        }


                    })

                    }
                })

            }





        })

        $('.joinCar').addClass('no');//1.是否登录2.库存是否有3.买的数量是否大于库存量

        $('.joinCar').click(function () {
            $.ajax({
                type:'get',
                url:"{{U('Content/checkU')}}",
                dataType:'json',
                success:function(phpData){
                    if(phpData){
                    }else{
                        location.href="{{U('Member/Login')}}";
                    }
                }
            })
        })
        $('div.shopcar').click(function () {
            $.ajax({
                type:'get',
                url:"{{U('Content/checkU')}}",
                dataType:'json',
                success:function(phpData){
                    if(phpData){
                    }else{
                        location.href="{{U('Member/Login')}}";
                    }
                }
            })
        })



    })

    $(function(){
        $(".bottom img").hover(function(){
           var a= $(this).attr('src');
            $(".top img").attr('src',a);//切换图片

        },function(){})
//        $(".top img").click(function(){
//        })
    })
    $(function(){
        $(".add").click(function(){
            var t=$(this).parent().find('input[class*=text_box]');
            if(parseInt(t.val())<6){
                t.val(parseInt(t.val())+1);
            }


        })
        $(".cut").click(function(){
            var t=$(this).parent().find('input[class*=text_box]')
            t.val(parseInt(t.val())-1);
            if(parseInt(t.val())<0){
                t.val(0);

            }



        })

        $(".like").click(function(){

            $.ajax({
                type:'get',
                url:"{{U('Content/checkU')}}",
                dataType:'json',
                success:function(phpData){
                    if(phpData){
                        var gid={{$_GET['gid']}};

            $.ajax({
                type:'post',
                url:"{{U('Content/like')}}",
                data:{gid:gid},
                dataType:'json',
                success:function(phphdata){
                    if(phphdata){
                        $("#ts").html("收藏成功").show(600).delay(3000).hide(300);
                    }else{
                        $("#ts").html("已经收藏过了").show(600).delay(3000).hide(300);
                    }
                }
            })








                    }else{

                        location.href="{{U('Member/Login')}}";

                    }



                }

            })



        })



    })
</script>
</html>
