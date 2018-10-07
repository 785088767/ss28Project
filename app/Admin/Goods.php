<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class Goods extends Model
{
    //定义表
  protected $table = 'home_goods';

  // 主键
  protected $primaryKey = 'id';

  // 时间戳维护
  public $timestamps = true;

  // 批量赋值字段
  protected $fillable = ['cid','bid','gname','gpic','price','stock','display','salenum','gdesc'];

  // 中文替换
  public function getDisplayAttribute($value){
    $display = [0=>'上架中',1=>'已下架'];
    return $display[$value];
  }
}
