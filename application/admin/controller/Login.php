<?php
/**
 * Created by PhpStorm.
 * User: kang
 * Date: 17-6-8
 * Time: 上午12:57
 */

namespace app\admin\controller;

use think\Controller;

use app\admin\model\Admin;

class Login extends Controller
{
    public function index()
    {
        if(request()->isPost()){
            $admin = new Admin();
            $data = input('post.');

            $num = $admin->login($data);

            switch ($num){
                case 1:
                    $this->error('用户不存在');
                    break;
                case 2:
                    $this->error('密码错误');
                    break;
                case 3:
                    $this->success('登入成功,为您转跳...','index/index');
                    break;
                case 4:
                    $this->error('验证码错误');
                    break;
                default:
                    $this->error('未知错误！');
                    break;
            }
        }
        return $this->fetch('login');
    }

}