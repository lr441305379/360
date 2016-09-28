<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>360商城首页</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<meta name=Keywords content="360商城，智能硬件，免费试用，智能家居，智能手表，智能家电">
		<meta name=Description content="360商城是一家智能硬件体验平台。这里能免费试用智能硬件，查看全方位试用报告，还可以预约、抢购并体验新上市的智能产品。">
		<meta property="wb:webmaster" content=82757f177989599b><meta name=renderer content=webkit><title>360商城</title>

		<link rel="stylesheet" href="./Public/Home/css/index.css" />
        <link rel="stylesheet" href="./Public/Home/css/Common.css">
        <link rel="stylesheet" href="./Public/Home/css/shake.css" media="all">
        <script src="./Public/Home/js/jquery-2.0.3.min.js"></script>
	</head>

	<body>
		<!--头部区域开始-->
		<!--顶部区域-->
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
                        (                0                        )</a>


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



			<!--头部结束-->

			<!--菜单栏开始-->

			<div id="menu">

                <!--轮播图-->

				  <div id="lbt">

                      <div id="box">


                          <a href="<?php echo U('Content/index',['gid'=>28])?>" target="_blank"><img class="lbt1" src="./Public/Home/images/2.jpg" alt="" /></a>
                          <a href="<?php echo U('Content/index',['gid'=>22])?>"  target="_blank"><img class="lbt2" src="./Public/Home/images/5.jpg" alt="" /></a>
                          <a href="<?php echo U('Content/index',['gid'=>27])?>" target="_blank"><img class="lbt3" src="./Public/Home/images/6.jpg" alt="" /></a>
                          <a href="<?php echo U('Content/index',['gid'=>2])?>" target="_blank"><img class="lbt4" src="./Public/Home/images/8.jpg" alt="" /></a>
                          <a href="<?php echo U('Content/index',['gid'=>26])?>" target="_blank"><img class="lbt5" src="./Public/Home/images/9.jpg" alt="" /></a>
                          <a href="<?php echo U('Content/index',['gid'=>25])?>" target="_blank"><img class="lbt6" src="./Public/Home/images/10.jpg" alt="" /></a>

                          <a href="javascript:"  id="lbtleft"><</a>
                          <a href="javascript:"  id="lbtright">></a>

                          <ul id="ul">
                              <li>1</li>
                              <li >2</li>
                              <li >3</li>
                              <li >4</li>
                              <li >5</li>
                              <li >6</li>
                          </ul>


                      </div>


					<!--<img src="images/2.jpg" alt="" />-->



				   </div>


				   <div class="mid">

					   <div class="left">



							   <ul>
                                   <?php foreach ($data as $v){?>
								   <div class="menu">

									   <div class="cover ">

										   <li><a href="<?php echo U('Cate/index',['cid'=>$v['cid']])?>" target="_blank"><?php echo $v['cname']?></a></li>

									   </div>


									   <div class="hd">


                                           <div class="cate_son">
                                               <?php foreach ($v['p'] as $kk=>$vv){?>
                                               <div class="son1">
                                                   <div class="son_title">
                                                       <ul>
                                                           <li>
                                                               <a href="<?php echo U('Cate/index',['cid'=>$vv['cid']])?>" target="_blank"><?php echo $vv['cname']?>&nbsp></a>
                                                               <?php foreach ($vv['s'] as $kkk=>$vvv){?>
                                                               <a href="<?php echo U('Cate/index',['cid'=>$vvv['cid']])?>" class="sec" target="_blank"><?php echo $vv['s'][$kkk]['cname']?></a>
                                                               <?php }?>
                                                           </li>
                                                       </ul>
                                                   </div>
                                                   <ul>
                                                   </ul>



                                               </div>
                                               <?php }?>
                                               <div class="img">
                                                   <a href="<?php echo U('Content/index',['gid'=>1])?>"><img src="./Public/Home/images/h1.jpg" alt=""></a>
                                               </div>
                                           </div>



									   </div>

								   </div>

                                   
                                   <?php }?>

							   </ul>





					   </div>

				   </div>

			</div>


                <!--图片区域-->


                <div id="menuBottom">


                    <a href="<?php echo U('Content/index',['gid'=>41])?>"  target="_blank"><img src="./Public/Home/images/r1.jpg" alt=""></a>
                    <a href="<?php echo U('Content/index',['gid'=>12])?>"  target="_blank"><img src="./Public/Home/images/r2.png" alt=""></a>
                    <a href="<?php echo U('Content/index',['gid'=>2])?>"  target="_blank"><img src="./Public/Home/images/r3.jpg" alt=""></a>
                    <a href="<?php echo U('Content/index',['gid'=>32])?>"  target="_blank"><img src="./Public/Home/images/r4.png" alt=""></a>
                    <a href="<?php echo U('Content/index',['gid'=>33])?>"  target="_blank"><img src="./Public/Home/images/r5.png" alt=""></a>




                </div>

                <!--热门活动-->
                <div id="hot">

                    <div class="left">

                    </div>

                      <div class="b1">

                          <span>

                          </span>

                      </div>

                         <div class="hot">

                             <span>热门活动</span>

                         </div>
                         <div class="b2">
                             <span >

                             </span>
                         </div>


                    <div class="right">

                    </div>


                </div>
			
		
			

          <!--图片区域 分3个div-->
           <div id="hotBottom">

               <div class="left">

