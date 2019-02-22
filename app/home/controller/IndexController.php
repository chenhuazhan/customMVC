<?php
/**
 * Created by PhpStorm.
 * User: hz
 * Date: 2019/2/22
 * Time: 15:39
 */

namespace home\controller;
use \core\Controller;

class IndexController extends Controller{
    public function index(){
        //框架默认首页
        $this->display('index.html');

        //$this->tip('请登录!', 'login');
        //$this->success('请登录！<br>', 'login');

    }

}