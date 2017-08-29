<?php
namespace app\admin\validate;

use think\Validate;
/**
 * Created by PhpStorm.
 * User: kang
 * Date: 17-6-9
 * Time: 上午2:33
 */
class Tag extends Validate
{
    protected $rule = [
        'tagname' => 'require|max:25|unique:taps',
    ];

    protected $message = [
        'tagname.require' => '标签必须要写',
        'tagname.max' => '标签长度必须小于25位',
        'tagname.unique'=>'标签必须是唯一的',
    ];

    //验证场景
    protected $scene = [
        'add' => ['tagname'=>'require|unique:taps'],
        'edit' => ['tagname'=>'require|unique:taps'],
    ];
}