<!--                   <a href="<?php echo U('Content/index',array('gid'=>$left['gid']))?>" target="_blank"><img src="./<?php echo $left['glistimg']?>" alt="" style="width: 265px;height: 420px;"></a>-->

                   <a href="<?php echo U('Content/index',['gid'=>24])?>" target="_blank"><img src="./Public/Home/images/m1.jpg" alt="" style="width: 265px;height: 420px;"></a>

               </div>

               <div class="mid">

                   <a href="<?php echo U('Content/index',['gid'=>4])?>" target="_blank"> <img src="./Public/Home/images/e.jpg" alt=""></a>
                   <a href="<?php echo U('Content/index',['gid'=>30])?>"    target="_blank"> <img src="./Public/Home/images/m6.jpg" alt=""></a>
                   <a href="<?php echo U('Content/index',['gid'=>5])?>" target="_blank"> <img src="./Public/Home/images/3.jpg" alt=""></a>
                   <a href="<?php echo U('Content/index',['gid'=>29])?>" target="_blank"> <img src="./Public/Home/images/m2.jpg" alt=""></a>
                  



               </div>

               <div class="right">

<!--                   <a href=""><img src="" alt="" style="width: 265px;height: 420px;"></a>-->

                   <a href="<?php echo U('Content/index',['gid'=>23])?>" target="_blank"><img src="./Public/Home/images/1.jpg" alt=""></a>

               </div>

           </div>

          <!--1楼开始-->

        <div id="f1">
            <!--楼层导航-->
            <div class="first">

                <div class="left">
                    <b>手机及配件</b>

                    <span>热搜:&nbsp;</span>

                    <ul>
                        <?php foreach ($hotPhone as $v){?>
                        <li><a href="<?php echo U('Content/index',['gid'=>$v['gid']])?>" target="_blank"><?php echo $v['gname']?>|&nbsp;</a></li>
                        <?php }?>
                    </ul>

                </div>




                <div class="right">

                    <a href="<?php echo U('Cate/index',['cid'=>1])?>" target="_blank" class="more">更多</a>


                </div>





            </div>

            <!--图片 -->


            <div class="img">

                <?php foreach ($phone as $v){?>
                <a href="<?php echo U('Content/index',['gid'=>$v['gid']])?>" class="box" target="_blank">

                    <div class="show">
                        <p class="title"><?php echo $v['gname']?></p>
                        <p class="des"><?php echo $v['gdes']?></p>
                        <p class="price">￥<?php echo $v['gprice']?></p>
                    </div>

                    <div class="fimg">
                        <img src="./<?php echo $v['glistimg']?>" alt="" style="width: 163px;height:163px;">
                    </div>





                </a>
                <?php }?>
                <!--单独 一个图片结束-->



                <!--                                  <a href="http://www.baidu.com" class="box" target="_blank">-->
                <!---->
                <!--                                      <div class="show">-->
                <!--                                          <p class="title">智能云守护清洁机器人</p>-->
                <!--                                          <p class="des">智能云守护清洁机器人</p>-->
                <!--                                          <p class="price">智能云守护清洁机器人</p>-->
                <!--                                      </div>-->
                <!---->
                <!---->
                <!--                                      <img src="./Public/Home/images/4.jpg" alt="">-->
                <!---->
                <!---->
                <!--                                  </a>-->
                <!---->
                <!---->
                <!---->
            </div>



        </div>








               <!--1楼结束-->


