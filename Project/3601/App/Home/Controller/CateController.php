<?php namespace Home\Controller;
use Common\Model\Cate;
use Hdphp\Controller\Controller;


class CateController extends Controller{
    public function index(){
        $cid=Q('get.cid',0,'intval');//得到地址栏的cid
        $cate=new \Common\Model\Cate();//分类
        $goods=new \Common\Model\Goods();//商品
        $cids=$cate->getSon($cate->get(), $cid);//子类
        $cids[]=$cid;//当前类
        $gids=$goods->where("shop_cate_cid IN(" . implode(',',$cids) . ")")->lists('gid');//当前类下的商品ID
        if($gids){
            $goodspp=new \Common\Model\Gpp();//商品属性
            $gppData=$goodspp->where("shop_goods_gid  IN(" . implode(',',$gids) . ")" )->groupBy('gpvalue')->get();//得到所有商品属性
//            p($gppData);
            $sameTemp=[];//组合数组
            foreach($gppData as $v){
                $sameTemp[$v['shop_type_pp_tpid']][]=$v;

            }
//            p($sameTemp);
            $type=new \Common\Model\Type_pp();
            $name=[];

            foreach ($sameTemp as $v ){
                foreach($v as $vv){
                }
                $name[]=[
                    'name'=>$type->where("tpid={$vv['shop_type_pp_tpid']}")->pluck('tpname'),
                    'value'=>$v
                ];

            }


            View::with('name',$name);

            $num=count($name);
           //正常
            if($num){
                $param=isset($_GET['param'])? explode('_',$_GET['param']): array_fill(0,$num,0);
                View::with('param',$param);
                //正常
                $finalGid=$this->filter($param,$gids);
//                p($finalGid);
                if($finalGid){
                    $data=$goods->where("gid  IN(" . implode(',',$finalGid) . ")")->get();
                    View::with('data',$data);
                }else{
                    View::with('data',[]);
                }


            }

        }else{
            View::with('name',[]);
            View::with('data',[]);

        }

        $cate=new Cate();
        $cate=$cate->where('pid=0')->get();//得到顶级分类

        if(IS_POST){
            $sou=trim(Q('post.sou'));//得到搜索的数据
            $data=Db::table('shop_goods')->where("gname like '%{$sou}%'")->get();
            View::with('data',$data);

        }
        View::with('cate',$cate);  

        View::make();

    }

    private function filter($param,$Cidgids){//获得商品ID
        $goodsPP=new \Common\Model\Gpp();
        $gidPP=[];
        foreach($param as $gpid){
            if($gpid){
                $gpvalue=$goodsPP->where("gpid={$gpid}")->pluck('gpvalue');
                $gidPP[]=$goodsPP->where(['gpvalue'=>$gpvalue])->lists('shop_goods_gid');//拿出商品ID
            }

        }

        if($gidPP){
            $gid = $gidPP[0];
            foreach ($gidPP as $v) {
                $gid = array_intersect($v,$gid);
            }
            //因为$gid有可能是其他分类的gid,那么为了确保是当前分类,再次取交集
            $finalGids = array_intersect($gid,$Cidgids);
        }else{//如果全部是"不限"的时候
            $finalGids = $Cidgids;
        }

        return $finalGids;
        
    }

    public function sou(){//搜索功能


    }
}