<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
        $path = urldecode(I('get.path'));
        $filepath = I('get.path') ? C('DATA_DIR').$path : C('DATA_DIR');
        if (is_file($path)) {
            $this->redirect('/index.php?a=file&path'.I('get.path'));
        }
        $this->currentpath = $path;
        $this->dirs = readDirctory($filepath);
        $urlbar = getUrlBar($filepath);
        $this->show();
    }

    public function file() {
        $path = urldecode(I('get.path'));
        $filepath = I('get.path') ? C('DATA_DIR').'/'.$path : C('DATA_DIR');
        var_dump(file_get_contents($filepath));
    }
}