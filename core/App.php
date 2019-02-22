<?php
/**
 * Created by PhpStorm.
 * User: hz
 * Date: 2019/2/22
 * Time: 15:19
 */

namespace core;

//安全判定
if(!defined('ACCESS')){
    header('location:../public/index.php');
    exit;
}


class App{
    //启动方法
    public static function start(){
        self::setPath();
        self::setConfig();
        self::setError();
        self::setUrl();
        self::setAutoload();
        self::setDispatch();
    }
    //设置路径常量
    private static function setPath(){
        define('CORE_PATH', ROOT_PATH. 'core/');
        define('APP_PATH', ROOT_PATH. 'app/');
        define('HOME_PATH', APP_PATH. 'home/');
        define('ADMIN_PATH', APP_PATH. 'core/');
        define('ADMIN_CONT', ADMIN_PATH. 'controller/');
        define('ADMIN_MODEL', ADMIN_PATH. 'model/');
        define('ADMIN_VIEW', ADMIN_PATH. 'view/');
        define('HOME_CONT', HOME_PATH. 'controller/');
        define('HOME_MODEL', HOME_PATH. 'model/');
        define('HOME_VIEW', HOME_PATH. 'view/');
        define('VENDOR_PATH', ROOT_PATH. 'vendor/');
        define('CONFIG_PATH', ROOT_PATH. 'config/');
        define('URL', 'http://www.custommvc.com/');
    }
    //配置文件包含
    private static function setConfig(){
        global $config;
        $config = include CONFIG_PATH. 'config.php';
    }
    //错误控制
    private static function setError(){
        global $config;
        @ini_set('error_reporting', $config['system']['error_reporting']);
        @ini_set('display_errors', $config['system']['display_errors']);
    }
    //解析URL
    private static function setUrl(){
        $d = $_REQUEST['d'] ?? 'home';  //该变量标记访问前台还是后台，默认访问前台
        $c = $_REQUEST['c'] ?? 'Index'; //该变量标记访问哪个控制器，默认IndexController
        $f = $_REQUEST['f'] ?? 'index'; //该变量标记调用控制器的哪个方法，默认调用index方法
        define('D', $d);
        define('C', $c);
        define('F', $f);
    }
    //类自动加载
    private static function setAutoloadFunction($class){
        //取出类名（考虑到命名空间的情况）
        $class = basename($class);
        //加载核心类文件
        $core_file = CORE_PATH. $class. '.php';
        if(file_exists($core_file)) include $core_file;
        //加载控制器类文件，包括前后台
        $cont_file = APP_PATH. D. '/controller/'. $class. '.php';
        if(file_exists($cont_file)) include $cont_file;
        //加载模型类文件，包括前后台
        $model_file = APP_PATH. D. '/model/'. $class. '.php';
        if(file_exists($model_file)) include $model_file;
        //加载插件
        $vendor_file = VENDOR_PATH. $class. '.php';
        if(file_exists($vendor_file)) include $vendor_file;
    }
    //注册自动加载函数
    private static function setAutoload(){
        spl_autoload_register(array(__CLASS__, 'setAutoloadFunction'));
    }
    //分发控制器
    private static function setDispatch(){
        //找到前后台、控制器、方法：\home\controller\IndexController;
        $d = D;
        $c = C;
        $f = F;
        //组织成合适的空间元素
        $controller = "\\{$d}\controller\\{$c}Controller";
        //实例化控制器对象
        $c = new $controller();
        //调用方法，分发内容
        $c->$f();
    }
}