<?php
namespace app\admin\validate;

use think\Validate;
/**
 * Created by PhpStorm.
 * User: kang
 * Date: 17-6-9
 * Time: 上午2:33
 */
class Article extends Validate
{
    protected $rule = [
        'title'=> 'require|max:25',
        'cateid'=> 'require',
    ];

    protected $message = [
        'title.require' => '文章的标题一定要填写',
        'title.max' => '文章标题长度不能超过25位',
        'cateid.require' => '请选择文章所属栏目',
    ];

    //验证场景
    protected $scene = [
        'add' => ['title','cateid'],
        'edit' => ['title','cateid'],
    ];
}