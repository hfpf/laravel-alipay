<?php
return [
    // 应用ID,您的APPID(必填)
    'app_id' => 'xxxxxxxxxxxx',

    // 私钥文件路径（秘钥和秘钥文件路径不能同时为空）(
    //'private_key_file_path' => null,

    // 公钥文件路径（秘钥和秘钥文件路径不能同时为空）
    //'public_key_file_path' => null,

    // 商户私钥（秘钥和秘钥文件路径不能同时为空）
    'private_key' => 'your-private-key',

    // 支付宝公钥（秘钥和秘钥文件路径不能同时为空）,查看地址：https://openhome.alipay.com/platform/keyManage.htm 对应APPID下的支付宝公钥。
    'public_key' => 'your-public-key',

    // 默认异步通知地址（可选配置项:默认为""）
    //'notify_url' => 'http://api.test.alipay.net/atinterface/receive_notify.htm',

    // 默认同步跳转地址（可选配置项:默认为""）
    //'return_url' => '',

    // 编码格式（可选配置项,默认为UTF-8）
    //'charset' => 'UTF-8',

    // 签名方式（可选配置项,默认为RSA2）
    //'sign_type'=>'RSA2',

    // 支付宝网关（可选配置项,默认为https://openapi.alipay.com/gateway.do）
    //'gatewayUrl' => ''
];