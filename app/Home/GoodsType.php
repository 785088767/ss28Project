<?php

namespace App\Home;

use Illuminate\Database\Eloquent\Model;

class GoodsType extends Model
{
    // 指定表
  protected $table = 'home_type';

  // 主键
  protected $primaryKey = 'id';

  // 维护时间戳
  public $timestamps = false;

  // 批量赋值的属性
  protected $fillable = ['name','pid','path','display'];

  // 修改器
  public function getDisplayAttribute($value){
    $display = [0=>'已显示',1=>'隐藏'];
  }
}
