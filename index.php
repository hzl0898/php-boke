<?php
include 'vendor/smarty/libs/Smarty.class.php';

define('APPTYPE','index');
function autoload($class)
{
    $class = str_replace('\\', '/', $class);
    include "$class.php";
}
spl_autoload_register('autoload');

//入口文件的默认传值是：?c=index&a=index
$c = $_GET['c'] ?? 'index';
$c = ucfirst($c); 
$a = $_GET['a'] ?? 'index';


//通过URL中的c参数,拼接出对应的 控制器类
$controller = "app\\index\\controller\\{$c}Controller";

$obj = new $controller;


$obj->$a();
//入口中调用方法, 向外输出的html, 所以html中的路径相对于index.php文件
