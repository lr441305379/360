<?php namespace Home\Model;
use Hdphp\Model\Model;
class User extends Model{
    protected $table="shop_user";
    protected $auto = [
        ['password','md5','function',3,3]
    ];

    protected $validate = [
        ['username','required','用户名必填',3,3],
        ['password','required','密码必填',3,3],
        ['password','minlen:6','密码不得少于6位',3,3],
        ['code','required','验证码必填',3,3],
        ['code','_code','验证码不正确',3,3],
        ['username','_username','用户名已存在',3,3],
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
    public function _username(){
        $username = Q('post.username');
        $data = $this->where(['username'=>$username])->find();
        if($data) return false;
        return true;
    }

    public function store(){//注册
        if($this->create()){
            $this->add();
            return true;

        }
        return false;
    }


}