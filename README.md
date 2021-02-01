# FileGeneratorCommand

## Installation

Create custom files from command lines (php artisan)


```sh
composer require devaissa/file-generator-command:1.1.0
```

## Configuration

Inside your `bootstrap/app.php` file, add:

```php
$app->register(Devaissa\FileGeneratorCommand\FileGeneratorServiceProvider::class);
```

## Available Command


make:file name --cat=file-type (interface,class )            Create a new file (interface or class)


```
