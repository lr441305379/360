<?php namespace Admin\Controller;
use Hdphp\Controller\Controller;
class LoginController extends Controller{
    public function index(){
        if(IS_POST){
            $code=Q('post.code',NULL,'strtoupper');
            if($code!=$_SESSION['code']) return;
            $username=Q('post.username');
            $data=Db::table('shop_adminuser')->where("username='{$username}'")->get();
            if(!$data) View::error('用户名或密码错误');
            $password=Q('post.password','','md5');
            if($password!=$data[0]['password']) View::error('用户名或密码错误');
            $_SESSION['info']=[
                'username'=>$username,
                'id'=>$data[0]['id'],
                'nickname'=>$data[0]['nickname']
            ];
            View::success('登录成功',U('Index/index'));


        }
        View::make();
    }
    public function code(){
        Code::num(C('webSet.CODE_LEN'))->font(C('webSet.CODE_FONT'))->fontSize(C('webSet.CODE_FONTSIZE'))->background(C('webSet.CODE_BG'))->width(C('webSet.CODE_WD'))->height(C('webSet.CODE_HT'))->fontColor(C('webSet.CODE_COLOR'))->make();//显示验证码
    }
    public function out(){
        session_unset();
        session_destroy();
        echo "<script> window.parent.location.href= '".U('Login/index')."'</script>";
    }
}