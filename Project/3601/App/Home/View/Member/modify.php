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
        form input{
            width: 100px;
            height: 30px;
            border-radius: 5px;
        }
        .form-group{
            margin-bottom: 10px;
        }

        .caozuo .btn{
            margin-left:60px;
            margin-top:60px;
            width: 60px;
            height: 30px;
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
                <a href={{U('Member/modify')}}"> <li>修改密码</li> </a>

            </ul>


        </div>

        <!--右边显示区域-->
        <div class="right">
            <div class="tp">
                <h4>我的信息</h4>


            </div>

            <div class="md">
                <span class="s1">修改密码</span><span class="s4">操作</span>


            </div>

            <div class="dizhi">

                <form  method="post">
                    <div class="form-group">
                        <label for="exampleInputEmail1">原密码&nbsp</label>
                        <input type="password" class="form-control" id="exampleInputEmail1" name="oldpassword">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">新密码&nbsp</label>
                        <input type="password" class="form-control" id="exampleInputPassword1" name="newpassword">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">确认密码</label>
                        <input type="password" class="form-control" id="exampleInputPassword1" name="confirmpassword">
                    </div>
                    <br>




            </div>

            <div class="caozuo">

                <button type="submit" class="btn btn-info btn-block">修改</button>

            </div>

            </form>
        </div>



    </div>


</div>


{{include file="../Common/footer"}}

</body>
<script src="./Public/Home/js/jquery-2.0.3.min.js"></script>
<script src="./Public/Home/js/adr.js"></script>
