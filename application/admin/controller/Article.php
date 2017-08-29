<?php
/**
 * Created by PhpStorm.
 * User: kang
 * Date: 17-6-20
 * Time: 下午10:00
 */
namespace app\admin\controller;

use app\admin\controller\Base;

use app\admin\model\Article as ArticleModel;


class Article extends Base
{
    public function list()
    {
//        $model= new ArticleModel();
//        $list = $model->paginate(3);

//        链接查询

//        $list = db("article")->alias('a')->join('cate c','c.id=a.cateid')
//            ->field('a.id,a.title,a.pic,a.author,a.state,c.catename')->paginate(3);
//关联查询
        $model= new ArticleModel();
        $list = $model->paginate(3);

        $this->assign('list',$list);
        return $this->fetch();
    }

    public function add()
    {
        if(request()->isPost()){
//            dump($_POST);die;
            $data =[
                "title" => input('title'),
                "author" => input('author'),
                "descri" => input('descri'),
                "keywords" => str_replace('，',',',input('keywords')),
                "content" => input('content'),
                "time" => time(),
                "cateid" => input('cateid'),
                "clicknum" => 0,
            ];

            if(input('state')=='on'){
                $data['state']=1;
            }

            if($_FILES['pic']['tmp_name']){
                $file = request()->file('pic');
                $info = $file->move(ROOT_PATH.'public'.DS.'static/uploads');
                $data['pic'] = 'uploads/'.$info->getSaveName();
            }

            $validate = \think\Loader::validate('Article');

            if(!$validate->scene('add')->check($data)){
                $this->error($validate->getError());
                die;
            }


            if(db('article')->insert($data)){
                return $this->success('添加文章成功','list');
            }else{
                return $this->error('添加文章失败！');
            }
            return;
        }

        $cateres = db('cate')->select();
        $this->assign('cateres',$cateres);
        return $this->fetch('add');
    }

    public function del(){
        $id = input('id');

        if(db('Article')->delete(input('id'))){
            $this->success("删除文章成功",'list');
        }else{
            $this->error("删除文章成功");
        }

    }

    public function edit(){
        $id = input('id');

        $articles = db('Article')->find($id);

        if (request()->isPost()){
            $data = [
                'id'=>input('id'),
                "title" => input('title'),
                "author" => input('author'),
                "descri" => input('descri'),
                "keywords" => str_replace('，',',',input('keywords')),
                "content" => input('content'),
                "cateid" => input('cateid'),
            ];

            if(input('state')=='on'){
                $data['state']=1;
            }else{
                $data['state']=0;
            }

            if($_FILES['pic']['tmp_name']){
                //删除原来的图片 上传新图片
                @unlink(SITE_URL.'/public/static'.$articles['pic']);
                $file = request()->file('pic');
                $info = $file->move(ROOT_PATH.'public'.DS.'static/uploads');
                $data['pic'] = 'uploads/'.$info->getSaveName();
            }

//验证
            $validate = \think\Loader::validate('Article');

            if(!$validate->scene('edit')->check($data)){
                $this->error($validate->getError());
                die;
            }

            if (db('Article')->update($data)){
                $this->success('修改文章信息成功!','list');
            }else{
                $this->error('修改文章信息失败!');
            }


            return;
        }

        $this->assign('marticle',$articles);

        $cateres = db('cate')->select();
        $this->assign('cateres',$cateres);
        return $this->fetch();

    }

}