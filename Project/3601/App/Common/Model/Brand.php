<?php namespace Common\Model;
use Hdphp\Model\Model;
class Brand extends Model{
    protected  $table="shop_brand";

    protected  $validate=array(
        array('bname','required','品牌名称不能为空',3,3),
    );
    
    protected  $auto=array(
        array('blogo','getThumb','method',3,3)
    );

    public function getThumb(){
        $oldImg=Q('post.blogo');//接收旧值
        //不上传图片
        if($_FILES['blogo']['error']==4){
            if($oldImg){
                return $oldImg;
            }
            return '';
        }
        $files=Upload::type('jpg,jpeg,png,gif')->make();//设置上传类型

        if($files){
            $thumbImg=str_replace(".{$files[0]['ext']}","_thumb.{$files[0]['ext']}" ,$files[0]['path']);
            $img=Image::thumb($files[0]['path'],$thumbImg,131,47,6);
            if($oldImg){
                unlink($oldImg);
                $path=str_replace('_thumb','' ,$oldImg );
                unlink($path);
            }
            return $img;//如果上传成功,存入thumb
        }
        $this->error=Upload::getError();//弹出错误信息
    }

    public function store(){
        if($this->create()){
            $this->add();
            return true;

        }
        return false;

    }

    public function edit(){
        if($this->create()){
            $this->save();
            return true;

        }
        return false;
    }

}