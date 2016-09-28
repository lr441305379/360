<?php namespace Common\Model;
use Hdphp\Model\Model;
class Type extends Model{
    protected $table='shop_type';//使用类型表

    protected $validate=array(//过滤非法字符


    );

    public function store(){
        if($this->create()){
            $arrType=explode(',',Q('post.tname'));//换成数组
            foreach($arrType as $value){
                $this->add(['tname'=>$value]);//添加类别

            }
            return true;//添加成功
        }
        return false;//添加失败

    }//添加功能

    public function edit(){//编辑功能
        if($this->create()){
            $this->save();
            return true;
        }
        return false;
    }
}