<?php
/**
 * Created by PhpStorm.
 * User: kang
 * Date: 17-6-8
 * Time: 上午12:57
 */

namespace app\admin\controller;
use app\admin\model\Admin as AdminModel;

use app\admin\controller\Base;

class Admin extends Base
{
    public function list()
    {
        $model= new AdminModel();
        $list = $model->paginate(3);
        $this->assign('list',$list);
        return $this->fetch();
    }

    public function add()
    {
        if(request()->isPost()){

            $data =[
                "username" => input('username'),
                "password" => input('password'),
            ];

            $validate = \think\Loader::validate('Admin');

            if(!$validate->scene('add')->check($data)){
                $this->error($validate->getError());
                die;
            }


            if(db('admin')->insert($data)){
                return $this->success('添加成功','list');
            }else{
                return $this->error('添加失败！');
            }
            return;
        }
        return $this->fetch('add');
    }

    public function del(){
        $id = input('id');
        if($id != 1){
            if(db('admin')->delete(input('id'))){
                $this->success("删除管理员成功",'list');
            }else{
                $this->error("删除管理员失败");
            }
        }else{
            $this->error("初始化管理员不能删除");
        }

    }

    public function edit(){
        $id = input('id');
        $admins = db('admin')->find($id);
        if (request()->isPost()){
            $data = [
                'id'=>input('id'),
                'username'=>input('username'),
            ];

            if(input('password')){
                $data['password']=input('password');
            }else{
                $data['password']=$admins['password'];
            }
//验证
            $validate = \think\Loader::validate('Admin');

            if(!$validate->scene('edit')->check($data)){
                $this->error($validate->getError());
                die;
            }
            if($id > 1){
               $sava =db('admin')->update($data);
                if ($sava !==false){
                    $this->success('修改管理员信息成功!','list');
                }else{
                    $this->error('修改管理员信息失败!');
                } 
            }else{
                $this->error('抱歉：初始化管理员无法修改!');
            }
            
            return;
        }

        $this->assign('admins',$admins);

        return $this->fetch();

    }

    public function logout(){

        session(null);
        $this->success('退出成功','login/index');
    }

}