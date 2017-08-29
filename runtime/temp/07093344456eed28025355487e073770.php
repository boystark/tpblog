<?php if (!defined('THINK_PATH')) exit(); /*a:5:{s:92:"C:\Users\kang\Documents\phpdata\tpblog\public/../application/index\view\article\article.html";i:1503973358;s:88:"C:\Users\kang\Documents\phpdata\tpblog\public/../application/index\view\common\main.html";i:1503972599;s:90:"C:\Users\kang\Documents\phpdata\tpblog\public/../application/index\view\common\header.html";i:1503971684;s:89:"C:\Users\kang\Documents\phpdata\tpblog\public/../application/index\view\common\right.html";i:1503972513;s:90:"C:\Users\kang\Documents\phpdata\tpblog\public/../application/index\view\common\footer.html";i:1503963288;}*/ ?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
    <meta name="keywords" content="博客 boystark" />
    <meta name="description" content="博客" />
    <title>boystark-index</title>
    <!-- Bootstrap -->
    <link href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="__PUBLIC__/css/blog.css">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://cdn.bootcss.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script type='text/javascript' src='__PUBLIC__/style/ismobile.js'></script>
    <link rel="stylesheet" href="../../../../../../../Desktop/laravel-data/前台/css/blog.css">
</head>
<body>
    
<header  >
    <div class="ladytop">
        <div class="nav">
            <div class="left"><a href="<?php echo url('index/index'); ?>" ><img src="__PUBLIC__/images/hunshang.png" alt="主图"></a></div>
            <div class="right">
                <div class="box">
                    <a href=""  rel='dropmenu209'></a>
                    <?php if(is_array($cates) || $cates instanceof \think\Collection || $cates instanceof \think\Paginator): $i = 0; $__LIST__ = $cates;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                    <a href="<?php echo url('cate/index',array('cateid'=>$vo['id'])); ?>"><?php echo $vo['catename']; ?></a>
                    <?php endforeach; endif; else: echo "" ;endif; ?>
                </div>
            </div>
        </div>
    </div>
    <div style="height: 10px;background-color: #ff6278" ></div>
    <div class="hotmenu">
        <div class="con">热门标签：
            <?php if(is_array($tags) || $tags instanceof \think\Collection || $tags instanceof \think\Paginator): $i = 0; $__LIST__ = $tags;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
            <a href='http://blog.tp5.com/index.php/index/search/index?keywords=<?php echo $vo['tagname']; ?>'><?php echo $vo['tagname']; ?></a>

            <?php endforeach; endif; else: echo "" ;endif; ?>
        </div>
    </div>
    <div style="height: 20px"></div>
</header>



    <div class="container">
        <div class="row">
            
<article class="col-sm-12 col-md-6 col-lg-8 left">
    <div class="scrap">
        <h1><?php echo $articles['title']; ?></h1>
        <div class="spread">
            <span class="writor">发布时间：<?php echo date('Y-m-d',$articles['time']); ?></span>
            <span class="writor">编辑：<?php echo $articles['author']; ?></span>
            <span class="writor">
                    标签：
                <?php
						$arr=explode(',',$articles['keywords']);

						foreach ($arr as $k=>$v){
							echo"<a href=''>$v</a>";
						}
					?>
                </span>
            <span class="writor">热度：<?php echo $articles['clicknum']; ?></span>
        </div>
    </div>
    <div class="takeaway">
        <span class="btn arr-left"></span>
        <p class="jjxq">
            <?php echo $articles['descri']; ?>
        </p>
        <span class="btn arr-right"></span>
    </div>
    <div class="substance">
        <?php echo $articles['content']; ?>
    </div>
    <div class="biaoqian">
    </div>

    <!--相关阅读 -->
    <div class="xgread">
        <div class="til"><h4>相关阅读</h4></div>
        <div class="lef"><!--相关阅读主题链接--><script src='/jiehun/goto/my-65540.js' language='javascript'></script></div>
        <div class="rig">
            <ul>

                <?php if(is_array($ralateres) || $ralateres instanceof \think\Collection || $ralateres instanceof \think\Paginator): $i = 0; $__LIST__ = $ralateres;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                <li><a href='<?php echo url('article/index',array('arid'=>$vo[0])); ?>' target="_blank"><?php echo $vo['1']; ?></a></li>
                <?php endforeach; endif; else: echo "" ;endif; ?>
            </ul>
        </div>
    </div>

    <!--频道推荐-->
    <div class="hotsnew">
        <div class="til"><h4>频道推荐</h4></div>
        <ul>
            <?php if(is_array($recres) || $recres instanceof \think\Collection || $recres instanceof \think\Paginator): $i = 0; $__LIST__ = $recres;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
            <li><div class="tu">
                <a href=<?php echo $vo['id']; ?> target="_blank">
                    <img src="<?php if($vo['pic'] != ''): ?>__IMG__<?php echo $vo['pic']; else: ?>__PUBLIC__/images/error.png<?php endif; ?>" alt="图片展示"/>
                </a>
            </div>
                <p>
                    <a href=<?php echo $vo['id']; ?>><?php echo $vo['title']; ?></a>
                </p>
            </li>
            <?php endforeach; endif; else: echo "" ;endif; ?>
        </ul>
    </div>


