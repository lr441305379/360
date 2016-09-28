<?php namespace Admin\Controller;
class WebController extends CommonController{
    public function index(){
        $model=new \Common\Model\Web();//实例化网站配置模型
        if(IS_POST){//有提交时
            foreach(Q('post.') as $name=>$value){//遍历提交表单的数据
                $model->where("name='{$name}'")->save(array('value'=>$value));//修改数据,更新网站配置表(webset)
            }
            file_put_contents("./Config/webSet.php",'<?php return '.var_export(Q('post.'),true).';');//更新到配置文件中
            View::success("修改成功");//提示成功信息
        }

        $data=$model->orderBy('type_id','ASC')->get();//显示旧数据
        View::with('data',$data);//分配变量
        View::make();//显示模板

    }
}