<!--        2楼开始-->


                          <div id="f1">
                              <!--楼层导航-->
                              <div class="first">

                                  <div class="left">
                                      <b>智能穿戴</b>

                                      <span>热搜:&nbsp;</span>

                                      <ul>
                                          <?php foreach ($hotWear as $v){?>
                                          <li><a href="<?php echo U('Content/index',['gid'=>$v['gid']])?>" target="_blank"><?php echo $v['gname']?>|&nbsp;</a></li>
                                          <?php }?>
                                      </ul>

                                  </div>




                                  <div class="right">

                                      <a href="<?php echo U('Cate/index',['cid'=>7])?>" target="_blank" class="more">更多</a>


                                  </div>





                              </div>

                              <!--图片 -->


                              <div class="img">

                                  <?php foreach ($wear as $v){?>
                                  <a href="<?php echo U('Content/index',['gid'=>$v['gid']])?>" class="box" target="_blank">

                                      <div class="show">
                                          <p class="title"><?php echo $v['gname']?></p>
                                          <p class="des"><?php echo $v['gdes']?></p>
                                          <p class="price">￥<?php echo $v['gprice']?></p>
                                      </div>

                                      <div class="fimg">
                                          <img src="./<?php echo $v['glistimg']?>" alt="" style="width: 163px;height:163px;">
                                      </div>





                                  </a>
<?php }?>
                                  <!--单独 一个图片结束-->



<!--                                  <a href="http://www.baidu.com" class="box" target="_blank">-->
<!---->
<!--                                      <div class="show">-->
<!--                                          <p class="title">智能云守护清洁机器人</p>-->
<!--                                          <p class="des">智能云守护清洁机器人</p>-->
<!--                                          <p class="price">智能云守护清洁机器人</p>-->
<!--                                      </div>-->
<!---->
<!---->
<!--                                      <img src="./Public/Home/images/4.jpg" alt="">-->
<!---->
<!---->
<!--                                  </a>-->
<!---->
<!---->
<!---->
                              </div>



          </div>


<!--        2楼结束-->

        <div id="f1">
            <!--楼层导航-->
            <div class="first">

                <div class="left">
                    <b>智能家居</b>

                    <span>热搜:&nbsp;</span>

                    <ul>
                        <?php foreach ($hotHome as $v){?>
                        <li><a href="<?php echo U('Content/index',['gid'=>$v['gid']])?>" target="_blank"><?php echo $v['gname']?>|&nbsp;</a></li>
                        <?php }?>
                    </ul>

                </div>

                <div class="right">

                    <a href="<?php echo U('Cate/index',['cid'=>13])?>" target="_blank" class="more">更多</a>


                </div>


            </div>

            <!--图片 -->


            <div class="img">

                <?php foreach ($home as $v){?>
                <a href="<?php echo U('Content/index',['gid'=>$v['gid']])?>" class="box" target="_blank">

                    <div class="show">
                        <p class="title"><?php echo $v['gname']?></p>
                        <p class="des"><?php echo $v['gdes']?></p>
                        <p class="price">￥<?php echo $v['gprice']?></p>
                    </div>

                    <div class="fimg">
                        <img src="./<?php echo $v['glistimg']?>" alt="" style="width: 163px;height:163px;">
                    </div>

                </a>
                <?php }?>
                <!--单独 一个图片结束-->

            </div>



        </div>


