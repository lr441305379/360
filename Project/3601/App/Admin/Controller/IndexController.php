<?php namespace Admin\Controller;
use Hdphp\Controller\Controller;
//测试控制器
class IndexController extends CommonController{

	//构造函数
	public function __auto(){
	}
	
    //动作
    public function index(){
        if(!isset($_SESSION['info'])){
            go(U('Login/index'));

        }
       View::make();

    }

    public function welcome(){
        View::make();
    }
    public function changePassword(){

        if(IS_POST) {
            $newPwd = Q('post.newPassword');//得到提交后的新密码
            if (strlen($newPwd) < 6) View::error('新密码少于6位');
            $cfPwd = Q('post.confirmPassword');//得到提交后的确认密码
            if ($cfPwd !== $newPwd) View::error('两次输入密码不一致');
            $uid = $_SESSION['info']['id'];//$_SESSION['info']存了用户名和用户ID两个信息
            $data = Db::table('shop_adminuser')->where("id={$uid}")->get();//使用GET获取的是全部数据,是二维数组
            $oldPwd = Q('post.oldPassword', '', 'md5');//把旧密码用MD5加密
            if ($oldPwd != $data[0]['password']) View::error('原密码错误');//比较旧密码的正确性
            Db::table('shop_adminuser')->where("id={$uid}")->update(['password' => md5($newPwd)]);//更新密码
            View::success('修改成功',U('Login/out'));//成功后退出,重新登录
        }
        View::make();//显示模板


    }
}
