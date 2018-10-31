<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    // 定义表
  protected $table = 'home_user';

  // 主键
  protected $primaryKey = 'id';

  // 时间戳维护
  public $timestamps = false;

  // 可以被批量赋值的字段
  protected $fillable = ['loginname','password','email','phone','truename','sex','status','level','token'];

  // 中文替换
  public function getStatusAttribute($value){
    $status = [0=>'启用',1=>'禁用'];
    return $status[$value];
  }
  // public function getSexAttribute($value){
  //   $sex = [0=>'女',1=>'男'];
  //   return $sex[$value];
  // }
  // public function getLevelAttribute($value){
  //   $level = [0=>'普通会员',1=>'高级会员',2=>'土豪',3=>'测试账号'];
  //   return $level[$value];
  // }

}
