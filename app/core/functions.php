<?php
include 'config.php';

class Database {
    public $conn;

    public function __construct() {
        $this->conn = $this->db_connect();
    }

    private function db_connect() {
        $dsn = DBDRIVER . ":host=" . DBHOST . ";dbname=" . DBNAME;
        return new PDO($dsn, DBUSER, DBPASS);
    }

    public function db_query($query, $data = []) {
        $stm = $this->conn->prepare($query);
        $stm->execute($data);
        return $stm->fetchAll(PDO::FETCH_ASSOC);
    }

    public function db_query_one($query, $data = []) {
        $result = $this->db_query($query, $data);
        return $result ? $result[0] : false;
    }

    public function search($query) {
        return $this->conn->query($query)->fetchAll(PDO::FETCH_ASSOC);
    }
}

// Helper functions
function show($data) {
    echo "<pre>", print_r($data, true), "</pre>";
}

function page($file) {
    return "../app/pages/" . $file . ".php";
}

function redirect($page) {
    header("Location: " . ROOT . "/" . $page);
    die;
}

function set_value($key, $default = '') {
    return $_POST[$key] ?? $default;
}

function set_select($key, $value, $default = '') {
    $selected = $_POST[$key] ?? $default;
    return ($selected == $value) ? "selected" : "";
}

function get_date($date) {
    return date("jS M, Y", strtotime($date));
}

function logged_in() {
    return !empty($_SESSION['USER']) && is_array($_SESSION['USER']);
}

function is_admin() {
    return !empty($_SESSION['USER']['role']) && $_SESSION['USER']['role'] === 'admin';
}

function user($column) {
    return $_SESSION['USER'][$column] ?? "Unknown";
}

function authenticate($user) {
    $_SESSION['USER'] = $user;
}

function str_to_url($string) {
    $url = preg_replace('~[^\\pL0-9_]+~u', '-', $string);
    $url = iconv("utf-8", "us-ascii//TRANSLIT", $url);
    return strtolower(trim(preg_replace('~[^-a-z0-9_]+~', '', $url), "-"));
}

function esc($str) {
    return nl2br(htmlspecialchars($str));
}

function get_category($id) {
    $db = new Database();
    $row = $db->db_query_one("SELECT category FROM categories WHERE id = :id LIMIT 1", ['id' => $id]);
    return $row['category'] ?? "Unknown";
}

function get_artist($id) {
    $db = new Database();
    $row = $db->db_query_one("SELECT name FROM artists WHERE id = :id LIMIT 1", ['id' => $id]);
    return $row['name'] ?? "Unknown";
}

function message($message = '', $clear = false) {
    if ($message) {
        $_SESSION['message'] = $message;
    } elseif (!empty($_SESSION['message'])) {
        $msg = $_SESSION['message'];
        if ($clear) unset($_SESSION['message']);
        return $msg;
    }
    return false;
}
