<?php namespace Common\Model;
use Hdphp\Model\Model;
class Type_pp extends Model{
    protected $table='shop_type_pp';//使用类型属性表
    
    protected  $validate=array();
    protected $auto=array(
        array('shop_type_tid','getTpid','method',3,1)
        
    );
    public function getTpid(){
        return Q('get.shop_type_tid',0,'intval');
    }
    public function index(){
        

    }

    public function  store(){
        if(!$this->create()) return false;
            $this->add();
            return true;
    }

    public function edit(){//编辑
        if($this->create()){
            $this->save();
            return true;
        }
        return false;

    }

    public function del(){

    }
}
