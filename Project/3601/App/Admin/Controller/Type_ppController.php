<?php namespace Admin\Controller;

class Type_ppController extends CommonController{
    private $type_pp;
    public function __auto(){
        $this->type_pp=new \Common\Model\Type_pp();
    }
    public function index(){

        $tid=Q('get.tid',0,'intval');
        $data=$this->type_pp->where("shop_type_tid='{$tid}'")->get();
        View::with('data',$data);
        View::make();

    }
    public function add(){//添加类型
        $tid=Q('get.shop_type_tid',0,'intval');
        if($this->type_pp->store()){
            View::success("添加成功",U('index',array('tid'=>$tid)));
        }
        View::make();

    }
    public function edit(){//编辑类型
        $tpid=Q('get.tpid',0,'intval');
        $data=$this->type_pp->where("tpid={$tpid}")->find();
        $shop_type_tid=$data['shop_type_tid'];
        if(IS_POST){
            if($this->type_pp->edit()){
                View::success('编辑成功',U('index',array('tid'=>$shop_type_tid)));

            }
            View::error($this->getError());

        }

        View::with('data',$data);
        View::make();


    }
    public function del(){//删除类型

        $tpid=Q('get.tpid',0,'intval');
        $this->type_pp->where("tpid={$tpid}")->delete();
        View::success('删除成功',U('Type_pp/index'));
    }

}