# 控制器
## 控制器

### 控制器生成

**资源控制器生成：**

php atrisan：命令：

    php artisan make:controller Admin/BillboardController --resource
    
**普通控制器生成：**

    php artisan make:controller Admin/BillboardController

### laravel关闭csrf验证
打开文件：`app\Http\Middleware\VerifyCsrfToken.php`

**被过滤的路由：**

       protected $except = [
            //
            '/complaints',
            '/billboard'
        ];

# 模型

## 模型

### 模型生成

**模型生成：**

    php artisan make:model Model/Billboards