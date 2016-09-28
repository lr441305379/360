<?php namespace Admin\Controller;
use Hdphp\Controller\Controller;
class CommonController extends Controller{
    public function __init(){//内置构造函数
        $this->autoLogin();//判断是否登录方法
        if(method_exists($this,'__auto' )){//自动执行__auto方法
            $this->__auto();//定义__auto方法为自动执行方法
        }
    }
    public function autoLogin(){//判断有无用户信息
        if(!isset($_SESSION['info'])){//如果没有缓存用户信息
            go(U('Login/index'));//跳转到首页登录界面
        }

    }

}