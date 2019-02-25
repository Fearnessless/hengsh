<?php
    require_once "../Mysql.php";
    
    // 引入自动加载类
    require_once 'vendor/autoload.php';

    // 使用Spreadsheet类
    use PhpOffice\PhpSpreadsheet\Spreadsheet;
    // xlsx格式类
    use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
    //可以生成多种格式类
    use PhpOffice\PhpSpreadsheet\IOFactory;

    // 通用读取指定行和列数据
    class MyReadFilter implements \PhpOffice\PhpSpreadsheet\Reader\IReadFilter {
        private $startRow = 0; // 开始行
        private $endRow = 0; // 结束行
        private $columns = []; // 列号

        // 构造函数，为私有属性赋值
        public function __construct($startRow, $endRow, $columns) {
            $this->startRow = $startRow;
            $this->endRow = $endRow;
            $this->columns = $columns;
        }

        // 读取数据
        public function readCell($column, $row, $worksheetName='') {
            if($row >= $this->startRow && $row <= $this->endRow) {
                if(in_array($column, $this->columns)){
                    return true;
                }
            }
            return false;
        }
    }

    class dataset {
        public function read($file) {
            // $file_name = "1.12"; //文件名
            // $file = $file_name.".xlsx"; //文件后缀
            
            $col = range('A','P');
            $myFilter = new MyReadFilter(1, 5001, $col);

            $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
            $reader->setReadFilter($myFilter); // 设置读取区间
            $reader->setReadDataOnly(TRUE); // 设置为只读
            // 打开读取文件
            try {
                $spreadsheet = $reader->load($file);
            } catch (\PhpOffice\PhpSpreadsheet\Reader\Exception $e) {
                die($e->getMessage());
            }
    
            $sheet = $spreadsheet->getActiveSheet();
    
            $res = array();
    
            foreach($sheet->getRowIterator(1) as $row) {
                $tmp = array();
                foreach ($row->getCellIterator() as $cell) {
                    $tmp[] = $cell->getFormattedValue();
                }
                $res[$row->getRowIndex()] = $tmp;
            }
            $arr = array();
            $i = 0;
            // 过滤空行数据
            foreach( $res as $k=>$v){   
                if(!$v[0])
                    unset($res[$k]);
                else {
                    $val = "";
                    foreach($v as $j) {
                        $val .= "'".$j."',";
                    }
                    // 过滤最后的“,”
                    // $val = rtrim($val, ',');
                    $arr[$i] = $val;
                    // echo $i.$arr[$i]."<br>";
                    $i++;
                }
            }  
            return $arr;
        }
    }