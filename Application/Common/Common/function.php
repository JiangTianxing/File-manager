<?php
/**
 * Created by PhpStorm.
 * User: jx
 * Date: 2016/8/4
 * Time: 0:38
 */

function show($status, $message, $data=array()) {
    exit(
        json_encode(
            array(
                'status'=>$status,
                'message'=>$message,
                'data' =>$data
            )
        )
    );
}

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
    $base = C('DATA_DIR');
    $result[] = array('path'=>'','name'=>'主文件夹');
    if ($currentpath == $base) {
        return $result;
    }
    $urls = explode('/',$currentpath);
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

function deleteDir($path) {
    $handle = opendir($path);
    while(($item = readdir($handle)) !== false) {
        if ($item!='.' && $item!= '..') {
            $filepath = $path.'/'.$item;
            if (is_file($filepath)) {
                unlink($filepath);
            }elseif (is_dir($filepath)) {
                deleteDir($filepath);
            }
        }
    }
    closedir($handle);
}

function downloadFile($filepath) {
    if (file_exists($filepath) && is_file($filepath)) {
        header("Content-Disposition:attachment;filename='".iconv('gb2312','utf-8',basename($filepath))."'");
        header("Content-length:".filesize($filepath));
        readfile($filepath);
    }
    return false;
}

function getTime($filepath) {
    return array(
        'a' => date('Y-m-d H:m:s',fileatime($filepath)),
        'c' => date('Y-m-d H:m:s',filectime($filepath)),
        'm' => date('Y-m-d H:m:s',filemtime($filepath))
    );
}

function getSize($filepath) {
    $size = 0;
    if (is_dir($filepath)) {
        $size = getDirSize($filepath);
    }elseif(is_file($filepath)) {
        $size = filesize($filepath);
    }
    $type = array('b','kb','mb','gb');
    $temp = $size;
    $index = 0;
    while ($temp > 1024) {
        $temp /= 1024;
        $index ++;
    }
    return array(
        'b' => $size.'b',
        'o' => number_format($temp,2).$type[$index]
    );
}

function getDirSize($path) {
    $handle = opendir($path);
    $size = 0;
    while(($item = readdir($handle)) !== false) {
        if ($item!='.' && $item!= '..') {
            $filepath = $path.'/'.$item;
            if (is_file($filepath)) {
               $size += filesize($filepath);
            }elseif(is_dir($filepath)) {
                $size += getDirSize($filepath);
            }
        }
    }
    closedir($handle);
    return $size;
}

function getMode($filepath) {
    return array(
        'r' => is_readable($filepath),
        'w' => is_writeable($filepath),
        'e' => is_executable($filepath)
    );
}

function readFileContent($filepath) {
    if (!is_file($filepath)) {
        return null;
    }
    $result = array();
    $content = fopen($filepath,'r');
    while(!feof($content)) {
        $result[] = fgets($content);
    }
    return $result;
}

