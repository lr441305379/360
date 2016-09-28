<?php namespace Admin\Controller;
class CateController extends  CommonController{
    protected $cate;
    public function __auto(){
        $this->cate=new \Common\Model\Cate();

    }
    public function index(){//显示分类
//        $page = Page::row(C('webSet.PAGE_CATE'))->make(Db::table('shop_cate')->count());
//        View::with('page',$page);
        $data=Db::table('shop_cate')->join('shop_type','shop_cate.shop_type_tid','=','shop_type.tid')->orderBy('shop_type_tid','ASC')->get();
        if(!$data){
            View::success('请先去添加分类',U('add'));
        }
        $data=Data::tree($data,'cname');
        View::with('data',$data);
        View::make();
    }

    public function del(){//删除分类
        $cid=Q('get.cid',0,'intval');
        $pid = $this->cate->where("cid={$cid}")->pluck('pid');//得到要删除的pid
        //找到当前分类的所有的子集把pid改成被删除分类的pid
        $this->cate->where("pid={$cid}")->update(array('pid'=>$pid));//把子级的PID更新成要删除的PID
        $this->cate->where("cid={$cid}")->delete();
        View::success('删除成功',U('index'));
    }
    public function add(){//添加顶级分类
        if(IS_POST){
            if($this->cate->store()){
                View::success('添加成功',U('index'));
            }
            View::error($this->cate->getError());

        }
        $shop_type=new \Common\Model\Type();
        $typeData=$shop_type->get();
        View::with('typeData',$typeData);
        View::make();

    }

    public function addSon(){
        if(IS_POST){

            if($this->cate->storeSon()){
                View::success('添加子分类成功',U('index'));
            }
            View::error($this->cate->getError());
        }
        $cid=Q('get.cid',0,'intval');
        $cate=$this->cate->where("cid={$cid}")->find();
        View::with('cate',$cate);
        View::make();
    }
    public function edit(){//编辑分类
        if(IS_POST){
            if($this->cate->edit()){
                View::success('编辑成功',U('index'));

            }
            View::error($this->getError());
        }
        //1.获得旧数据
        $cid = Q('get.cid',0,'intval');
        $oldData = $this->cate->where("cid={$cid}")->find();
        View::with('oldData',$oldData);
        //2.处理“所属分类”，除了自己和自己的子集
        $cateData = Data::tree($this->cate->getNoMy($cid),'cname');
        View::with('cateData',$cateData);

        View::make();
        
    }
}