<?php namespace Home\Model;
use Hdphp\Model\Model;
class Order extends Model{
    protected $table='shop_order';//使用订单表
    protected $auto=array(//自动完成
        array('otime','time','function',3,1),
        array('onumber','orderNumber','method',3,1),
        array('ototal','total','method',3,1),
        array('ozhuangt','buff','method',3,1),
        array('ouser','ouser','method',3,1)
    );
    public function store($address){//添加订单表
        if($this->create()) {

            $this->data['oaddress']=$address;
            $oid=$this->add();
            $goods=$_SESSION['cart']['goods'];//商品详细
            $uid=$_SESSION['in']['uid'];//订单表关联ID
            $orderlist=new \Home\Model\Orderlist();
                foreach($goods as $v){
                    $data=[
                        'oguige'=>$v['did'],
                        'olnumber'=>$v['num'],
                        'oltotal'=>$v['total'],
                        'olorder'=>$oid,
                        'olgoods'=>$v['id'],
                        'oprice'=>$v['price']

                    ];
                    $orderlist->add($data);
                }
                //清空购物车
            unset($_SESSION['cart']);//返回之前的页面全部报错

            return $oid;

        }

    }
    public function orderNumber(){//订单表自动填充订单号
      return Cart::getOrderId();
    }
    public function buff(){//订单表自动填充订单状态
        return 2;//待付款
    }
    public function total(){//订单表自动填充总价
        $total=$_SESSION['cart']['total']+5;
        return $total;
    }
    public function ouser(){
        return $_SESSION['in']['uid'];
    }



}