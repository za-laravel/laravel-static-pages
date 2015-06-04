# laravel-static-pages

Static pages admin package for Laravel 5

## Installation

 * install package with ```composer require za-laravel/laravel-static-pages:"dev-master"``` 
  
 * Now append service provider to providers array in config/app.php.
     
     ```php
     <?php
     
     'providers' => array(
     
         'Illuminate\Foundation\Providers\ArtisanServiceProvider',
         'Illuminate\Auth\AuthServiceProvider',
         ...
         'ZaLaravel\LaravelNavigation\LaravelStaticPagesServiceProvider',
     
     ),
     ?>
     ```
 * publish migration and seeds ```php artisan vendor:publish --force``` 
   
  
     
## Usage 
  