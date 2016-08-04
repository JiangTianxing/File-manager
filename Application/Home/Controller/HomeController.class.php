<?php
/**
 * Created by PhpStorm.
 * User: jx
 * Date: 2016/8/4
 * Time: 12:46
 */
namespace Home\Controller;
use Think\Controller;

class HomeController extends Controller {
    protected $path;
    protected $filepath;
    protected $type;

    public function __construct()
    {
        parent::__construct();
        $this->path = $_REQUEST['path'] ? urldecode($_REQUEST['path']) : '';
        $this->filepath = C('DATA_DIR').$this->path;
        $this->type = is_dir($this->filepath) ? 1 : 0;
    }
}