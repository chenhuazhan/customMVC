<?php
/**
 * Created by PhpStorm.
 * User: hz
 * Date: 2019/2/22
 * Time: 14:12
 */
//增加入口标记
define('ACCESS', TRUE);


//定义上级目录常量
define('ROOT_PATH', str_replace('\\', '/', dirname(__DIR__)). '/');

//加载初始化文件
include ROOT_PATH. 'core/App.php';

//激活初始化
\core\App::start();


