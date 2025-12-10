<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Event extends Model
{
    protected $fillable = ['name', 'description', 'type', 'organiser', 'date'];
    public function organiser(): belongsTo
    {
        return $this->belongsTo(Organiser::class);
    }
}
