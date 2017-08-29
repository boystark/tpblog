<?php


namespace app\index\controller;
use think\Db;
use think\Controller;

class Base extends Controller
{
    public function _initialize()
    {
        $hotclick=db('article')->order('clicknum desc')->limit(8)->select();
        $trec = db('article')->where('state','=',1)->order('clicknum desc')->select();

        $cates = Db::name('cate')->order('id asc')->limit(8)->select();
        $tags = Db::name('taps')->order('id desc')->limit(12)->select();

        $this->assign(array(
            'hotclick'=>$hotclick,
            'trec'=>$trec,
            'cates'=>$cates,
            'tags'=>$tags,
        ));

    }

}