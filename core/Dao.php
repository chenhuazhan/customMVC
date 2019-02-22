<?php
/**
 * Created by PhpStorm.
 * User: hz
 * Date: 2019/2/22
 * Time: 16:25
 */

namespace core;

//引入全局空间类：PDO相关的3个类
use \PDO,\PDOStatement,\PDOException;

class Dao{
    private $pdo;
    private $fetch_mode;    //获取结果集的模式
    /**
     *@desc 构造方法，获取pdo对象，设置字符集
     *@param1 array $info,数据库基本信息
     *@param2 array $info,数据库驱动配置
     */
    public function __construct($info = array(), $drivers = array()){
        $dbtype = $info['dbtype'] ?? 'mysql';
        $host = $info['host'] ?? 'localhost';
        $port = $info['port'] ?? '3306';
        $user = $info['user'] ?? 'root';
        $password = $info['password'] ?? 'chz';
        $dbname = $info['dbname'] ?? 'demo';
        $charset = $info['charset'] ?? 'utf8';
        $this->fetch_mode = $info['fetch_mode'] ?? PDO::FETCH_ASSOC;

        $drivers[PDO::ATTR_ERRMODE] = $drivers[PDO::ATTR_ERRMODE] ?? PDO::ERRMODE_EXCEPTION;

        $dsn = "{$dbtype}:host={$host};port={$port};dbname={$dbname}";
        try{
            $this->pdo = new PDO($dsn, $user, $password, $drivers);
        }catch(PDOException $e){
            die("数据库连接失败：{$e->getMessage()} in line {$e->getLine()}");
        }
        try{
            $this->pdo->exec("set names {$charset}");
        }catch(PDOException $e){
            die("字符集设置失败：{$e->getMessage()} in line {$e->getLine()}");
        }
    }
    /**
     * @desc 合并PDO::exec和PDO::query为同一个方法，类似mysqli的query函数
     * @param1 string $sql,SQL语句
     * @param2 bool $all,是否获取所有查询结果
     */
    public function query($sql,$all = true){
        $sql = trim($sql);
        $str1 = substr($sql,0,7);
        $str2 = substr($sql,0,5);

        if($str1 === 'select ' || $str2 === 'desc ' || $str2 === 'show '){
            //检查到是查询语句，使用PDO::query函数
            try{
                $stmt = $this->pdo->query($sql);
                if($all){
                    return $stmt->fetchAll($this->fetch_mode);
                }else{
                    return $stmt->fetch($this->fetch_mode);
                }
            }catch(PDOException $e){
                die("数据库查询失败{$e->getMessage()} in line {$e->getLine()}");
            }
        } else {
            //否则使用PDO::exec函数
            try{
                $row_num = $this->pdo->exec($sql);
                $last_id = $this->pdo->lastInsertId();
                //返回影响行数和lastInsertId，不是插入操作时lastInsertId为0
                return array(
                    'row_num' => $row_num,
                    'last_id' => $last_id
                );
            }catch(PDOException $e){
                die("数据库操作失败{$e->getMessage()} in line {$e->getLine()}");
            }
        }
    }
}

