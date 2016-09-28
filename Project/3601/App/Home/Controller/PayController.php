<?php namespace Home\Controller;
use Hdphp\Controller\Controller;

class PayController extends Controller{

    public function index(){
        $goods=$_SESSION['cart']['goods'];
        foreach ($goods as $v){
            $gid=($v['id']);//得到商品ID
//
        }
        $g=new \Common\Model\Goods();
        $goodsData=$g->where("gid={$gid}")->find();
        //显示用户收货地址
        $uid=$_SESSION['in']['uid'];
        $address=Db::table('shop_user')->where("uid={$uid}")->pluck('address');
        if($address){
            $address=explode('|',$address);
            View::with('address',$address);
        }else{
            View::with('address',[]);
        }
        $payNumber=Cart::getOrderId();
        View::with('payNumber',$payNumber);
        View::with('goodsData',$goodsData);
        View::with('goods',$goods);
        View::make();
    }

    public function address(){//添加地址
        $data=Q('post.');
        $uid=$_SESSION['in']['uid'];
        $oldAdr=Db::table('shop_user')->where("uid={$uid}")->pluck('address');
        $address=$data['name'].','.$data['s_province'].$data['s_city'].$data['address'].','.$data['yzbm'].','.$data['number'];
        if($oldAdr){
            $newAdr=$oldAdr.'|'.$address;
            Db::table('shop_user')->where("uid={$uid}")->update(['address'=>$newAdr]);
        }else{
            Db::table('shop_user')->where("uid={$uid}")->update(['address'=>$address]);

        }
        View::ajax( $data, $type = "JSON" );
    }

    public function check(){//检测是否添加订单信息成功
        if(IS_POST){
            $order=new \Home\Model\Order();
            $address=trim(Q('post.adr'));
            $oid=$order->store($address);
            View::ajax( $oid, $type = "JSON" );
        }

    }

    public function pay(){
        //订单编号
        //总共金额
        //倒计时

        $oid=Q('get.oid',0,'intval');
        $order=new \Home\Model\Order();
        $orderData=$order->where("oid=$oid")->find();
        View::with('orderData',$orderData);
        View::make();

    }

    public function paid(){//付款改状态,改库存
        $oid=Q('post.oid',0,'intval');//拿到订单表ID
        $order=new \Home\Model\Order();//更改状态
        $order->where("oid={$oid}")->update(['ozhuangt'=>0]);//待发货状态
        $guige=Db::table('shop_orderlist')->where("olorder=$oid")->lists('olnumber,oguige');//拿到货品表自增ID
        $dar=new \Common\Model\Darling();//改库存
               foreach($guige as $k=>$v){
                   $dar->where("did=$v")->decrement('dstock',$k);
               }
               View::ajax($oid,$type='JSON');
    }


}