<!--        3楼开始-->




<!--        3楼结束-->
<!--        热卖-->


        <div id="hot" >

            <h1><b style="color:red">热卖单品</b></h1>

            <?php foreach ($hot as $v){?>
            <a href="<?php echo U('Content/index',['gid'=>$v['gid']])?>" target="_blank">
                <img src="./<?php echo $v['glistimg']?>" alt="" style="width: 210px;height: 210px;" class="shake shake-vertical">

                <div class="show">

                    <div class="top">
                        <p><?php echo $v['gname']?></p>

                    </div>

                    <div class="bottom">

                        <div class="left">

                            <span>￥<?php echo $v['gprice']?></span>


                        </div>

                        <div class="right">

                            <span><?php echo date('m-d',$v['gsendtime'])?>上新</span>

                        </div>

                    </div>


                </div>

            </a>
            <?php }?>


        </div>

<!--        热卖结束-->
                          <div id="new">

                              <b>新品速递</b>

                              <!--图片开始-->
                              <?php foreach ($new as $v){?>
                              <a href="<?php echo U('Content/index',['gid'=>$v['gid']])?>" target="_blank">
                                  <img src="./<?php echo $v['glistimg']?>" alt="" style="width: 210px;height: 210px;">

                                  <div class="show">

                                      <div class="top">
                                          <p><?php echo $v['gname']?></p>

                                      </div>

                                      <div class="bottom">

                                          <div class="left">

                                              <span>￥<?php echo $v['gprice']?></span>


                                          </div>

                                          <div class="right">

                                              <span><?php echo date('m-d',$v['gsendtime'])?>上新</span>

                                          </div>

                                      </div>


                                  </div>

                              </a>
<?php }?>
                              <!--图片结束-->

<!--                              图片开始-->
<!--                              <a href="http://www.baidu.com" target="_blank">-->
<!--                                  <img src="./Public/Home/images/7.jpg" alt="">-->
<!---->
<!--                                  <div class="show">-->
<!---->
<!--                                      <div class="top">-->
<!--                                          <p>WD-40 快干型 精密电器清洁剂 快速线路去污剂速干电器版清洗剂 360ml</p>-->
<!---->
<!--                                      </div>-->
<!---->
<!--                                      <div class="bottom">-->
<!---->
<!--                                          <div class="left">-->
<!---->
<!--                                              <span>￥9999999</span>-->
<!---->
<!---->
<!--                                          </div>-->
<!---->
<!--                                          <div class="right">-->
<!---->
<!--                                              <span>08-01上新</span>-->
<!---->
<!--                                          </div>-->
<!---->
<!--                                      </div>-->
<!---->
<!---->
<!--                                  </div>-->
<!---->
<!--                              </a>-->
<!--图片结束-->








<div id="footer">


    <div class="ft">

        <p>360商城©2013-2016 360公司版权所有 京ICP备08010314号-43 京公网安备11000002000006号
            奇酷互联网络科技（深圳）有限公司 0755-61898999 深圳市南山区学苑大道1001号南山智园A2栋</p>

    </div>



