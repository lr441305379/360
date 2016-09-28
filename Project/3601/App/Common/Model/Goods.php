<?php namespace Common\Model;
use Hdphp\Model\Model;
class Goods extends Model{
    protected $table='shop_goods';

    protected $validate=array(
//        array('shop_cate_cid','required','分类必须添加',3,3),
//        array('shop_brand_bid','required','品牌必须添加',3,3),
//        array('gname','required','商品名称必须添加',3,3),
//        array('gmprice','required','市场价必须添加',3,3),
//        array('gprice','required','价格必须添加',3,3),
//        array('gclick','required','点击次数必须添加',3,3),
//        array('gstock','required','库存量必须添加',3,3),
//        array('glistimg','required','列表图必须添加',3,3),
//        array('gdimg','required','商品详情图必须添加',3,3),
//        array('gdimages','required','商品详细必须添加',3,3),

    );

    protected $auto=array(
        array('gsendtime','time','function',3,1),
        array('gno','time','function',3,1),
        array('shop_type_tid','getTid','method',3,1)

    );

    public function store(){//添加
        if($this->create()){
           $gid=$this->add();//商品表添加
            $gd=new \Common\Model\Gdes();//商品详情表添加
            $gd->create();
            $gdimg=Q('post.gdimg');
            if(is_array($gdimg)) $gdimg=implode(',',$gdimg );
            $gd->data['gdimg']=$gdimg;
            $gd->data['shop_goods_gid'] =$gid;
            $gd->add();
            //商品属性表添加
            $gpp=new \Common\Model\Gpp();
            foreach(Q('post.attr') as $tpid=>$v){
                if($v){
                    $data=array(
                        'gpvalue'=>$v,
                        'shop_type_pp_tpid'=>$tpid,
                        'shop_goods_gid'=>$gid
                    );
                    $gpp->add($data);

                }

            }
            //规格添加

            $spec = Q('post.spec');
            if($spec){
                $value = $spec['value'];
                foreach ($value as $taid => $v) {
                    foreach ($v as $kk => $vv) {
                        if($vv){//规格是否有值
                            $data = array(
                                'gpvalue'=>$vv,
                                'shop_type_pp_tpid'=>$taid,
                                'shop_goods_gid'=>$gid,
                                'gpprice'=>$spec['added'][$taid][$kk]
                            );
                            $gpp->add($data);

                        }

                    }
                }
            }
            return true;
        }
        return false;
    }

    public function edit(){//修改
        $gid=Q('post.gid',0,'intval');
        if($this->create()){
            $this->save();//商品表编辑
            $gd=new \Common\Model\Gdes();//商品详情表编辑
            $gd->create();
            $gdimg=Q('post.gdimg');
            if(is_array($gdimg)) $gdimg=implode(',',$gdimg );
            $gd->data['gdimg']=$gdimg;
            $gd->where("shop_goods_gid={$gid}")->save();
            //商品属性表添加
            $gpp=new \Common\Model\Gpp();
//            $gpid=$gpp->where("shop_goods_gid={$gid}")->
            $gpid=$gpp->where("shop_goods_gid={$gid}")->delete();
//            foreach($gpid as $k=>$vt) {
                foreach (Q('post.attr') as $tpid => $v) {
                    if ($v) {
                        $data = array(
                            'gpvalue' => $v,
                            'shop_type_pp_tpid' => $tpid,
                            'shop_goods_gid'=>$gid,
                        );
//                    p($data);exit;
                        $gpp->add($data);

                    }

                }
                //规格添加

//            }
            $spec = Q('post.spec');
            if ($spec) {
                $value = $spec['value'];
                foreach ($value as $taid => $v) {
                    foreach ($v as $kk => $vv) {
                        $data = array(
                            'gpvalue' => $vv,
                            'shop_type_pp_tpid' => $taid,
                            'gpprice' => $spec['added'][$taid][$kk],
                            'shop_goods_gid'=>$gid,
                        );
//                        p($data);exit;

                        $gpp->add($data);
                    }
                }
            }

            return true;
        }
        return false;

    }
    
    public function getTid(){
        $cid=Q('post.shop_cate_cid',0,'intval');
        $cate=new \Common\Model\Cate();
        return $data=$cate->where("cid={$cid}")->pluck('shop_type_tid');
    }






}