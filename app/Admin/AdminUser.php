<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class AdminUser extends Model
{
    // 定义表
  protected $table = 'admin_user';

  // 主键
  protected $primaryKey = 'id';

  // 时间戳维护
  public $timestamps = true;

  // 可以被批量赋值的字段
  protected $fillable = ['username','password','status','token'];

  // 中文替换
  public function getStatusAttribute($value){
    $status = [0=>'启用',1=>'禁用'];
    return $status[$value];
  }

}
