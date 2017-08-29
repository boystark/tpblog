<?php
/**
 * Created by PhpStorm.
 * User: kang
 * Date: 17-6-8
 * Time: 上午12:57
 */

namespace app\admin\controller;

use app\admin\controller\Base;

use app\admin\model\Link as LinkModel;


class Link extends Base
{
    public function list()
    {
        $model= new LinkModel();
        $links = $model->paginate(3);
        $this->assign('link',$links);
        return $this->fetch();
    }

    public function add()
    {
        if(request()->isPost()){

            $data =[
                "title" => input('linktitle'),
                "url" => input('linkurl'),
                "des" => input('linkdes'),
            ];

            $validate = \think\Loader::validate('Link');

            if(!$validate->scene('add')->check($data)){
                $this->error($validate->getError());
                die;
            }


            if(db('Link')->insert($data)){
                return $this->success('添加链接成功','list');
            }else{
                return $this->error('添加链接失败！');
            }
            return;
        }
        return $this->fetch('add');
    }

    public function del(){
        $id = input('id');

        if(db('Link')->delete(input('id'))){
            $this->success("删除链接成功",'list');
        }else{
            $this->error("删除链接失败");
        }
    }

    public function edit(){
        $id = input('id');
        $Links = db('Link')->find($id);
        if (request()->isPost()){
            $data = [
                'id'=>input('linkid'),
                'title'=>input('linktitle'),
                'url'=>input('linkurl'),
                'des'=>input('linkdes'),
            ];
//验证
            $validate = \think\Loader::validate('Link');

            if(!$validate->scene('edit')->check($data)){
                $this->error($validate->getError());
                die;
            }

            if (db('Link')->update($data)){
                $this->success('修改管理员信息成功!','list');
            }else{
                $this->error('修改管理员信息失败!');
            }
p;

            return;
        }

        $this->assign('Links',$Links);

        return $this->fetch();

    }

}