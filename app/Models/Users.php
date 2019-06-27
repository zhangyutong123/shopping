<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    // 设置表名
    public $table = 'users';

    // 用户表 对 信息表
   	public function userinfo()
   	{
   		return $this->hasOne('App\Models\UsersInfo','uid');
   	}
    
    // 用户表 对 地址表
    public function address()
    {
    	return $this->hasOne('App\Models\Address','uid');
    }
}
