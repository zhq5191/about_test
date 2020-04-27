<?php

    // 告诉浏览器返回为json类型
    header('Content-Type:application/json; charset=utf-8');

    $filename = "./data.txt";
    $handle = fopen($filename, "r");//读取二进制文件时，需要将第二个参数设置成'rb'

    //通过filesize获得文件大小，将整个文件一下子读到一个字符串中
    $contents = fread($handle, filesize ($filename));


    fclose($handle);

    $handle = fopen($filename, "w");//读取二进制文件时，需要将第二个参数设置成'rb'

    $contents = $contents -1;

    fwrite($handle,$contents);

    fclose($handle);




    // 组织的数据
    $data = array(
        'code' => 200,
        'msg' => '购买成功',
        'result' => array(
            'num' => $contents
        )

    );

    // PHP数组转json
    $rst = json_encode($data,JSON_UNESCAPED_UNICODE);

    // 打印结果
    echo $rst;

