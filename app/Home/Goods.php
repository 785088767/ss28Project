<?php

namespace App\Home;

use Illuminate\Database\Eloquent\Model;

class Goods extends Model
{
    // 指定表
  protected $table = 'home_goods';

  // 主键
  protected $primaryKey = 'id';

  // 维护时间戳
  public $timestamps = false;

  // 批量赋值的属性
  protected $fillable = ['gname','gpic','price','stock','display','salenum','addtime','gdesc','visitnum','cpid','fpid'];

  // 修改器
  public function getDisplayAttribute($value){
    $display = [0=>'已上架',1=>'未上架'];
  }

}
