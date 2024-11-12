<?php

// Set base configuration depending on the environment
$config = [
    'ROOT' => ($_SERVER['SERVER_NAME'] == "localhost") ? "http://localhost/web_nghe_nhac/public" : "http://www.mywebsite.com",
    'DBDRIVER' => "mysql",
    'DBHOST' => "localhost",
    'DBUSER' => "root",
    'DBPASS' => "",
    'DBNAME' => "letchill_data"
];

// Define constants if they are not already defined
foreach ($config as $key => $value) {
    if (!defined($key)) {
        define($key, $value);
    }
}
