<?php
/**
 * author:万玉涛
 * address:441305379@qq.com
 * 2016/8/15 18:04
 */
header("Content-type: text/html; charset=utf-8");
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title></title>
    <meta name="viewport" content="width=1000, initial-scale=1.0, maximum-scale=1.0">
    <!-- Loading Bootstrap -->
    <link href="./Public/Admin/Flat/dist/css/vendor/bootstrap.min.css" rel="stylesheet">
    <!-- Loading Flat UI -->
    <link href="./Public/Admin/Flat/dist/css/flat-ui.css" rel="stylesheet">
    <!--    <link href="./Public/Admin/Flat/docs/assets/css/demo.css" rel="stylesheet">-->
    <link rel="shortcut icon" href="./Public/Admin/Flat/img/favicon.ico">

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements. All other JS at the end of file. -->
    <!--[if lt IE 9]>
    <script src="./Public/Admin/dist/js/vendor/html5shiv.js"></script>
    <script src="./Public/Admin/dist/js/vendor/respond.min.js"></script>


    <![endif]-->

    <!--载入百度编辑器-->
    <script type="text/javascript" charset="utf-8" src="./Public/Admin/ue/ueditor.config.js"></script>
    <script type="text/javascript" charset="utf-8" src="./Public/Admin/ue/ueditor.all.min.js"> </script>
    <script type="text/javascript" charset="utf-8" src="./Public/Admin/ue/lang/zh-cn/zh-cn.js"></script>

    <script type="text/javascript" src="./Public/Admin/uploadify/jquery-1.8.2.min.js"></script>
    <script type="text/javascript" src="./Public/Admin/uploadify/jquery.uploadify.min.js"></script>
    <link rel="stylesheet" type="text/css" href="./Public/Admin/uploadify/uploadify.css">

    <script>
        $(function(){
            $("select[name=shop_cate_cid]").change(function () {
                var data=$(this).val();

                $.ajax({
                    type:'post',
                    url:"<?php echo U('Goods/addYb')?>",
                    data:{cid:data},
                    dataType:'json',
                    success:function(phpData){
                        var html = '';
                        var spec = '';
                        for(var a  in phpData){
                            var result=phpData[a].tpvalue.split(",");

                            if(phpData[a].tptype==0){
                                html+="<div class='form-group sx'>"
                                html+="<label for='exampleInputEmail1'>"+phpData[a].tpname+"</label>"
                                html+='<select name="attr['+phpData[a].tpid+']" class="form-control">'
                                html+="<option value=''>请选择</option>"
                                for(var i=0;i<result.length;i++){
                                    html+='<option value="'+result[i]+'">'+result[i]+"</option>"
                                }
                                html+="</select></div>";

                            }

                            if(phpData[a].tptype==1) {
                                spec += '<tr class="info gg">';
                                spec += '<td>'+phpData[a].tpname+'</td>';
                                spec += '<td>';
                                spec += '<select name="spec[value]['+phpData[a].tpid+'][]" id="">';
                                spec += '<option value="">请选择</option>';

                                for (var i = 0; i < result.length; i++) {
                                    spec += '<option value="'+result[i]+'">'+result[i]+'</option>';
                                }
                                spec += '</select></td>';
                                spec += '<td>附加价格：<input type="text" name="spec[added]['+ phpData[a].tpid+'][]" id=""/></td>';
                                spec += '<td>';
                                spec += '<a href="javascript:;" class="btn btn-primary addSpec">添加规格</a>';
                                spec += '</td></tr>';


                            }


                        }
                        $(".pp").html(html);
                        $('#spec').html(spec);

                    }

                })
                if(!data){
                    $(".sx").remove();
                    $(".gg").remove();
                }


            })
            //点击添加规格
            $('.addSpec').live('click',function(){
                //找到当前的父级的tr
                var trObj = $(this).parents('tr');
                //克隆一个
                var tr = trObj.clone();
                tr.find('.addSpec').html('删除规格').removeClass('btn-primary addSpec').addClass('btn-info removeSpec');
                //再插入到当前父级的下面
                trObj.after(tr);

            })
            $('.removeSpec').live('click',function(){
                $(this).parents('tr').remove();
            })


        })

    </script>

