<?php
/**
 * Created by PhpStorm.
 * User: jx
 * Date: 2016/8/4
 * Time: 0:38
 */
function readDirctory($path) {
    if (is_file($path)) {
        return null;
    }
    $result = array();
    $handle = opendir($path);
    while(($item = readdir($handle))!==false) {
        if ($item!='.' && $item!= '..') {
            $filepath = $path.'/'.$item;
            if (is_file($filepath)) {
                $result['file'][] = $item;
            }elseif (is_dir($filepath)) {
                $result['dir'][] = $item;
            }
        }
    }
    closedir($handle);
    return $result;
}

function getChildPath($current,$filepath) {
    return urlencode($current.'/'.$filepath);
}

function getUrlBar($currentpath) {
    echo $currentpath;
    $base = C('DATA_DIR');
    if ($currentpath == $base) {
        return "<span>主文件夹</span>";
    }
    $urls = explode('/',$currentpath);
    $result[] = array('path'=>$base,'name'=>'主文件夹');
    foreach ($urls as $key=> $value) {
        if ($key < 2){
            continue;
        }
        $url = '';
        for ($i=2; $i<=$key; $i++) {
            $url.= '/'.$urls[$i];
        }
        $result[] = array('url'=>$url, 'name'=>$value);
    }
    return $result;
}