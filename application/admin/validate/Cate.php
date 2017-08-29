<?php
namespace app\admin\validate;

use think\Validate;
/**
 * Created by PhpStorm.
 * User: kang
 * Date: 17-6-9
 * Time: 上午2:33
 */
class Cate extends Validate
{
    protected $rule = [
        'catename' => 'require|max:25|unique:cate',
    ];

    protected $message = [
        'catename.require' => '栏目名称必须要写',
        'catename.max' => '栏目长度必须小于25位',
        'catename.unique' => '栏目已经存在',
    ];

    //验证场景
    protected $scene = [
        'add' => ['catename'=>'require|unique:cate'],
        'edit' => ['catename'=>'require|unique:cate'],
    ];
}