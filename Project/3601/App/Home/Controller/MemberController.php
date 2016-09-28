<?php namespace Home\Controller;
use Home\Model\User;
use Hdphp\Controller\Controller;
class MemberController extends Controller{
    public function init(){
        if(!isset($_SESSION['in'])){
            go(U('Index/index'));
        }
        View::make();
    }
    public function index(){
        if(!isset($_SESSION['in'])){
            go(U('Index/index'));
        }
        View::make();


    }

    public function reg(){//注册
        if(IS_AJAX){
            $userModel = new User();
            if(!$userModel->store()){
                $this->ajax(['status'=>false,'message'=>$userModel->getError()]);
            }else{
                $this->ajax(['status'=>true,'message'=>'注册成功']);
            }
        }
        View::make();
    }
    public function login(){//登录
        if(IS_AJAX){
            $loginModel = new \Home\Model\Login();
            if(!$loginModel->store()){
                $this->ajax(['status'=>false,'message'=>$loginModel->getError()]);
            }else{
                $this->ajax(['status'=>true,'message'=>'登录成功']);
            }
     
        }

        View::make();
    }
    public function out(){//退出
        session_unset();
        session_destroy();
//        unset($_SESSION['in']);
        View::success('退出成功,回到首页',U('Index/index'));


    }

    public function member(){//订单显示
        //显示订单编号
        //显示时间
        //价格
        //商品图片
        //商品名称
        if(!isset($_SESSION['in'])){
            go(U('Index/index'));
        }
        $order=new \Home\Model\Order();
        $orderlist=new \Home\Model\Orderlist();
        $data=$order->get();
        foreach($data as $k=>$v){
            $data[$k]['value']=$orderlist->where("olorder={$v['oid']}")->join('shop_goods','shop_orderlist.olgoods','=','shop_goods.gid')->get();

        }
        $oz=$order->where("ozhuangt=4")->count();//关闭订单计算
        $or=$order->where("ozhuangt=2")->count();//待付款计算
        $of=$order->where("ozhuangt=0")->count();//待发货计算
        if($oz){
            View::with('oz',$oz);
        }else{
            View::with('oz',0);
        }
        if($or){
            View::with('or',$or);
        }else{
            View::with('or',0);

        }
        if($of){
            View::with('of',$of);
        }else{
            View::with('of',0);

        }
        View::with('data',$data);
        View::make();
    }
    Public function del(){//取消订单和删除订单
        $oid=Q('get.oid',0,'intval');
        $order=new \Home\Model\Order();
        $orderList=new \Home\Model\Orderlist();
        $order->where("oid={$oid}")->delete();
        $orderList->where("olorder={$oid}")->delete();
        View::success('操作成功');

    }

    public function change(){//自动修改订单状态
        $oid=Q('post.oid',0,'intval');
        $order=new \Home\Model\Order();
        $order->where("oid={$oid}")->update(['ozhuangt'=>4]);

    }

    public function like(){//收藏显示
        $like=new \Home\Model\Like();
        $uid=$_SESSION['in']['uid'];
        $likeData=$like->where("userid=$uid")->lists('goodsid');
        if($likeData){
            $goods=new \Common\Model\Goods();
            $likeData=implode(',',$likeData);
            $goodsData=$goods->where("gid IN ($likeData)")->get();

            View::with('goodsData',$goodsData);
        }else{

            View::with('goodsData',[]);
        }

        View::make();
    }

    public function likeDel(){//收藏删除
        $gid=Q('get.gid',0,'intval');
        $uid=$_SESSION['in']['uid'];
        $like=new \Home\Model\Like();
        $like->where("userid=$uid AND goodsid=$gid")->delete();
        View::success('删除收藏成功');
    }

    public function address(){//地址显示
        $address=new \Home\Model\User();
        $uid=$_SESSION['in']['uid'];
        $addressData=$address->where("uid=$uid")->pluck('address');
        if($addressData){
            $arrAdd=explode('|',$addressData);
            View::with('arrAdd',$arrAdd);

        }else{
            View::with('arrAdd',[]);

        }


        View::make();
    }
    public function adrDel(){//地址删除
        $k=Q('post.k',0,'intval');
        $address=new \Home\Model\User();
        $uid=$_SESSION['in']['uid'];
        $addressData=$address->where("uid=$uid")->pluck('address');
        if($addressData){
            $arrAdd=explode('|',$addressData);
            unset($arrAdd[$k]);
            $strArr=implode('|',$arrAdd);
            $address->where("uid=$uid")->update(['address'=>'']);
            $address->where("uid=$uid")->update(['address'=>$strArr]);

        }


    }

    public function modify(){//修改密码
        //原密码是否正确
        if(IS_POST){
            $uid=$_SESSION['in']['uid'];
            $user=new \Home\Model\User();
            $oldPwd=md5(Q('post.oldpassword'));
            $oldP=$user->where("uid={$uid}")->pluck('password');
            if($oldP!=$oldPwd) View::error('原密码错误');
            $newPwd=Q('post.newpassword');
            $confirmP=Q('post.confirmpassword');
            if($newPwd!=$confirmP) View::error('两次密码不一致');
            $newPwd=md5($newPwd);
            $user->where("uid={$uid}")->update(['password'=>$newPwd]);
            View::success('修改密码成功');
        }


        View::make();


    }
    public function code(){//验证码显示
        Code::num(1)->make();
    }
}