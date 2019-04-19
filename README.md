# DuoDuoKE SDK
拼多多非官方SDK,主要实现了多多客权限包中的API接口.该sdk正在用于实际项目的开发中,基本的功能已经完成,后续有补充会及时更新

### require
- PHP > 5.4.0

### Installation
`composer require chaincszzz/duoduoke`

### File
- Dkutil.php 主要提供一些工具类
- Base.php 核心参数签名. 验证签名,请求多多api
- Dk.php api的类文件
- Type.php 定义哆哆客api type

### usage
建议通过通过创建单例模式来创建Dk对象,Example:

```
<?php
 
 use duoduoke\Dk;
 
 class Dkinst {
     protected static $dk = NULL;
     
     public static function Init() {
         if (self::$dk) {
             return self::$dk;
         }
         
         $client_id     = "哆哆客id";
         $client_secret = "多多客秘钥";
         self::$dk      = new Dk($client_id, $client_secret);
         
         return self::$dk;
     }
     
     public function __clone() {
         // TODO: Implement __clone() method.
     }
 }
 ```

在具体业务中调用
```
include "Dkinst.php";
$dk = Dkinst::Init();

$dk->goods_basic_info_get();
```

### Tips
- Dk.php中存在很多ext参数,这是一个可选参数数组
- 调用api后返回的是一个数组

### 联系
wechat:thinkpapapa