</div>




                          </div>
                          <a  href="#search" class="return">返回顶部</a>

                          <div id="floornav">
                              <div>1F</div>
                              <div>2F</div>
                              <div>3F</div>
                              <div>4F</div>
                              <div>5F</div>
                              <div>6F</div>
                              <div>7F</div>
                              <div>8F</div>
                              <div>9F</div>
                              <div>10F</div>
                              <div>11F</div>
                              <div>12F</div>

                          </div>


                          <!--</div>-->
	</body>

    <script src="./Public/Home/js/index.js"></script>
    <script>
        window.onload = function(){
            var box = document.getElementById("lbt");
            var imgs = box.getElementsByTagName("img");
            var ul = document.getElementById("ul");
            var lis = ul.getElementsByTagName("li");
            var lbtleft = document.getElementById("lbtleft");
            var lbtright = document.getElementById("lbtright");

            var a = 0;

            function run(){
                a++;
                if(a==6){
                    a = 0;
                }
                for(var i=0;i<imgs.length;i++){
                    imgs[i].style.display = "none";
//                    lis[i].style.background = "#CCCCCC";
//                    lis[i].style.color = "black";
                }
                imgs[a].style.display = "block";
//                lis[a].style.background = "red";
//                lis[a].style.color = "white";
            }
            var timer = setInterval(run,3600);

            box.onmouseover = function(){
                clearInterval(timer);
            }
            box.onmouseout = function(){
                timer = setInterval(run,3600);
            }

            for(var i=0;i<lis.length;i++){
                lis[i].xuhao = i;
                lis[i].onmouseover = function(){
                    a = this.xuhao;
                    for(var j=0;j<lis.length;j++){
                        imgs[j].style.display = "none";
                        lis[j].style.background = "#CCCCCC";
                        lis[j].style.color = "black";
                    }
                    imgs[a].style.display = "block";
                    lis[a].style.background = "red";
                    lis[a].style.color = "white";
                }
            }

                lbtleft.onclick = function(){
                    a=a-1;
                    if(a==-1){
                        a =5 ;
                    }
                    for(var i=0;i<imgs.length;i++){
                        imgs[i].style.display = "none";
                        lis[i].style.background = "#CCCCCC";
                        lis[i].style.color = "black";
                    }
                    imgs[a].style.display = "block";
                    lis[a].style.background = "red";
                    lis[a].style.color = "white";
                }
                lbtright.onclick = function(){
                    a=a+1;
                    if(a==6){
                        a = 0;
                    }
                    for(var i=0;i<imgs.length;i++){
                        imgs[i].style.display = "none";
                        lis[i].style.background = "#CCCCCC";
                        lis[i].style.color = "black";
                    }
                    imgs[a].style.display = "block";
                    lis[a].style.background = "red";
                    lis[a].style.color = "white";
                }
        }
//搜索功能
        //JQ设置点击LI也能跳转到列表页
        $(function () {
            $(".cover li").click(function () {
                var a=$(this).children('a').attr('href');
                location.href=a;

            })

            
        })

    </script>
</html>







<!--<div id="f1">-->
<!--&lt;!&ndash;楼层导航&ndash;&gt;-->
<!--<div class="first">-->

<!--<div class="left">-->
<!--<b>手机及配件</b>-->

<!--<span>热搜:&nbsp;</span>-->

<!--<ul>-->
<!--<li><a href="" target="_blank">纽曼蓝牙耳机&nbsp;|&nbsp;</a></li>-->
<!--<li><a href="">纽曼蓝牙耳机&nbsp;|&nbsp;</a></li>-->
<!--<li><a href="">纽曼蓝牙耳机&nbsp;|&nbsp;</a></li>-->
<!--<li><a href="">纽曼蓝牙耳机&nbsp;|&nbsp;</a></li>-->
<!--<li><a href="">纽曼蓝牙耳机</a></li>-->
<!--</ul>-->

<!--</div>-->




<!--<div class="right">-->

<!--<div class="more">-->

<!--<a href="" target="_blank">更多</a>-->


<!--</div>-->


<!--</div>-->





<!--</div>-->

<!--&lt;!&ndash;图片 &ndash;&gt;-->
<!--<div class="img">-->

<!--<img src="./Public/Home/images/4.jpg" alt="">-->
<!--<img src="./Public/Home/images/4.jpg" alt="">-->
<!--<img src="./Public/Home/images/4.jpg" alt="">-->
<!--<img src="./Public/Home/images/4.jpg" alt="">-->
<!--<img src="./Public/Home/images/4.jpg" alt="">-->
<!--<img src="./Public/Home/images/4.jpg" alt="">-->
<!--<img src="./Public/Home/images/4.jpg" alt="">-->
<!--<img src="./Public/Home/images/4.jpg" alt="">-->
<!--<img src="./Public/Home/images/4.jpg" alt="">-->
<!--<img src="./Public/Home/images/4.jpg" alt="">-->


<!--</div>-->

