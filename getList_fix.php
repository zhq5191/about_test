<?php

// 告诉浏览器返回为json类型
header('Content-Type:application/json; charset=utf-8');


// 获取参数
$page = $_GET['page'];
$size = $_GET['size'];


/**
 * 在真正的开发过程中，会操作数据库，我们暂时用一个多维数组代替
 */
$data_list = array(
    array('id'=>1,'name'=>'成龙','create_time'=>1587890857000),
    array('id'=>2,'name'=>'周润发','create_time'=>1587804457000),
    array('id'=>3,'name'=>'周星驰','create_time'=>1587690857000),
    array('id'=>4,'name'=>'李连杰','create_time'=>1587590857000),
    array('id'=>5,'name'=>'梁朝伟','create_time'=>1587490857000),
    array('id'=>6,'name'=>'张曼玉','create_time'=>1587390857000),
    array('id'=>7,'name'=>'惠英红','create_time'=>1587290857000),
    array('id'=>8,'name'=>'林青霞','create_time'=>1587190857000),
    array('id'=>9,'name'=>'王祖贤','create_time'=>1587090857000),
    array('id'=>10,'name'=>'巩俐','create_time'=>1586890857000)
);

foreach($data_list as $key=>$value){

    if($key >= ($page -1) * $size &&  $key < $page * $size){
        $temp[] = $value;
    }
}


// 组织的数据
$data = array(
    'code' => 200,
    'msg' => '请求成功',
    'result' => $temp

);

// PHP数组转json
$rst = json_encode($data,JSON_UNESCAPED_UNICODE);

// 打印结果
echo $rst;

