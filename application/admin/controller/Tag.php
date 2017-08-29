<?php
/**
 * Created by PhpStorm.
 * User: kang
 * Date: 17-6-8
 * Time: 上午12:57
 */

namespace app\admin\controller;

use app\admin\controller\Base;

//use app\admin\model\Link as LinkModel;


class Tag extends Base
{
    public function list()
    {

        $links = db('taps')->paginate(3);
        $this->assign('link',$links);
        return $this->fetch();
    }

    public function add()
    {
        if(request()->isPost()){

            $data =[
                "tagname" => input('tagname'),
            ];

            $validate = \think\Loader::validate('Tag');

            if(!$validate->scene('add')->check($data)){
                $this->error($validate->getError());
                die;
            }


            if(db('Taps')->insert($data)){
                return $this->success('添加标签成功','list');
            }else{
                return $this->error('添加标签失败！');
            }
            return;
        }
        return $this->fetch('add');
    }

    public function del(){
        $id = input('id');

        if(db('Taps')->delete(input('id'))){
            $this->success("删除标签成功",'list');
        }else{
            $this->error("删除标签失败");
        }
    }

    public function edit(){
        $id = input('id');
        $Tags = db('taps')->find($id);
        if (request()->isPost()){
            $data = [
                'id'=>$id,
                'tagname'=>input('tagname'),
            ];
//验证
            $validate = \think\Loader::validate('Tag');

            if(!$validate->scene('edit')->check($data)){
                $this->error($validate->getError());
                die;
            }

            if (db('Taps')->update($data)){
                $this->success('修改标签信息成功!','list');
            }else{
                $this->error('修改标签信息失败!');
            }

            return;
        }

        $this->assign('Tags',$Tags);

        return $this->fetch();

    }

}