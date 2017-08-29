<?php
/**
 * Created by PhpStorm.
 * User: kang
 * Date: 17-6-6
 * Time: 上午1:17
 */

namespace app\index\controller;
use app\index\controller\Base;

class Cate extends Base
{
    public function index()
    {
        $cateid = input('cateid');

        $mcate = db('cate')->find($cateid);
        $this->assign('mcate',$mcate);

        $article = db("article")->where(array('cateid'=>$cateid))->paginate(3);

        $this->assign('articleres',$article);

        return $this->fetch('cate');
    }
}