</article>

            <aside class="col-md-6 col-lg-4 right">
    <!--右侧各种广告-->
    <!--猜你喜欢-->
    <div id="hm_t_57953">
        <div style="display: block; margin: 0px; padding: 0px; float: none; clear: none; overflow: hidden; position: relative; border: 0px none; background: transparent none repeat scroll 0% 0%; max-width: none; max-height: none; border-radius: 0px; box-shadow: none; transition: none 0s ease 0s ; text-align: left; box-sizing: content-box; width: 300px;">
            <div class="hm-t-container" style="width: 298px;">
                <div class="hm-t-main">
                    <div class="hm-t-header">热门点击</div>
                    <div class="hm-t-body">
                        <ul class="hm-t-list hm-t-list-img">
                           <?php if(is_array($hotclick) || $hotclick instanceof \think\Collection || $hotclick instanceof \think\Paginator): $i = 0; $__LIST__ = $hotclick;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                            <li class="hm-t-item hm-t-item-img">
                                <a data-pos="0" title="<?php echo $vo['title']; ?>" target="_blank" href="<?php echo url('article/index',array('arid'=>$vo['id'])); ?>" class="hm-t-img-title" style="visibility: visible;">
                                    <span><?php echo $vo['title']; ?></span>
                                </a>
                            </li>
                            <?php endforeach; endif; else: echo "" ;endif; ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div style="height:15px"></div>

    <div id="hm_t_57953">
        <div style="display: block; margin: 0px; padding: 0px; float: none; clear: none; overflow: hidden; position: relative; border: 0px none; background: transparent none repeat scroll 0% 0%; max-width: none; max-height: none; border-radius: 0px; box-shadow: none; transition: none 0s ease 0s ; text-align: left; box-sizing: content-box; width: 300px;">
        <div style="width: 298px;" class="hm-t-container">
            <div class="hm-t-main">
                <div class="hm-t-header">推荐阅读</div>
                <div class="hm-t-body">
                    <ul class="hm-t-list hm-t-list-img">


                        <?php if(is_array($trec) || $trec instanceof \think\Collection || $trec instanceof \think\Paginator): $i = 0; $__LIST__ = $trec;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                        <li class="hm-t-item hm-t-item-img">
                            <a style="visibility: visible;" class="hm-t-img-title" href="<?php echo url('article/index',array('arid'=>$vo['id'])); ?>" target="_blank" title="<?php echo $vo['title']; ?>" data-pos="0">
                                <span><?php echo $vo['title']; ?></span>
                            </a>
                        </li>
                        <?php endforeach; endif; else: echo "" ;endif; ?>
                    </ul>
                </div>
            </div>
        </div>
        </div>
    </div>

    <div style="height:15px"></div>

    <div id="bdcs"><div class="bdcs-container">
        <meta content="IE=9" http-equiv="x-ua-compatible">   <!-- 嵌入式 -->
        <div id="default-searchbox" class="bdcs-main bdcs-clearfix">
            <div id="bdcs-search-inline" class="bdcs-search bdcs-clearfix">
                <form id="bdcs-search-form" autocomplete="off" class="bdcs-search-form" target="_blank" method="get" action="<?php echo url('search/index'); ?>">

                    <input type="text" placeholder="请输入关键词" id="bdcs-search-form-input" class="bdcs-search-form-input" name="keywords" autocomplete="off" style="line-height: 30px; width:220px;">
                    <input type="submit" value="搜索" id="bdcs-search-form-submit" class="bdcs-search-form-submit bdcs-search-form-submit-magnifier">
                </form>
            </div>
            <div id="bdcs-search-sug" class="bdcs-search-sug" style="top: 552px; width: 239px;">
                <ul id="bdcs-search-sug-list" class="bdcs-search-sug-list"></ul>
            </div>
        </div>
    </div>
    </div>

    <div style="height:15px"></div>



</aside>
        </div>
    </div>

<footer>
    <div class="footerd">
    <ul>
        <li>Copyright &#169; 2016-2017  all rights reserved 版权所有   <a href="http://www.boystark.com/" target="_blank" rel="nofollow">boystark</a></li>
    </ul>
</div>
</footer>

<!-- Placed at the end of the document so the pages load faster -->
<script src="https://cdn.bootcss.com/jquery/1.12.4/jquery.min.js"></script>
<script src="https://cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>
</html>