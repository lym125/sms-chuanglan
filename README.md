# Sms Chuanglan

使用[创蓝云通讯](https://www.253.com)发送验证码。

## 安装

使用 [composer](http://docs.phpcomposer.com/) 安装，执行命令：

```
composer require cqpd/sms-chuanglan
```

## 使用

在 `.env` 文件中配置创蓝的 `account` 和 `password`.

```
...
SMS_CHUANGLAN_ACCOUNT=xxxxxxxxxxx
SMS_CHUANGLAN_PASSWORD=xxxxxxxxxxx
...
```

使用示例

```php
try {
    \Chuanglan::send('15683008877', '您的验证码: 1234.');
    
    \Peidi\Sms\Chuanglan\Facade::send('15683008877', '您的验证码: 1234.');
} catch (\Peidi\Sms\Chuanglan\Exception $e) {
    \Log::error($e);
}
```