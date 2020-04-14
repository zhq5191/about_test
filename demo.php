<?php


    // 告诉浏览器返回为json类型
    header('Content-Type:application/json; charset=utf-8');

    // 组织的数据
    $data = array(
        'code' => 200,
        'msg' => '请求成功',
        'result' => array(
            'key1' => 'value1',
            'key2' => 'value2'
        )

    );

    // PHP数组转json
    $rst = json_encode($data,JSON_UNESCAPED_UNICODE);

    // 打印结果
    echo $rst;

