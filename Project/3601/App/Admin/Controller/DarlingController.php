<?php namespace Admin\Controller;
class DarlingController extends CommonController{
    private $darling;
    public function __auto(){
        $this->darling=new \Common\Model\Darling();
    }
    public function index(){
        //规格显示
        $page = Page::row(C('webSet.PAGE_GOODS'))->make(Db::table('shop_darling')->count());
        View::with('page',$page);
        $gid=Q('get.gid',0,'intval');//得到商品ID
        $data=$this->darling->where("shop_goods_gid={$gid}")->limit(Page::limit())->get();//拿到商品的货品表的数据
        $gpp=new \Common\Model\Gpp();//类型属性表
        //更改规格
        foreach($data as $k=>$v){//开始是一个字符串,转换为数组10,12  10,15
            if($data[$k]['group']==null) View::success("数据库有错误");
            $data[$k]['group']=explode(',',$v['group'] );//组合ID转换为数组

        }
//        p($data); 0=>10  1=>12
        foreach($data as $k=>$v){

            foreach($data[$k]['group'] as $kk=> $vv){
                $data[$k]['group'][$kk]= $gpp->where("gpid={$vv}")->pluck('gpvalue');//换成规格
            }

        }
//        p($data);//0=>5寸 1=>白色

        $good=new \Common\Model\Goods();//商品表
        $tid=$good->where("gid={$gid}")->pluck('shop_type_tid');//关联类型表ID
        $type=new \Common\Model\Type_pp();//类型属性表
        $typeData=$type->where("shop_type_tid={$tid}")->where("tptype!=0")->lists('tpid');//不要属性,只拿出规格ID
        $tname=$type->where("shop_type_tid={$tid}")->where("tptype!=0")->lists('tpname');//不要属性,只拿出规格名字
//        $tpid=implode(',',$typeData );//转化成字符串
//        $gppData=$gpp->where("shop_goods_gid={$gid}")->where("shop_type_pp_tpid in (".$tpid.")")->get();
//        p($gppData);//要添加的规格
//        p($tname);
//        p($data);

        $tp=new \Common\Model\Type_pp();
        $tpData=$tp->where("shop_type_tid={$tid} AND tptype=1")->get();
//        p($tpData);
//        p($data);

        View::with('tname',$tname);
//        View::with('gppData',$gppData);
        View::with('data',$data);
        View::make();
    }
    public function add(){//添加货品
        $gid=Q('get.gid');
        if(IS_POST){
     

            if($this->darling->store()){
                View::success('货品添加成功');

            }
            View::error($this->darling->getError());


        }
        //1.去商品属性表里查找有无属性 ,若没有则不添加规格
        $gpp=new \Common\Model\Gpp();
        $data=$gpp->join('shop_type_pp','shop_type_pp.tpid','=','shop_goods_pp.shop_type_pp_tpid')->where("shop_goods_gid={$gid} AND tptype=1")->get();
//       p($data);
        if(!$data) View::success("商品没有添加规格,请先去添加规格",U('Goods/index'));
        $newdata=[];
        foreach ($data as $k=>$v){
            $newdata[$v['tpname']][]=[
                $v['gpid']=>$v['gpvalue']

            ];
        }
//        p($newdata);

        //2.有了规格,显示可以添加的规格
        //排除属性
       //关联商品表和类型属性表
//  关联商品表和类型属性表      $gt=Db::table('shop_goods')->where("gid={$gid}")->join('shop_type_pp',"shop_goods.shop_type_tid",'=','shop_type_pp.shop_type_tid')->where("tptype=1")->get();
////        p($gt);
//        foreach($gt as $k=>$v){
//            $gt[$k]['tpvalue']=explode(',',$v['tpvalue'] );//规格转换为数组
//        }
//        $tmp=[];
//        foreach($data as $k=>$vr){
//            $tmp[]=$data[$k]['gpvalue'];
//        }
//        p($tmp);//商品添加那里添加的规格和属性
//        foreach($gt as $k=>$v){
//            $gt[$k]['tpvalue']=array_intersect($gt[$k]['tpvalue'],$tmp );//只留商品属性里面的规格
//        }
//        p($gt);
//        foreach ($gt as $k=>$g){
//            $gt[$k]['tpid']=[];
//            foreach ($gt[$k]['tpvalue'] as $tt=>$t){
//                $gt[$k]['tpid'][]=1;
//            }
//        }
//        $newdata=$gpp->join()->where("shop_goods_gid={$gid}")->get();
        //传递gpid
//        $gpp->where("shop_goods_gid={$gid} AND gpvalue='{$t}'")->pluck('gpid');
        View::with('newdata',$newdata);
        
        View::make();


    }

    public function edit(){
        $gid=Q('get.shop_goods_gid');
        if(IS_POST){
            if($this->darling->edit()){
                View::success('编辑货品成功',U(''));
            }
            View::error($this->darling->getError());
        }

        //显示旧的数据

        $did=Q('get.did',0,'intval');
//        p($did);
        $oldData=$this->darling->where("did={$did}")->find();
        $group=explode(',',$oldData['group'] );
//        p($group);

//        p($oldData);
        $gid=$oldData['shop_goods_gid'];
        $gpp=new \Common\Model\Gpp();
        $data=$gpp->join('shop_type_pp','shop_type_pp.tpid','=','shop_goods_pp.shop_type_pp_tpid')->where("shop_goods_gid={$gid} AND tptype=1")->get();
//       p($data);
        if(!$data) View::success("商品没有添加规格,请先去添加规格",U('Goods/index'));
        $newdata=[];
        foreach ($data as $k=>$v){
            $newdata[$v['tpname']][]=[
                $v['gpid']=>$v['gpvalue']

            ];
        }
//        p($newdata);
        View::with('group',$group);//商品组合格式
        View::with('newdata',$newdata);//商品总格式
        View::with('oldData',$oldData);//旧数据
        View::make();



    }

    public function del(){
        $did=Q('get.did',0,'intval');
        $this->darling->where("did={$did}")->delete();
        View::success('删除货品成功');
    }
}

















































//        $good=new \Common\Model\Goods();//商品表
//        $tid=$good->where("gid={$gid}")->pluck('shop_type_tid');//关联类型表
//        $type=new \Common\Model\Type_pp();//类型属性表
//        $typeData=$type->where("shop_type_tid={$tid}")->where("tptype!=0")->lists('tpid');//拿到所有的规格ID
//        $tname=$type->where("shop_type_tid={$tid}")->where("tptype!=0")->lists('tpname');//拿到所有的规格名字
//        $tpid=implode(',',$typeData );//未经过滤的
//        p($tname);
//        p($tpid);
//        $gppData=$gpp->where("shop_goods_gid={$gid}")->where("shop_type_pp_tpid in (".$tpid.")")->get();
//        $goods=new \Common\Model\Goods();
////        $data=$goods->where("gid={$gid}")->join("shop_goods_pp",'shop_goods.gid','=','shop_goods_pp.shop_goods_gid')->get();
////        $data=$goods->where("gid={$gid}")->join('shop_type_pp','shop_goods.shop_type_tid','=','shop_type_pp.shop_type_tid')->where("tptype!=0")->get();
//        $gpp=new \Common\Model\Gpp();
//        $gppData=$gpp->where("shop_goods_gid={$gid}")->get();
////        foreach($data as $k=>$v){
////            $data[$k]['tpvalue']=explode(',',$v['tpvalue'] );
////        }
//
//        p($gppData);
////        View::with('data',$data);
//        View::make();