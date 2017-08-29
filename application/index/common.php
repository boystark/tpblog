<?php
/**
 * Created by PhpStorm.
 * User: kang
 * Date: 17-6-28
 * Time: 下午5:27
 */
function arr_unique($arr){

    foreach ($arr as $k=>$v){
        $v=join(',',$v);
        $temp[]=$v;
    }
    if($temp){
        $temp=array_unique($temp);
        foreach ($temp as $k=>$v){

            $temp[$k]=explode(',',$v);
        }
        return $temp;
    }
}
?>