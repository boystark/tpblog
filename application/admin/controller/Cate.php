<?php
/**
 * Created by PhpStorm.
 * User: kang
 * Date: 17-6-8
 * Time: 上午12:57
 */

namespace app\admin\controller;

use app\admin\controller\Base;

use app\admin\model\Cate as CateModel;


class Cate extends Base
{
    public function list()
    {
        $model= new CateModel();
        $list = $model->paginate(3);
        $this->assign('list',$list);
        return $this->fetch();
    }

    public function add()
    {
        if(request()->isPost()){

            $data =[
                "catename" => input('catename'),
            ];

            $validate = \think\Loader::validate('Cate');

            if(!$validate->scene('add')->check($data)){
                $this->error($validate->getError());
                die;
            }


            if(db('cate')->insert($data)){
                return $this->success('添加栏目成功','list');
            }else{
                return $this->error('添加栏目失败！');
            }
            return;
        }
        return $this->fetch('add');
    }

    public function del(){
        $id = input('id');

        if(db('cate')->delete(input('id'))){
            $this->success("删除栏目成功",'list');
        }else{
            $this->error("删除栏目失败");
        }

    }

    public function edit(){
        $id = input('id');
        $cates = db('cate')->find($id);
        if (request()->isPost()){
            $data = [
                'id'=>input('id'),
                'catename'=>input('catename'),
            ];
//验证
            $validate = \think\Loader::validate('cate');

            if(!$validate->scene('edit')->check($data)){
                $this->error($validate->getError());
                die;
            }

            if (db('cate')->update($data)){
                $this->success('修改栏目信息成功!','list');
            }else{
                $this->error('修改栏目信息失败!');
            }
            return;
        }
        $this->assign('cates',$cates);
        return $this->fetch();
    }

}