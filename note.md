# TMT system

## Cai dat goi laravel modules packages

- composer require nwidart/laravel-modules
- php artisan vendor:publish --provider="Nwidart\Modules\LaravelModulesServiceProvider"
- composer dump-autoload
- Link tài liệu tham khảo
        <https://nwidart.com/laravel-modules/v6/basic-usage/creating-a-module>

### Câu lệnh sử dụng cơ bản

- php artisan module:make 'module-name'
- php artisan module:make-migration create_products_table Product
- php artisan module:seed --class=TenClassSeeder Product

### Schema create table  

- $table -> enum('is_saleable',['yes','no'])
- $table -> foreignId('created_by')->constrained('users')
