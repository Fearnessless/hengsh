<?php
//设置中国时区
date_default_timezone_set("Asia/Shanghai");

//设定编码字符集
header("Content-Type: text/html;charset=utf-8");

class mysql {
    protected $host = 'localhost';
    protected $user = 'root';
    protected $pass = '13039592624';
    protected $dbname = 'hengsh';
    protected $char = 'utf8';
    private $conn = null;


    function __construct() {
        $this->connect($this->host, $this->user, $this->pass);
        $this->setChar($this->char);
    }

    public function __destruct(){
        $this->conn = null;
    }

    public function connect($h, $u, $p) {
        $this->conn = new PDO('mysql:host='.$h.';dbname='.$this->dbname,
            $u, $p);
        return $this->conn;
    }

    public function query($sql) {
        $rs = $this->conn->query($sql);
        return $rs;
    }

    public function getAll($sql) {
        $rs = $this->conn->query($sql);
        return $rs->fetchAll();
    }

    public function getOne($sql) {
        $rs = $this->conn->query($sql);
        if($rs != null) {
            $row = $rs->fetchAll();
            return $row[0];
        } else {
            return null;
        }
        
    }

    public function getRow($sql) {
        $rs = $this->conn->query($sql);
        $row = $rs->fetch();
        return $row;
    }

    public function autoExecute($table, $data, $act = 'insert', $where = '') {
        if(!is_array($data)) {
            return false;
        }
        if($act == 'insert') {
            $col = array_keys($data);
            $value = null;
            $col_value = null;
            foreach ($data as $d){
                $value .= '\''.$d.'\',';
            }
            foreach ($col as $c){
                $col_value .= $c.',';
            }
            $value = rtrim($value,',');
            $col_value = rtrim($col_value,',');
            $sql = "insert into {$table}({$col_value}) values({$value})";
            $rs = $this->conn->query($sql);
            return $rs;
        } elseif ($act == 'update') {
            $k = array_keys($data);
            $ch = null;
            foreach($k as $k){
                $ch .= $k."='".$data[$k]."',";
            }
            $ch = rtrim($ch, ',');
            $sql = "update {$table} set $ch where {$where}";
            $rs = $this->conn->query($sql);
            return $rs;
        } elseif ($act == 'delete') {
            $sql = "delete from {$table} where {$where}";
            $rs = $this->conn->query($sql);
            return $rs;
        }
    }

    public function setChar($char) {
        $sql = "set names {$char}";
        $this->conn->query($sql);
    }

    public function affected_rows($sql) {
        return $this->conn->exec($sql);
    }

}