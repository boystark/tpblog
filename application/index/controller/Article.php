<?php


namespace app\index\controller;
use app\index\controller\Base;

class Article extends Base
{
    public function index()
    {
        $arid = input('arid');
        $articles = db('article')->find($arid);
        $ralateres = $this->ralat($articles['keywords'],$articles['id']);


        db('article')->where('id','=',$arid)->setInc('clicknum');

        $cates= db('cate')->find($articles['cateid']);

        //$recres推荐文章
        $recres = db('article')->where(array('cateid'=>$cates['id'],'state'=>1))->limit(8)->select();


        $this->assign(array(
            'articles'=>$articles,
            'mcate'=>$cates,
            'recres'=>$recres,
            'ralateres'=>$ralateres,
        ));
        return $this->fetch('article');
    }

    public function ralat($keywords,$id){
        $arr = explode(',',$keywords);
        static $ralateres = array();
        foreach ($arr as $k=>$v){
            $map['keywords']=['like','%'.$v.'%'];
            $map['id']=['neq',$id];
            $artres = db('article')->where($map)->order('id desc')->limit(8)->select();
            $ralateres=array_merge($ralateres,$artres);
        }
        if($ralateres){
            $ralateres = arr_unique($ralateres);
            return $ralateres;
        }

    }





}