<?php
require $_SERVER['DOCUMENT_ROOT'] . "/web_nghe_nhac/app/core/init.php";
class songClass{
    public $Database;
    public function __construct(){
        $this->Database = new Database;
    }

    //hàm tìm kiếm bài hát hoặc nghệ sỹ
    public function search($key){
        $sql = "SELECT b.id, b.tenbaihat, b.image, n.id 
        FROM baihat b
        JOIN nghesy n ON b.manghesy = n.manghesy
        WHERE b.tenbaihat LIKE :$key OR n.nghesy LIKE :$key";
        $result = $this->Database->search($sql);
        return $result;
    }
}
?>