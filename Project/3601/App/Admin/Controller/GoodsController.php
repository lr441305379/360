<?php namespace Admin\Controller;
class GoodsController extends CommonController{
    private $goods;
    public function __auto(){
        $this->goods=new \Common\Model\Goods();

    }
    public function index(){
        //关联品牌表,分类表,类型表
        $page = Page::row(C('webSet.PAGE_SHOP'))->make(Db::table('shop_goods')->count());
        View::with('page',$page);
        $data=Db::table('shop_goods')->join('shop_brand','shop_goods.shop_brand_bid','=','shop_brand.bid')->
        join('shop_cate','shop_goods.shop_cate_cid','=','shop_cate.cid')->join('shop_type','shop_goods.shop_type_tid','=','shop_type.tid')->limit(Page::limit())->get();
        View::with('data',$data);
        View::make();
    }
    public function add(){//添加商品//多图上传
        if(IS_POST){
            if($this->goods->store()){
                View::success('添加商品成功',U('index'));
            }
            View::error($this->goods->getError());
        }
        $brand=new \Common\Model\Brand();
        $brandData=$brand->get();
        $cate=new \Common\Model\Cate();
        $cateData=$cate->get();
        $cateData=Data::tree($cateData,'cname');
        View::with('cateData',$cateData);
        View::with('brandData',$brandData);
        View::make();
    }

    public function  addYb(){//异步显示商品属性和规格
        $cid=$_POST['cid'];
        $data=Db::table('shop_cate')->where("cid={$cid}")->join('shop_type_pp','shop_cate.shop_type_tid','=','shop_type_pp.shop_type_tid')->get();
        View::ajax($data, $type = "JSON");


        
    }


    public function edit(){//编辑商品
        if(IS_POST){
            if($this->goods->edit()){
                View::success('编辑商品成功',U('index'));

            }
            View::error($this->goods->getError());

        }
        $gid=Q('get.gid',0,'intval');
        //关联品牌表,分类表,类型表
        $data=Db::table('shop_goods')->where("gid={$gid}")->join('shop_brand','shop_goods.shop_brand_bid','=','shop_brand.bid')->
        join('shop_cate','shop_goods.shop_cate_cid','=','shop_cate.cid')->join('shop_type','shop_goods.shop_type_tid','=','shop_type.tid')->get();
        //显示旧数据
        $cate=new \Common\Model\Cate();  //分类表
        $cateData=$cate->get();
        $brand=new \Common\Model\Brand();//品牌表
        $brandData=$brand->get();
        $gdes=new \Common\Model\Gdes();//商品详情表
       //显示商品详细表信息
        $gdesData=$gdes->where("shop_goods_gid={$gid}")->find();
        $gpp=new \Common\Model\Gpp();//商品属性表
        $gppData=$gpp->where("shop_goods_gid={$gid}")->find();
        View::with('data',$data);
        View::with('cateData',$cateData);
        View::with('brandData',$brandData);
        View::with('gdesData',$gdesData);
        View::with('gppData',$gppData);
        View::make();

    }

    public function upload(){
        $file = Upload::path('Upload/Content/' . date('y/m'))->make();
        if (empty($file)) {
            $this->ajax(Upload::getError());
        } else {
            /** $file内部就是以下这个数组
            $file = array(
            0 => array(
            'path' => 'Upload/Content/15/8/123981239172.jpg'    ,
            'url' => 'http://localhost/cms_edu/Upload/Content/15/8/123981239172.jpg',
            'image' => 1
            ),
            );**/
            //上传成功，把上传好的信息返给js
            $data = $file[0];
            echo json_encode($data);exit;
        }
    }

    public function del(){//删除也是三个表
        $gid=Q('get.gid',0,'intval');
        //删除商品表
        $this->goods->where("gid={$gid}")->delete();
        //删除商品详情表
        $gdes=new \Common\Model\Gdes();
        $gdes->where("shop_goods_gid={$gid}")->delete();
        //删除商品属性表
        $gpp=new \Common\Model\Gpp();
        $gpp->where("shop_goods_gid={$gid}")->delete();
        View::success('删除商品成功',U('index'));
    }


}
