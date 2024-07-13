<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Url extends Model
{
    use HasFactory;

    protected $fillable = ['longUrl'];

    protected static function boot()
    {
        parent::boot();

        // We could also make this a function on the class and compute it. But this
        // way we have it in the database if we want to lookup a given shortUrl.
        static::saving(function ($model) {
            $model->shortUrl = \App\Utils\Url::shorten($model->longUrl);
        });
    }
}
