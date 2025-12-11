<?php

namespace App\Models;

use App\Observers\EventObserver;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

#[ObservedBy(EventObserver::class)]
class Event extends Model
{
    use hasFactory;
    protected $fillable = ['name', 'description', 'type', 'organiser', 'date'];
    public function organiser(): belongsTo
    {
        return $this->belongsTo(Organiser::class);
    }
}
