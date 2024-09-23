<?php
    class Database{
        private $hostName = 'localhost';
        private $userName = 'root';
        private $password = '';
        private $dbName = '';

        private $conn = NULL;
        private $result = NULL;
        
        public function connect(){
            $this->conn = new mysqli($this->hostName, $this->userName, $this->password, $this->dbName);
            if ($this->conn->connect_error) {
                die("Connection failed: " . $this->conn->connect_error);
            }
            mysqli_set_charset($this->conn, 'UTF8');
            return $this->conn;
        }

        // thực thi câu lệnh truy vấn
        public function execute($sql){
            $this->result = $this->conn->query($sql);
            return $this->result;
        }

        //phương thức lấy dữ liệu
        public function getData(){
            if($this->result){
                $data = mysqli_fetch_array($this->result);
            }
            else{
                $data = 0;
            }
            return $data;
        }

        //phương thức lấy toan bo du lieu
        public function getAllData($table){
            $sql="select * from $table";
            $this->execute($sql);
            if($this->num_rows() == 0){
                $data = 0;
            }else{
                while($datas = $this->getData()){
                    $data[] = $datas;
                }
            }
            return $data;
        }

        //phương thức lấy dữ liệu cần sửa theo id
        public function getDataId($table, $id){
            $sql="select * from $table where id='$id'";
            $this->execute($sql);
            if($this->num_rows()!=0){
                $data = mysqli_fetch_array($this->result);
            }
            else{
                $data = 0;
            }
            return $data;
        }

        //phuong thuc dem so ban ghi
        public function num_rows(){
            if($this->result){
                $num=mysqli_num_rows($this->result);
            }
            else{
                $num=0;
            }
            return $num;
        }

        //phuong thuc them du lieu
        public function InsertData($table, $hoten, $namsinh, $quequan){
            $sql = "INSERT INTO $table(id, hoten, namsinh, quequan) VALUES (null, '$hoten', '$namsinh', '$quequan')";
            return $this->execute($sql);
        }

        //phuong thuc sua du lieu
        public function UpdateData($table, $id, $hoten, $namsinh, $quequan){
            $sql = "UPDATE $table SET hoten = '$hoten', namsinh = '$namsinh', quequan = '$quequan' WHERE id = '$id'";
            return $this->execute($sql);
        }

        //phuong thuc xoa du lieu
        public function DeleteData($table, $id){
            $sql = "DELETE FROM $table WHERE id = '$id'";
            return $this->execute($sql);
        }

        //phuong thuc tim du lieu theo tu khoa
        public function SearchData($table, $key){
            $sql="select * from $table where hoten regexp '$key' order by id desc";
            $this->execute($sql);
            if($this->num_rows() == 0){
                $data = 0;
            }else{
                while($datas = $this->getData()){
                    $data[] = $datas;
                }
            }
            return $data;
        }


        public function closeConnection() {
            if ($this->conn) {
                $this->conn->close();
            }
        }
    }
?>