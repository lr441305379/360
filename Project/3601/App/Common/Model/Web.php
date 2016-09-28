<?php namespace Common\Model;
use Hdphp\Model\Model;
class Web extends Model{
    protected $table='shop_webset';
    protected $validate=array(
        array('value','required','值必须填',3,3),
        array('value','maxlen:45','值超过最大允许长度',3,3)
    );
}