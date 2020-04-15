<?php

// 告诉浏览器返回为json类型
header('Content-Type:application/json; charset=utf-8');

// 较密用的key
$key = 'zhqzs';

// 获取参数
$name = $_GET['name'];
$pwd = $_GET['pwd'];

/**
 * 在真正的开发过程中，会操作数据库，我们暂时用一个多维数组代替
 */
$users = array(
    array('name' => 'zhq','pwd' => '123456','nick' => '天下第一帅'),
    array('name' => 'tom','pwd' => '654321', 'nick' => '帅的不明显')
);

$tokens = array(
    'zhq' => 'db16f83919890274272f4517fbba9d76',
    'tom' => 'e10adc3949ba59abbe56e057f20f883e'
);

foreach($users as $key=>$value){

    if($value['name']==$name && $value['pwd']==$pwd){
        // 一通骚操作后，给$token赋值
        $token = $tokens[$name];    // 看门大爷登记，发证
        $nick_name = $value['nick'];
    }
}

// 组织的数据
$data = array(
    'code' => 200,
    'msg' => '请求成功',
    'result' => array(
        'name' => $name,
        'nick' => $nick_name,
        'token' => $token,
    ),

);

// PHP数组转json
$rst = json_encode($data,JSON_UNESCAPED_UNICODE);

// 打印结果
echo $rst;

