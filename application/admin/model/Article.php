<?php
/**
 * Created by PhpStorm.
 * User: kang
 * Date: 17-6-16
 * Time: 上午1:05
 */

namespace app\admin\model;

use think\Model;

class Article extends Model
{
    public function cate()
    {
        return $this->belongsTo("cate","cateid");
    }

}