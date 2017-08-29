<?php
/**
 * Created by PhpStorm.
 * User: kang
 * Date: 17-6-16
 * Time: 上午1:05
 */

namespace app\admin\model;

use think\Model;

use think\Db;

class Admin extends Model
{
    public function login($data){

        $captcha = new \think\captcha\Captcha();

        if(!$captcha->check($data['code'])){
            return 4;
        }

        $user = Db::name('admin')->where('username','=',$data['username'])->find();

        if($user){

            if ($user['password'] == $data['password']){

                session('username',$user['username']);
                session('uid',$user['id']);

                return 3;  //登入成功 写入session
            }else{
                return 2;//密码错误
            }
        }else{
            return 1;//不存在返回1
        }
    }

}