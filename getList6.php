<?php

// 告诉浏览器返回为json类型
header('Content-Type:application/json; charset=utf-8');






// 判断是否为post请求
if($_SERVER['REQUEST_METHOD']=='POST'){

    $data = array(

        'code' => 200,
        'msg' => '请求参数错误',
        'result' => array()
    );

    $rst = json_encode($data,JSON_UNESCAPED_UNICODE);

    echo $rst;

    die();
}


// 获取参数
$page = isSet($_GET['page']) ? $_GET['page'] : 1;
$size = isSet($_GET['size']) ? $_GET['size'] : 2;


// 判断参数为0的情况
if($page == 0 || $size == 0){

    $data = array(

        'code' => 601,
        'msg' => '参数非法',
        'result' => array()
    );

    $rst = json_encode($data,JSON_UNESCAPED_UNICODE);

    echo $rst;

    die();
}

// 取绝对值，防止传负数的情况
$page = abs($page);
$size = abs($size);


/**
 * 在真正的开发过程中，会操作数据库，我们暂时用一个多维数组代替
 */
$data_list = array(
    array('id'=>1,'name'=>'成龙'),
    array('id'=>2,'name'=>'周润发'),
    array('id'=>3,'name'=>'周星驰'),
    array('id'=>4,'name'=>'李连杰'),
    array('id'=>5,'name'=>'梁朝伟'),
    array('id'=>6,'name'=>'张曼玉'),
    array('id'=>7,'name'=>'惠英红'),
    array('id'=>8,'name'=>'林青霞'),
    array('id'=>9,'name'=>'王祖贤'),
    array('id'=>10,'name'=>'巩俐')
);


// 修复没有页码数的缺陷
$count = count($data_list);   // 获取数据总长度

$total_num = ceil($count / floatval($size));


foreach($data_list as $key=>$value){

    if($key >= ($page -1) * $size &&  $key < $page * $size){
        $temp[] = $value;
    }
}


// 组织的数据
$data = array(
    'code' => 200,
    'msg' => '请求成功',
    'result' => array(
        'data' => $temp,
        'totalNum' => $total_num
    )

);

// PHP数组转json
$rst = json_encode($data,JSON_UNESCAPED_UNICODE);

// 打印结果
echo $rst;

