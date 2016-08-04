<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends HomeController {
    public function index(){
        if (!$this->type) {
            $this->redirect('/index.php?a=file&path'.$_GET['path']);
        }
        $this->currentpath = $this->path;
        $this->dirs = readDirctory($this->filepath);
        $this->urlbar = getUrlBar($this->filepath);
        $this->display();
    }

    public function file() {
        if ($this->type) {
            $this->redirect('/index.php?a=index&path'.$_GET['path']);
        }
        $this->content = readFileContent($this->filepath);
        $this->display();
    }

//    public function delete() {
//        if (!$this->type) {
//            unlink($this->filepath);
//        }else {
//            deleteDir($this->filepath);
//        }
//        if (file_exists($this->filepath)) {
//            return show(0,'删除失败');
//        }
//        $url = $_SERVER['HTTP_REFERER'];
//        return show(1,'删除成功',array('url'=>$url));
//    }

//    public function download() {
//        if (!$this->type) {
//            downloadFile($this->filepath);
//        }
//    }

//    public function edit() {
//
//    }

    public function getinfo() {
        $this->time = getTime($this->filepath);
        $this->mode = getMode($this->filepath);
        $this->size = getSize($this->filepath);
        $this->display();
    }
}