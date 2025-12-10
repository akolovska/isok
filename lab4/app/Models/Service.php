<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// php artisan make:model Service

class Service extends Model
{
    use HasFactory;

    protected $fillable = [
        'mechanic',
        'clients',
        'model',
        'registration',
        'description',
        'price',
        'begin',
        'end',
    ];
}
