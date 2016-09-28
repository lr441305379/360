<?php namespace Home\Controller;
use Hdphp\Controller\Controller;
class ShopcarController extends Controller{

    public function index(){
        if(isset($_SESSION['cart'])){
            $shopcar=$_SESSION['cart'];
            $goods=$_SESSION['cart']['goods'];
            View::with('goods',$goods);
            View::with('shopcar',$shopcar);
        }else{
            View::with('shopcar',[]);
            View::with('goods',[]);//修

        }
//        p($_SESSION);
        if(!empty($goods)){
            foreach ($goods as $v){
                $gid=($v['id']);//得到商品ID
//            p($v['options']);
            }
            $g=new \Common\Model\Goods();
            $goodsData=$g->where("gid={$gid}")->find();
            View::with('goodsData',$goodsData);
        }else{
            View::with('goodsData',[]);
        }
//        p($_SESSION);
        $cate=new \Common\Model\Cate();
        $topCate=$cate->where("pid=0")->get();

        //购物车
        //购物车
//        p($_SESSION);
        View::with('topCate',$topCate);
        View::make();
    }
    public function add(){
        $gid=Q('post.gid');
        $gname=Q('post.gname');
        $num=Q('post.num');
        $group=trim(Q('post.group'),',');
        $daring=new \Common\Model\Darling();//关联货品表,查询当前组合ID
        $did=$daring->where("grou IN ($group) AND shop_goods_gid=$gid")->pluck('did');//得到当前组合ID的自增ID(修改过grou)
        $group=explode(',', $group);
        //前台处理
        $name=trim(Q('post.name'),',');
        $value=trim(Q('post.value'),',');
        $name=explode(',',$name);
        $value=explode(',', $value);

        //前台处理

//        后台处理
        //关联商品属性表
//        $temp=[];
//        foreach($group as $v){
//            $name=Db::table('shop_goods_pp')->where("shop_goods_gid={$gid}")->join('shop_type_pp','shop_goods_pp.shop_type_pp_tpid','=','shop_type_pp.tpid')->where("gpid={$v}")->lists('tpname');
//            foreach($name as $vv){
//                $temp["$vv"]= Db::table('shop_goods_pp')->where("shop_goods_gid=51")->join('shop_type_pp','shop_goods_pp.shop_type_pp_tpid','=','shop_type_pp.tpid')->where("gpid={$v}")->lists('gpvalue');
//
//            }
//
//
//        }
        //后台处理

//        前台处理
        $temp=[];
        foreach($name as $k=>$vv){
            $temp[$vv]=$value[$k];
        }


//前台处理
        $price=Q('post.price');
        //拿到当前商品的图片
        $goods=new \Common\Model\Goods();
        $gdimg=$goods->where("gid={$gid}")->pluck("glistimg");
        $data = [
            'id'        => $gid, // 商品 ID
            'name'      => $gname,// 商品名称
            'num'       => $num, // 商品数量
            'price'     =>$price, // 商品价格
            'options' => $temp,   //商品规格
            'did'=>$did,//规格对应货品自增ID
            'glistimg'=>$gdimg
        ];
        $re=$data['num'];
        Cart::add($data);
        View::ajax($re,$type='JSON');

    }

    public function edit(){//编辑修改session
        $num=Q('post.num');//一个商品数量
        $p1=Q('post.p1');//一个商品总价框架自动算了
        $total=Q('post.s');//所有商品总价框架自动算了
        $sid=Q('post.sid');//当前编辑商品ID
        $data=array(
            'sid'=>$sid,// 唯一 sid，添加购物车时自动生成
            'num'=>$num
        );
        Cart::update($data);

    }


