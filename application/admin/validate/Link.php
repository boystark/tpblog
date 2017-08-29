<?php
namespace app\admin\validate;

use think\Validate;
/**
 * Created by PhpStorm.
 * User: kang
 * Date: 17-6-9
 * Time: 上午2:33
 */
class Link extends Validate
{
    protected $rule = [
        'title' => 'require|max:25',
        'url' => 'require',
    ];

    protected $message = [
        'title.require' => '链接标题必须要写',
        'title.max' => '标题长度必须小于25位',
        'url.max' => '链接地址必须填写',
    ];

    //验证场景
    protected $scene = [
        'add' => ['title','url'],
        'edit' => ['title','url'],
    ];
}