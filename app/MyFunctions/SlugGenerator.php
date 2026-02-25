<?php
namespace App\MyFunctions;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;

class SlugGenerator{
    
    static function UniqueSlug(Model $model, string $text, string $column = 'slug'){
        $slug = Str::slug($text);
        if($model::where($column, $slug)->first()) return sprintf('%s_%s', $slug, Str::random(mt_rand(5, 10)));
        return $slug;
    }
}