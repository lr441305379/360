<?php namespace Common\Model;
use Hdphp\Model\Model;
class Cate extends Model{
    protected $table='shop_cate';

//    protected $auto=array(
//        array('shop_type_tid','getTpid','method',3,1)
//    );
//    public function getTpid(){
//        return Q('get.tid',0,'intval');
//    }



    public function store(){
        if($this->create()){
            $tid=$this->data['shop_type_tid'];
            $arrCate=explode(',',Q('post.cname'));//换成数组
            foreach($arrCate as $value){
                $this->add(['cname'=>$value,'shop_type_tid'=>$tid]);//添加类别
            }

            return true;//添加成功
        }
        return false;//添加失败

    }//添加顶级功能

    public function storeSon(){
        $cid=Q('get.cid',0,'intval');
        if(IS_POST){
            if($this->create()){
                $arrCate=explode(',',Q('post.cname'));//换成数组
                foreach($arrCate as $value){
                    $shop_type_tid=$this->where("cid={$cid}")->pluck('shop_type_tid');
                    $this->add(['cname'=>$value,'pid'=>$cid,'shop_type_tid'=>$shop_type_tid]);
                }
                return true;
            }
            return false;
        }


    }


    public function edit(){
        if($this->create()){
            $this->save();
            return true;

        }
        return false;
    }

    //获得除了自己和自己的子集的分类数据
    public function getNoMy($cid){
        //1.获得自己的子集的cid
        $cids = $this->getSon($this->get(),$cid);
        //压入自己的cid
        $cids[] = $cid;
        //2.排除自己和子集的cid的数据
        //SELECT * FROM category WHERE cid NOT IN(2,3,5);
        $where = "cid NOT IN(" . implode(',', $cids) . ")";
        return $this->where($where)->get();
    }

    //获得子集
    public function getSon($data,$cid){
        $temp = array();
        //循环所有数据
        foreach ($data as $v) {
            //如果找到当前分类的子集
            if($v['pid'] == $cid){
                //压入到临时数组
                $temp[] = $v['cid'];
                //递归调用不断合并
                $temp = array_merge($temp,$this->getSon($data, $v['cid']));
            }
        }
        //得到最终结果，返出
        return $temp;
    }


//    public function getNoMy($cid){
//        //1.获得自己的子级
//        $cids=$this->getSon($this->get(), $cid);
//        $cids[]=$cid;
//        //2.排除自己的子级
//        $where='cid not in('.implode(',',$cids) .')';
//        return $this->where($where)->get();
//    }
//    public function getSon($data,$cid){
//        $temp=array();//定义一个空的数组
//        foreach($data as $v){//遍历数组
//            if($cid==$v['pid']){//找到子级
//                $temp[]=$v['cid'];//压入空数组
//                $temp=array_merge($temp,$this->getSon($data,$v['cid']));//递归
//            }
//        }
//        return $temp;//返回数组
//    }
}