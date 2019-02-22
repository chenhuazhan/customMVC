<?php
/**
 * Created by PhpStorm.
 * User: hz
 * Date: 2019/2/22
 * Time: 16:23
 */

namespace core;


class Model{
    protected $dao;
    protected $fields;

    public function __construct(){
        global $config;

        $this->dao = new Dao($config['database'],$config['drivers']);
        $this->getFields();
    }
    //重新封装query方法，方便调用
    protected function query($sql, $all = true){
        return $this->dao->query($sql, $all);
    }
    //构造表全名
    protected function getTable($table = ''){
        global $config;
        $table = empty($table) ? $this->table : $table;
        return $config['database']['prefix']. $table;
    }
    //获取当前表全部数据
    protected function getAll(){
        $sql = "select * from {$this->getTable()}";
        return $this->query($sql);
    }
    //获取表字段名并确定主键名
    private function getFields(){
        $sql = "desc {$this->getTable()}";
        //echo $sql.'<br>';
        $rows = $this->query($sql);
        //var_dump($rows);
        foreach ($rows as $row){
            $this->fields[] = $row['Field'];
            //确定主键
            if($row['Key'] === 'PRI'){
                $this->fields['p_key'] = $row['Field'];
            }
        }
    }
    //通过主键获取记录
    public function getById($id){
        //检测主键存在性
        if(!isset($this->fields['p_key'])) return false;
        $sql = "select * from {$this->getTable()} where {$this->fields['p_key']} = {$id}";
        return $this->query($sql,false);
    }
}