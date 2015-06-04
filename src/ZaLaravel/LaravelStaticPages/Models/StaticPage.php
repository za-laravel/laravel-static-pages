<?php

namespace ZaLaravel\LaravelStaticPages\Models;

use Illuminate\Database\Eloquent\Model;
use ZaLaravel\LaravelStaticPages\Models\Interfaces\StaticPagesInterface;

/**
 * Class StaticPage
 * @package ZaLaravel\LaravelStaticPages\Models
 */
class StaticPage extends Model implements StaticPagesInterface{

    protected $fillable = ['slug', 'title', 'article', 'description', 'tags'];
}