    public function del(){
        $sid=Q('get.sid');
//        unset($_SESSION['cart']['goods'][$sid]);
        Cart::del($sid);
        View::success('删除商品成功');
    }
}
//class ShopcarController extends Controller{
//
//    public function index(){
//        if(isset($_SESSION['cart'])){
//            $shopcar=$_SESSION['cart'];
//            $goods=$_SESSION['cart']['goods'];
//            View::with('goods',$goods);
//            View::with('shopcar',$shopcar);
//        }else{
//            View::with('shopcar',[]);
//            View::with('goods',[]);//修
//
//        }
//
//        if(isset($goods)){
//            foreach ($goods as $v){
//                $gid=($v['id']);//得到商品ID
////            p($v['options']);
//            }
//            $g=new \Common\Model\Goods();
//            $goodsData=$g->where("gid={$gid}")->find();
//            View::with('goodsData',$goodsData);
//        }else{
//            View::with('goodsData',[]);
//        }
//        p($goods);
////        p($_SESSION);
//        $cate=new \Common\Model\Cate();
//        $topCate=$cate->where("pid=0")->get();
//
//        //购物车
//        //购物车
//        View::with('topCate',$topCate);
//        View::make();
//    }
//    public function add(){
////        p(Q('post.'));
//        $gid=Q('post.gid');
//        $gname=Q('post.gname');
//        $num=Q('post.num');
//        $group=trim(Q('post.group'),',');
//        $daring=new \Common\Model\Darling();//关联货品表,查询当前组合ID
//        $did=$daring->where("grou IN ($group) AND shop_goods_gid=$gid")->pluck('did');//得到当前组合ID的自增ID(修改过grou)
//        $group=explode(',', $group);
//
//        p($group);
//        //前台处理
//        $name=trim(Q('post.name'),',');
//        $value=trim(Q('post.value'),',');
//        $name=explode(',',$name);
//        $value=explode(',', $value);
//
//        //前台处理
//
////        后台处理
//        //关联商品属性表
////        $temp=[];
////        foreach($group as $v){
////            $name=Db::table('shop_goods_pp')->where("shop_goods_gid={$gid}")->join('shop_type_pp','shop_goods_pp.shop_type_pp_tpid','=','shop_type_pp.tpid')->where("gpid={$v}")->lists('tpname');
////            foreach($name as $vv){
////                $temp["$vv"]= Db::table('shop_goods_pp')->where("shop_goods_gid=51")->join('shop_type_pp','shop_goods_pp.shop_type_pp_tpid','=','shop_type_pp.tpid')->where("gpid={$v}")->lists('gpvalue');
////
////            }
////
////
////        }
//        //后台处理
//
////        前台处理
//        $temp=[];
//            foreach($name as $k=>$vv){
//                $temp[$vv]=$value[$k];
//            }
//        p($temp);
//
////前台处理
//        $price=number_format(Q('post.price'));
//        //拿到当前商品的图片
//        $goods=new \Common\Model\Goods();
//        $gdimg=$goods->where("gid={$gid}")->pluck("glistimg");
//        $cate=new \Common\Model\Cate();
//        $topCate=$cate->where("pid=0")->get();
//
//        $data = [
//            'id'        => $gid, // 商品 ID
//            'name'      => $gname,// 商品名称
//            'num'       => $num, // 商品数量
//            'price'     =>$price, // 商品价格
//            'options' => $temp,   //商品规格
//            'did'=>$did,//规格对应货品自增ID
//            'glistimg'=>$gdimg
//        ];
//        Cart::add($data);
//
//    }
//
//    public function edit(){//编辑修改session
//        $num=Q('post.num');//一个商品数量
//        $p1=Q('post.p1');//一个商品总价框架自动算了
//        $total=Q('post.s');//所有商品总价框架自动算了
//        $sid=Q('post.sid');//当前编辑商品ID
//        $data=array(
//            'sid'=>$sid,// 唯一 sid，添加购物车时自动生成
//            'num'=>$num
//        );
//        Cart::update($data);
//
//    }
//
//
//    public function del(){
//        $sid=Q('get.sid');
////        unset($_SESSION['cart']['goods'][$sid]);
//        Cart::del($sid);
//        View::success('删除商品成功');
//    }
//}