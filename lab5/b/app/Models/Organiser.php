<?php

namespace App\Models;

use App\Observers\OrganiserObserver;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

#[ObservedBy(OrganiserObserver::class)]
class Organiser extends Model
{
    use hasFactory;
    protected $fillable = ['full_name', 'email', 'phone'];
    public function events():hasMany
    {
        return $this->hasMany(Event::class);
    }
}
