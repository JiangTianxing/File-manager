<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>文件管理器</title>
    <link rel="stylesheet" href="./Public/css/bootstrap.min.css" type="text/css" />
    <link href="./Public/css/bootstrap.min.css" rel="stylesheet">
    <!-- jQuery -->
    <script src="./Public/js/jquery.js"></script>
    <script src="./Public/js/bootstrap.min.js"></script>
    <script src="./Public/js/dialog/layer.js"></script>
    <script src="./Public/js/dialog.js"></script>
</head>

<body>
<div class="container">
    <?php if(is_array($urlbar)): $i = 0; $__LIST__ = $urlbar;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$bar): $mod = ($i % 2 );++$i; if($bar['url'] == null): ?><a href="index.php">主文件夹<?php endif; ?>
        <a href="index.php?a=index&path=<?php echo (urlencode($bar['url'])); ?>"><?php echo (iconv('gb2312','utf-8',$bar['name'])); ?></a> /<?php endforeach; endif; else: echo "" ;endif; ?>
    <br>
    <?php if(is_array($dirs['file'])): $i = 0; $__LIST__ = $dirs['file'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$file): $mod = ($i % 2 );++$i; echo (iconv('gb2312','utf-8',$file)); ?><br/><?php endforeach; endif; else: echo "" ;endif; ?>
    <?php if(is_array($dirs['dir'])): $i = 0; $__LIST__ = $dirs['dir'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$dir): $mod = ($i % 2 );++$i;?><a href="index.php?a=index&path=<?php echo (getChildPath($currentpath,$dir)); ?>"><?php echo (iconv('gb2312','utf-8',$dir)); ?><br></a><?php endforeach; endif; else: echo "" ;endif; ?>
</div>
<script src="./Public/js/common/common.js"></script>
</body>

</html>