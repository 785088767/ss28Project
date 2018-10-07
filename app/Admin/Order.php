<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    //定义表
  protected $table = 'admin_orders';

  // 主键
  protected $primaryKey = 'id';

  // 时间戳维护
  public $timestamps = false;

  // 批量赋值字段
  protected $fillable = ['oid','gid','num','total','status','addtime','paytime'];

    /**
   * 获得此订单所属的物品。
   */
  public function goods()
  {
      return $this->belongsTo('App\Admin\Goods','gid');
  }

  // 中文替换
  public function getStatusAttribute($value){
    $status = [0=>'等待付款',1=>'发货',2=>'等待确认收货',3=>'交易成功'];
    return $status[$value];
  }
}
