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

// 遍历完成后使用一个变量记录状态，如果存在就是真，如果没有就是假
$flag = isSet($token) ? true : false ;


if($flag){
    // 组织的数据
    $data = array(
        'code' => 200,
        'msg' => '登录成功',
        'result' => array(
            'name' => $name,
            'nick' => $nick_name,
            'token' => $token,
        ),

    );
}else{
    $data = array(
        'code' => 200,
        'msg' => '账号或者密码错误',
        'result' => array()
    );
}


// PHP数组转json
$rst = json_encode($data,JSON_UNESCAPED_UNICODE);

// 打印结果
echo $rst;

