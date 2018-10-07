<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    // 定义表
  protected $table = 'home_type';

  // 主键
  protected $primaryKey = 'id';

  // 时间戳维护
  public $timestamps = false;

  // 可以被批量赋值的字段
  protected $fillable = ['name','pid','path','display'];

  // 中文替换
  public function getDisplayAttribute($value){
    $display = [0=>'展示',1=>'隐藏'];
    return $display[$value];
  }

}
