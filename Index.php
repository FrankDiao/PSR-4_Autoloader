<?php

// 初始化自动加载器
require_once './library/Autoloader.php';
$autoloader = new Autoloader();


// 命名空间引入
use app\vendor\Test1;
use app\vendor\Test2;

$test1 = new Test1();
$test2 = new Test2();

// 输出：
// Test1
// Test2

?>