<?php namespace Admin\Controller;
class LinkController extends CommonController{
    private $model;
    public function __auto(){
        $this->model=new \Common\Model\Link();
    }
    public function index(){
        //设置分页，先设置每个分页的条数,然后统计总数,然后分配变量
        $page=Page::row(C('webSet.PAGE_LINK'))->make(Db::table('link')->count());
        View::with('page',$page);
        $data=$this->model->limit(Page::limit())->get();
        if(!$data) View::success('没有数据',U('add'));
        View::with('data',$data);
        View::make();//显示模板
    }
    public function add(){//添加友链
        if(IS_POST){
            if($this->model->store()){
               View::success('添加成功',U('index'));
            }
            View::error($this->model->getError());
        }
        View::make();


    }
    public function edit(){//编辑友链
        if(IS_POST){
            if($this->model->edit()){
                View::success('编辑成功',U('index'));
            }
            View::error($this->model->getError());
        }
//        显示旧数据
        $lid=Q('get.lid',0,'intval');
        $oldData=$this->model->where("lid={$lid}")->first();
        View::with('oldData',$oldData);
        View::make();//显示模板
    }
    public function del(){//删除友链
        $lid=Q('get.lid',0,'intval');
        $this->model->where("lid={$lid}")->delete();
        View::success('删除成功',U('index'));
    }
    public function del(){
        $lid=Q('get.lid',0,'intval');
        $this->model->where("lid={$lid}")->delete();
        View::success("删除成功",U('index'));

    }

}