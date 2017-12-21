# laravel-ckeditor
CKEditor是新一代的FCKeditor,是一个重新开发的版本。CKEditor是全球最优秀的网页在线文字编辑器之一,因其惊人的性能与可扩展性而广泛的被运用于各大网站。
此包采用了官方最新ckeditor4.6版集成，支持Laravel5及以上版本。
# 安装

### Composer方式安装

```shell
composer require banbans/laravel-ckeditor
```

### Laravel配置

* 在config\App.php中增加配置

```php
Banbans\Ckeditor\EditorServiceProvider::class
```

* 增加别名
```php
'Ckeditor' =>Banbans\Ckeditor\Ckeditor::class,
```

* 发布配置及资源文件
```php
php artisan vendor:publish --provider="Banbans\Ckeditor\EditorServiceProvider" --tag="ckeditor"
```

# 配置&使用

```php
//调用编辑器
{{ Ckeditor::content('内容', ['id'=>'editor', 'class'=>'text-editor']) }}
//调用JS 多次调用编辑器可以多次调用js，传入id就可以
{{ Ckeditor::js('editor') }}
```

