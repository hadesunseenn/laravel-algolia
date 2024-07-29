<?php

namespace Laracore\LaravelAlgolia\Models;
 
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LaracoreAlgoliaRequest extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name',
        'request',
    ];
}