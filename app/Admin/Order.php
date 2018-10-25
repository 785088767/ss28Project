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
  protected $fillable = ['oid','uid','total','status','addtime','paytime','rectime'];

  // 关联用户表
  public function users(){
    return $this->belongsTo('App\Admin\Users','uid');
  }
}
