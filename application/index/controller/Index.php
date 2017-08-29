<?php
namespace app\index\controller;

use app\index\controller\Base;

class Index extends Base
{
    public function index()
    {
        $article = db("article")->order('id desc')->paginate(3);

        $this->assign('articleres',$article);
      return $this->fetch();
    }
}
