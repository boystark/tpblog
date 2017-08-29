<?php
/**
 * Created by PhpStorm.
 * User: kang
 * Date: 17-6-8
 * Time: 上午12:57
 */

namespace app\admin\controller;

use think\Controller;

class Base extends Controller
{
    public function _initialize()
    {
        if(!session('username')){
            $this->error("还没有登入系统，请先登入！",'login/index');
        }
    }
}

