<?php namespace Home\Controller;
use Hdphp\Controller\Controller;
//测试控制器
class IndexController extends Controller{
    private $cate;

	//构造函数
	public function __init(){
        $this->cate=new \Common\Model\Cate();
	}
    public function index(){
        $data=$this->cate->where('pid=0')->get();//得到顶级分类
        foreach($data as $k=>$v){
            $data[$k]['p']=$this->cate->where("pid={$v['cid']}")->get();//2级分类p

        }
        foreach($data as $k=>$v){
            if(empty($data[$k]['p'])) continue;
            foreach($data[$k]['p'] as $kk=>$vv){
                $data[$k]['p'][$kk]['s']=$this->cate->where("pid={$vv['cid']}")->get();//3级分类s
            }
        }


        //1楼  手机
        $phone=Db::table('shop_goods')->where("shop_type_tid=1")->get();
        //热搜
        $hotPhone=Db::table('shop_goods')->where("shop_type_tid=1")->orderBy('gclick','DESC')->limit(0,3)->get();
        //2楼  智能穿戴

        $wear=Db::table('shop_goods')->where("shop_type_tid=2")->get();
        $hotWear=Db::table('shop_goods')->where("shop_type_tid=2")->orderBy('gclick','DESC')->limit(0,3)->get();

        //3楼 智能家居
        $home=Db::table('shop_goods')->where("shop_type_tid=3")->get();
        $hotHome=Db::table('shop_goods')->where("shop_type_tid=3")->orderBy('gclick','DESC')->limit(0,3)->get();


       //热搜
        $hot=Db::table('shop_goods')->orderBy('gclick','DESC')->limit(0,15)->get();
        //热搜


        //新品速递(根据商品生成时间来排序)
        $new=Db::table('shop_goods')->orderBy('gsendtime','DESC')->limit(0,20)->get();
        //分配变量
        //热搜
        View::with('hotPhone',$hotPhone);
        View::with('hotWear',$hotWear);
        View::with('hotHome',$hotHome);
        //热搜
        View::with('hot',$hot);
        View::with('phone',$phone);
        View::with('home',$home);
        View::with('wear',$wear);
        View::with('new',$new);
        View::with('data',$data);

       View::make();

        //楼层遍历
        $goods=new \Common\Model\Goods();
        


    }

    //搜索功能
    public function sou(){

    }
}
