<?php
/**
 * Created by PhpStorm.
 * User: hz
 * Date: 2019/2/22
 * Time: 15:22
 */


return array(
    'database' => array(
        'dbtype' => 'mysql',
        'host' => 'localhost',
        'port' => 3306,
        'user' => 'root',
        'password' => 'chz',
        'dbname' => 'demo',
        'charset' => 'utf8',
        'prefix' => ''          //表前缀
    ),
    'drivers' => array(

    ),
    'system' => array(
        'error_reporting' => E_ALL, //错误级别控制，默认显示所有错误
        'display_errors' => 1       //错误显示控制，1表示显示错误，0表示隐藏
    )
);