</head>
<body>

<form action="" method="post">
    <div class="alert alert-success">编辑商品</div>
    <span class="label label-info">基本信息</span>
    <a href="javascript:history.go(-1)" class="btn btn-primary btn-lg active" role="button">返回上一页</a>
    <div class="form-group">
        <label for="exampleInputEmail1">所属分类</label>
        <select name="shop_cate_cid" class="form-control" id="cate">
<!--            <option value="" >请选择</option>-->
            <?php foreach ($cateData as $v){?>
            <option value="<?php echo $v['cid']?>" <?php if($data[0]['shop_cate_cid']==$v['cid']){?>
                selected
               <?php }?>  ><?php echo $v['cname']?></option>
            <?php }?>
        </select>
    </div>
    <input type="hidden" name="shop_adminuser_id" value="<?php echo $_SESSION['info']['id']?>">

    <div class="form-group">
        <label for="exampleInputEmail1">所属品牌</label>
        <select name="shop_brand_bid" class="form-control">
            <?php foreach ($brandData as $v){?>
            <option value="<?php echo $v['bid']?>" <?php if($data[0]['shop_brand_bid']==$v['bid']){?>
                selected
               <?php }?> ><?php echo $v['bname']?></option>
            <?php }?>
        </select>
    </div>

    <div class="form-group">
        <label for="exampleInputEmail1">商品名称</label>
        <input id="exampleInputEmail1" class="form-control" type="text" placeholder=""  name="gname" value="<?php echo $data[0]['gname']?>">
    </div>

    <div class="form-group">
        <label for="exampleInputEmail1">商品描述</label>
        <input id="exampleInputEmail1" class="form-control" type="text" placeholder=""  name="gdes" value="<?php echo $data[0]['gname']?>">
    </div>

    <div class="form-group">
        <label for="exampleInputEmail1">市场价</label>
        <input id="exampleInputEmail1" class="form-control" type="text" placeholder=""  name="gmprice" value="<?php echo $data[0]['gmprice']?>">
    </div>

    <div class="form-group">
        <label for="exampleInputEmail1">商城价</label>
        <input id="exampleInputEmail1" class="form-control" type="text" placeholder=""  name="gprice" value="<?php echo $data[0]['gprice']?>">
    </div>

    <div class="form-group">
        <label for="exampleInputEmail1">点击次数</label>
        <input id="exampleInputEmail1" class="form-control" type="text" placeholder=""  name="gclick"  value="<?php echo $data[0]['gclick']?>">
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">库存量</label>
        <input id="exampleInputEmail1" class="form-control" type="text" placeholder=""  name="gstock" value="<?php echo $data[0]['gstock']?>">
    </div>



    <span class="label label-info" >商品属性</span>
    <div class="pp"></div>

    <span class="label label-info" >商品规格</span>
    <table class="table table-border    ed table-hover" id='spec'>

    </table>


    <span class="label label-info" >商品列表图</span>
    <div lab="uploadFile">
        <input id="f" type="file" multiple="true">
        <span>类型: *.jpg,*.png 大小: 2000KB 数量: 10</span>
        <script type="text/javascript">
            $(function() {
                $('#f').uploadify({
                    'formData'     : {//POST数据
                        '<?php echo session_name();?>' : '<?php echo session_id();?>',
                    },
                    'fileTypeDesc' : '上传文件',//上传描述
                    'fileTypeExts' : '*.jpg;*.png',
                    'swf'      : '<?php echo __PUBLIC__?>/Admin/uploadify/uploadify.swf',
                    'uploader' : '<?php echo U('upload')?>',
                    'buttonText':'选择文件',
                    'fileSizeLimit' : '2000KB',
                    'uploadLimit' : 10,//上传文件数
                    'width':65,
                    'height':25,
                    'successTimeout':10,//等待服务器响应时间
                    'removeTimeout' : 0.2,//成功显示时间
                    'onUploadSuccess' : function(file, data, response) {
                        //转为json
                        data=$.parseJSON(data);
                        //获得图片地址
                        var imageUrl = data.url;
                        var li="<li path='"+data.path+"' url='"+data.url+"'><img src='"+imageUrl+"'/><input type='hidden' name='glistimg' value='"+data.path+"'/></li>";
                        $("#uploadLists ul").prepend(li);
                    }
                });
            })
        </script>
        <div id="uploadLists">
            <ul>

            </ul>
        </div>
    </div>
    <img src="<?php echo $data[0]['glistimg']?>" alt=""><br/>
    

    <br/><br/><br/><span class="label label-info">商品详情图</span>

    <div lab="uploadFile">
        <input id="file" type="file" multiple="true">
        <span>类型: *.jpg,*.png 大小: 2000KB 数量: 10</span>
        <script type="text/javascript">
            $(function() {
                $('#file').uploadify({
                    'formData'     : {//POST数据
                        '<?php echo session_name();?>' : '<?php echo session_id();?>',
                    },
                    'fileTypeDesc' : '上传文件',//上传描述
                    'fileTypeExts' : '*.jpg;*.png',
                    'swf'      : '<?php echo __PUBLIC__?>/Admin/uploadify/uploadify.swf',
                    'uploader' : '<?php echo U('upload')?>',
                    'buttonText':'选择文件',
                    'fileSizeLimit' : '2000KB',
                    'uploadLimit' : 10,//上传文件数
                    'width':65,
                    'height':25,
                    'successTimeout':10,//等待服务器响应时间
                    'removeTimeout' : 0.2,//成功显示时间
                    'onUploadSuccess' : function(file, data, response) {
                        //转为json
                        data=$.parseJSON(data);
                        //获得图片地址
                        var imageUrl = data.url;
                        var li="<li path='"+data.path+"' url='"+data.url+"'><img src='"+imageUrl+"'/><input type='hidden' name='gdimg[]' value='"+data.path+"'/></li>";
                        $("#uploadList ul").prepend(li);
                    }
                });
            });
        </script>
        <div id="uploadList">
            <ul>

            </ul>
        </div>
        <img src="<?php echo $gdesData['gdimg']?>" alt="">
        <br/><br/><br/><span class="label label-info">商品详细</span>
        <script id="editor" type="text/plain" style="width:100%;height:500px;" name="gdimages"><?php echo $gdesData['gdimages']?></script>
        <script>
            var ue = UE.getEditor('editor');
        </script>
    </div>

    <input type="hidden" name="gid" value="<?php echo $_GET['gid']?>" />
    <button class="btn btn-primary btn-block" type="submit"> 确定 </button>
</form>
</body>
<!--//                            var html = '<tr class="info">'-->
<!--    //                            html += '<td>'+phpData[a]tpname+"</td>"-->
<!--    //                            html+='<td>'-->
<!--        //                            html += "<select >"-->
<!--            //                            html += "<option value=''>请选择</option>"-->
<!--            //                            for (var i = 0; i < result.length; i++) {-->
<!--            //                            html += "<option value=''>" + result[i] + "</option>"-->
<!--            //                        }-->
<!--            //                            html+="</select></td>"-->
<!--    //                            html+='<td>附加价格：<input type="text" name="" id=""/></td>'-->
<!--    //                            html+='<td>'-->
<!--        //                            html+='<a href="javascript:;" class="btn btn-primary addSpec">添加规格</a>'-->
<!--        //                            html+='</td></tr>'-->
</html>

