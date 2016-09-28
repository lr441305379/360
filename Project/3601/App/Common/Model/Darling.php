<?php namespace Common\Model;
use Hdphp\Model\Model;
class Darling extends Model{
    protected $table='shop_darling';

    protected $validate=array();

    protected $auto=array(
    );

    public function store(){
        if($this->create()){
           $gid=Q('post.shop_goods_gid',0,'intval');
            $tid=Q('post.tid');
            $group=implode(',',$tid );
            $_POST['group']=$group;
            unset($_POST['tid']);
            $data=$_POST;
            $oldData=Db::table("shop_darling")->where("shop_goods_gid={$gid}")->get();
            foreach ($oldData as $k=>$v){
              if($v['group']==$data['group']) View::success('货品规格已存在');
            }
            $this->add($data);
            return true;

        }
        return false;

    }

    public function edit(){
        $did=Q('get.did');
        if($this->create()){
            $tid=Q('post.tid');
            $group=implode(',',$tid );
            $_POST['group']=$group;
            unset($_POST['tid']);
            $data=$_POST;
            $this->where("did={$did}")->save($data);
            return true;
        }
        return false;
    }
    

}