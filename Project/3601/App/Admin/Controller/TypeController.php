<?php namespace Admin\Controller;
use Hdphp\Controller\Controller;
class TypeController extends CommonController{
    private $type;
    public function __auto(){
        $this->type=new \Common\Model\Type();

    }
    public function add(){//添加类别
        if(IS_POST){
            if($this->type->store()){
                View::success('添加成功',U('index'));
            }
            View::error('添加失败',U('add'));

        }
        View::make();

    }
    public function index(){
        $data=$this->type->get();
        if(!$data) View::success('没有类型,请先添加',U('add'));
        View::with('data',$data);
        View::make();
    }

    public function del(){//删除
        //判断分类下是否有商品,如果有,则不能删除
        //判断有无属性,若有属性,先删除属性
        $tid=Q('get.tid',0,'intval');
        $this->type->where("tid={$tid}")->delete();
        $type_pp=new \Common\Model\Type_pp();
        $data=$type_pp->where("shop_type_tid={$tid}")->get();
        if($data) $type_pp->where("shop_type_tid={$tid}")->delete();
        View::success('删除成功',U('index'));
    }

    public function edit(){
        $tid=Q('get.tid',0,'intval');
        if(IS_POST){
            if($this->type->edit()){
                View::success('编辑成功',U('index'));
            }
            View::error($this->model->getError());
        }

        //显示旧数据
        $oldData=$this->type->where("tid={$tid}")->find();
        View::with('oldData',$oldData);
        View::make();


    }

}