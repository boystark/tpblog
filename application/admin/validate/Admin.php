<?php
namespace app\admin\validate;

use think\Validate;
/**
 * Created by PhpStorm.
 * User: kang
 * Date: 17-6-9
 * Time: 上午2:33
 */
class Admin extends Validate
{
    protected $rule = [
        'username' => 'require|max:25|unique:admin',
        'password' => 'require',
    ];

    protected $message = [
        'username.require' => '管理员名称必须要写',
        'username.max' => '长度必须小于25位',
        'username.unique' => 'username必须唯一',
        'password.max' => '密码必须填写',
    ];

    //验证场景
    protected $scene = [
        'add' => ['username'=>'require|unique:admin','password'],
        'edit' => ['username'=>'require|unique:admin'],
    ];
}