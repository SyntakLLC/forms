<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use BinaryCabin\LaravelUUID\Traits\HasUUID;
use Illuminate\Database\Eloquent\SoftDeletes;

class Response extends Model
{
    use HasFactory;

    use HasUUID;

    use SoftDeletes;

    protected $fillable = [
        'lead_id',
        'question',
        'response',
        'index'
    ];

    public function getRouteKeyName()
    {
        return 'uuid';
    }

    public function lead()
    {
        return $this->belongsTo(Lead::class);
    }
}
