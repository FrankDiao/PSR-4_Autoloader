<?php

class Autoloader {
    public function __construct() {
        spl_autoload_register(array($this, 'loader')); // 从加载器内部实现引入文件
    }

	// 加载类
    private function loader($className) {
    	// 加载方式需根据项目架构自行定义。但请遵守PSR-4自动加载规范: https://www.php-fig.org/psr/psr-4/
    	$path = $this->strLoader($className); // 为了演示，这里提供了两种加载方法
    	include $path . '.php';
    }



    // 数组方式加载
    private function arrLoader($className)
    {
    	$namespace = explode('\\', $className);
    	
    	$vendorNamespace = array_shift($namespace); // 顶级命名空间
    	$fileName = array_pop($namespace);	// 文件名

    	$path = '';
    	foreach ($namespace as $key => $value) {
    		$path .= $value.'/';
    	}

    	return $path.$fileName;
    }



    // 字符串方式加载
    private function strLoader($className)
    {
    	$namespace = substr($className, 4);
    	return $namespace;
    }
}

?>