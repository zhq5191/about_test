<?php

// 告诉浏览器返回为json类型
header('Content-Type:application/json; charset=utf-8');

/**
 * 连接数据库
 */
$host = '127.0.0.1';
$account = 'root';
$pwd = 'root';
$db = 'testQA';

$link = new mysqli($host,$account,$pwd,$db);

if($link->connect_error){
    die('连接失败'.$link->connect_error);
}


$sql = 'set names utf8';


//设置php操作时候的编码
$res = $link->query($sql);

$sql = 'select * from user';

$res = $link->query($sql);


while($row = $res -> fetch_assoc()){
    $data[] = $row;
}



$rst = array(
    'code' => 200,
    'msg' => '请求成功',
    'result' => $data
);


// PHP数组转json
$rst = json_encode($rst,JSON_UNESCAPED_UNICODE);

// 打印结果
echo $rst;

