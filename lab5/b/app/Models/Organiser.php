<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Organiser extends Model
{
    protected $fillable = ['full_name', 'email', 'phone'];
    public function events():hasMany
    {
        return $this->hasMany(Event::class);
    }
}
