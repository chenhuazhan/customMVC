<?php
/**
 * Created by PhpStorm.
 * User: hz
 * Date: 2019/2/22
 * Time: 15:40
 */

namespace core;



class Controller{
    protected $smarty;

    //构造方法
    public function __construct(){
        //实现smarty的初始化
        include VENDOR_PATH. 'smarty/Smarty.class.php';
        $this->smarty = new \Smarty();
        $this->smarty->template_dir = APP_PATH. D. '/view/'. C. '/';
        $this->smarty->caching = false;
        $this->smarty->cache_dir = APP_PATH. D. '/cache';
        $this->smarty->cache_lifetime = 120;
        $this->smarty->compile_dir = APP_PATH. D. '/template_c/';
    }
    //二次封装smarty方法，方便调用
    protected function assign($key, $value){
        $this->smarty->assign($key, $value);
    }
    protected function display($file){
        $this->smarty->display($file);
    }
    protected function tip($msg, $f = F, $c = C, $d = D){
        $url = URL;
        $href = "{$url}index.php?d={$d}&c={$c}&f={$f}";
        $tip_script = <<<END
    <script>
        alert('{$msg}');
        window.location = '{$href}';
    </script>
END;
        die($tip_script);
    }
    //成功提示方法
    protected function success($msg, $f = F, $c = C, $d = D, $time = 3){
        $url = URL;
        $refresh = "Refresh:{$time};url={$url}index.php?d={$d}&c={$c}&f={$f}";
        header($refresh);
        die($msg);
        //如果有成功提示模板，则使用模板
        /*
         * $this->assign('msg',$msg);
         * $this->assign('c',$c);
         * $this->assign('a',$a);
         * $this->assign('time',$time);
         * $this->display('模板路径');
         */
    }
    //错误提示方法,如果和成功提示方法没有不同的模板，可以统一成一个tip方法
    protected function error($msg, $a = A, $c = C, $p = P, $time = 3){
        $url = URL;
        $refresh = "Refresh:{$time};url={$url}index.php?c={$c}&a={$a}&p={$p}";
        header($refresh);
        die($msg);
    }

}