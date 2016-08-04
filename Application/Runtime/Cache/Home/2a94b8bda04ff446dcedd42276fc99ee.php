<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>文件管理器</title>
    <!-- 新 Bootstrap 核心 CSS 文件 -->
    <link rel="stylesheet" href="//cdn.bootcss.com/bootstrap/3.3.5/css/bootstrap.min.css">

    <!-- 可选的Bootstrap主题文件（一般不用引入） -->
    <link rel="stylesheet" href="//cdn.bootcss.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">

    <!-- jQuery文件。务必在bootstrap.min.js 之前引入 -->
    <script src="//cdn.bootcss.com/jquery/1.11.3/jquery.min.js"></script>

    <!-- 最新的 Bootstrap 核心 JavaScript 文件 -->
    <script src="//cdn.bootcss.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>


    <!--<link rel="stylesheet" href="./Public/css/bootstrap.min.css" type="text/css" />-->
    <!--<link href="./Public/css/bootstrap.min.css" rel="stylesheet">-->
    <!--&lt;!&ndash; jQuery &ndash;&gt;-->
    <!--<script src="./Public/js/jquery.js"></script>-->
    <!--<script src="./Public/js/bootstrap.min.js"></script>-->



    <script src="./Public/js/dialog/layer.js"></script>
    <script src="./Public/js/dialog.js"></script>
</head>

<body>
<div class="container">
    <h1>文件管理</h1>
    <p>当前路径:</p>
    <?php if(is_array($urlbar)): $i = 0; $__LIST__ = $urlbar;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$bar): $mod = ($i % 2 );++$i; if($bar['url'] == null): ?><a href="index.php">主文件夹<?php endif; ?>
        <a href="./index.php?a=index&path=<?php echo (urlencode($bar['url'])); ?>"><?php echo (iconv('gb2312','utf-8',$bar['name'])); ?></a>&nbsp;/&nbsp;<?php endforeach; endif; else: echo "" ;endif; ?>
    <br>
    <?php if($dirs['dir'] != null): ?>文件夹:
        <ul>
        <?php if(is_array($dirs['dir'])): $i = 0; $__LIST__ = $dirs['dir'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$dir): $mod = ($i % 2 );++$i;?><li>
                <a href="./index.php?a=index&path=<?php echo (getChildPath($currentpath,$dir)); ?>">
                    <?php echo (iconv('gb2312','utf-8',$dir)); ?><br>
                </a>
                <a class="delete-button" href="javascript:void(0)" attr-path="<?php echo (getChildPath($currentpath,$dir)); ?>">
                    <span class="glyphicon glyphicon-remove"></span>
                </a>
            </li><?php endforeach; endif; else: echo "" ;endif; ?>
        </ul><?php endif; ?>
    <?php if($dirs['file'] != null): ?>文件:
        <ul>
        <?php if(is_array($dirs['file'])): $i = 0; $__LIST__ = $dirs['file'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$file): $mod = ($i % 2 );++$i;?><li>
                <a href="./index.php?a=file&path=<?php echo (getChildPath($currentpath,$file)); ?>">
                    <?php echo (iconv('gb2312','utf-8',$file)); ?><br/>
                </a>
                <a class="delete-button" href="javascript:void(0)" attr-path="<?php echo (getChildPath($currentpath,$file)); ?>">
                    <span class="glyphicon glyphicon-remove"></span>
                </a>
            </li><?php endforeach; endif; else: echo "" ;endif; ?>
        </ul><?php endif; ?>
</div>
<script>
    SCOPE = {
        'delete_url' : './index.php?a=delete',
    }
</script>
<script src="./Public/js/common/common.js"></script>
</body>

</html>