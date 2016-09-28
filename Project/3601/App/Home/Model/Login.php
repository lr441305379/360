<?php namespace Home\Model;
use Hdphp\Model\Model;
use Hdphp\View\View;

class Login extends Model{
    protected $table="shop_user";
    protected $auto = [

    ];

    protected $validate = [
        ['username','required','用户名必填',3,3],
        ['password','required','密码必填',3,3],
        ['password','minlen:6','密码不得少于6位',3,3],
        ['code','required','验证码必填',3,3],
        ['code','_code','验证码不正确',3,3],
        ['username','_username','用户名不可以使用',3,3],
        ['password','check','密码错误',3,3]


    ];

    public function _code(){
        $code = Q('post.code');
        if(strtolower($code) != strtolower($_SESSION['code'])){
            return false;
        }
        return true;
    }

    /**
     * 自动验证的自定义方法,判断用户名是否存在
     * @return bool
     */
    public function _username(){//判断用户名是否已经注册
        $username = Q('post.username');
        $data = $this->where(['username'=>$username])->find();
        if($data) return true;
        return false;
    }

    public function check(){
        $user=Q('post.username');
        $pwd=$this->where(['username'=>$user])->pluck('password');
        $nPWd=md5(Q('post.password'));
        if($nPWd==$pwd){
            return true;
        }
        return false;
    }



    public function store(){//登录
        $username=Q('post.username');
        $user = $this->where(['username'=>$username])->pluck('uid');
        if($this->create()){
            $_SESSION['in']['uid']=$user;
            $_SESSION['in']['username']=$username;
            return true;

        }
        return false;
    }

 

}