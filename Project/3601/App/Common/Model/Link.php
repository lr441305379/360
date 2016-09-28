<?php namespace Common\Model;
use Hdphp\Model\Model;
class Link extends Model{
    protected $table='shop_link';//使用友链表
    protected $validate=array(//自动验证
        array('lname','required','友链名称必填',3,3,),
        array('lname','maxlen:40','友链名称长度超过最大值','',3,3,),
        array('url','required','友链地址',3,3,),
        array('url','maxlen:150','友链地址长度超过最大值',3,3,),
        array('sort','required','友链排序必填','',3,3,),
    );
    protected $auto=array(//自动完成
        array('addtime','time','function',3,1),
        array('logo','getLogo','method',3,3)

    );
    public function store(){//添加
        if($this->create()){
            $this->add();
            return true;
        }
        return false;
    }
    public function edit(){//编辑
        if($this->create()){
            $this->save();
            return true;
        }
        return false;
    }
    public function getLogo(){
        $oldImg=Q('post.logo');
        if($_FILES['logo']['error']==4){//没有上传
            if($oldImg){
                return $oldImg;
            }
            return '';
        }
        $files=Upload::type('jpg,jpeg,png,gif')->make();
        if($files){
            $thumbImg=str_replace(".{$files[0]['ext']}","_thumb.{$files[0]['ext']}",$files[0]['path']);
            $Img=Image::thumb($files[0]['path'],$thumbImg,50,50,6);
            if($oldImg){
                unlink($oldImg);
                $path=str_replace('_thumb','' ,$oldImg );
                unlink($path);
            }
            return $Img;
        }
    }

}