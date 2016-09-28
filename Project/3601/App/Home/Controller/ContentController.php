<?php namespace Home\Controller;
use Hdphp\Controller\Controller;
class ContentController extends Controller{
    public function index(){
        $gid=Q('get.gid',0,'intval');
//        p($_SESSION);
        $cate=new \Common\Model\Cate();
        $cate=$cate->where('pid=0')->get();//得到顶级分类
        //商品属性表
        $goodsPP=new \Common\Model\Gpp();
        $goodsPPData=$goodsPP->where("shop_goods_gid={$gid}")->get();//去掉属性增加名称
        //组合规格名称
        $same=[];
        foreach ($goodsPPData as $v){
            $same[$v['shop_type_pp_tpid']][]=$v;
        }
        $tp=new \Common\Model\Type_pp();

        $end=[];
        foreach ($same as $v){
            foreach($v as $vv){

            }
            $end[]=[
                'name'=>$tp->where("tpid={$vv['shop_type_pp_tpid']} AND tptype=1")->pluck('tpname'),
                'value'=>$v
            ];
        }
//        p($end);
        foreach ($end as $v){
            foreach ($v['value'] as $vv){
//                p($vv['gpvalue']);
            }
        }
        //商品
        $goods=new \Common\Model\Goods();
        $goodsData=$goods->where("gid={$gid}")->find();
        //商品描述表
        $gdes=new \Common\Model\Gdes();
        $gdesData=$gdes->where("shop_goods_gid={$gid}")->find();
//        p($gdesData);
        if($gdesData['gdimg']){
            $gdimg=explode(',',$gdesData['gdimg'] );
            View::with('gdimg',$gdimg);
        }else{
            View::with('gdimg',[]);
        }
        View::with('gdesData',$gdesData);//分配商品描述
        View::with('goodsData',$goodsData);//分配商品


        View::with('end',$end);//分配规格参数

        $daring=new \Common\Model\Darling();//关联货品表,查询当前组合ID
        $dData=$daring->where("shop_goods_gid={$gid}")->get();//得到组合ID
        foreach($dData as $v){
        }


        View::with('cate',$cate);//分配分类
        View::make();
    }

    public function changeP(){//异步修改价格和库存,查看登录,
        $group=trim($_GET['group'],',');//接收组合ID

        $gid=Q('get.gid',0,'intval');//得到当前商品ID
        $daring=new \Common\Model\Darling();//关联货品表,查询当前组合ID
        $dData=$daring->where("shop_goods_gid={$gid}")->get();//得到组合ID

        $gpp=new \Common\Model\Gpp();//管理商品属性表,获得额外的价格
        //查价格,查总价
        $groupArr=explode(',', $group);
        $data=[];
        $price=0;
        $gprice=$_GET['goodsPrice'];
        foreach ($groupArr as $gpid) {
            $p = $gpp->where(['gpid'=>$gpid])->pluck('gpprice');
            $price += number_format($p);
       }
        $price+=$gprice;
        $data['price'] = $price;
        foreach($dData as $v){
//            p($v['group']);//和异步传输过来的数据相比较
            if($group==$v['grou']){//修改过关键词(前台显示改为grou 后台修改为group)
                $data['stock']=$v['dstock'];
            }
        }
        //检测登录
        $user=isset($_SESSION['in']);
        if($user){
            $data['user']=1;

        }else{
            $data['user']=0;
        }

        View::ajax($data, $type = "JSON");



    }

    public function checkU(){//单独异步检测登录状态
        $user=isset($_SESSION['in']);
        if($user){
            $data=1;

        }else{
            $data=0;
        }
        View::ajax($data,$type="JSON");
        
    }

    public function like(){//异步加入收藏
        $uid=$_SESSION['in']['uid'];
        $gid=Q('post.gid',0,'intval');
        $check=Db::table('shop_like')->where("userid=$uid AND goodsid=$gid")->get();
        if($check){
            $re=0;
        }else{
            $re=Db::table('shop_like')->insert(['userid'=>$uid,'goodsid'=>$gid]);
        }

        View::ajax($re,$type='JSON');


    }
}