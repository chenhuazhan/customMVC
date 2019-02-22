<?php
/**
 * Created by PhpStorm.
 * User: hz
 * Date: 2019/2/22
 * Time: 19:48
 */

namespace home\controller;
use \core\Controller;

class StudentController extends Controller{
    public function index(){
        echo 'StudentController';
    }
    public function getInfo(){
        $m = new \home\model\StudentModel();
        $res = $m->getById(20);
        //print_r($res);
        $this->assign('res',$res);
        $this->display('info_table.html');
    }
    public function getJsonInfo(){
        $m = new \home\model\StudentModel();
        $res = $m->getById(20);
        header("content-type:application/json");
        echo json_encode($res);
    }
}