<?php namespace Admin\Controller;

class BrandController extends CommonController{
    private $brand;
    public function __auto(){
        $this->brand=new \Common\Model\Brand();
    }
    public function index(){
        $page = Page::row(C('webSet.PAGE_BRAND'))->make(Db::table('shop_brand')->count());
        View::with('page',$page);
        $data=$this->brand->limit(Page::limit())->get();
        if(!$data) View::success('没有品牌,请先添加',U('add'));
        View::with('data',$data);
        View::make();
    }
    public function add(){
        if(IS_POST){
            if($this->brand->store()){
               View::success('品牌添加成功',U('index'));
            }
            View::error($this->brand->getError());
        }
        View::make();

    }
    public function  del(){
        $bid=Q('get.bid',0,'intval');
        $this->brand->where("bid={$bid}")->delete();
        View::success('删除成功',U('index'));
    }
    public function edit(){
        if(IS_POST){
            if($this->brand->edit()){
                View::success('编辑品牌成功',U('index'));
            }
            View::error($this->brand->getError());

        }
        $bid=Q('get.bid',0,'intval');
        $oldData=$this->brand->where("bid={$bid}")->find();
        View::with('oldData',$oldData);
        View::make();

    }

}
