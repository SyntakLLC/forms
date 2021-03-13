<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use BinaryCabin\LaravelUUID\Traits\HasUUID;
use Illuminate\Database\Eloquent\SoftDeletes;

class Option extends Model
{
    use HasFactory;

    use HasUUID;

    use SoftDeletes;

    protected $fillable = [
        'question_id',
        'title',
        'index'
    ];

    public function getRouteKeyName()
    {
        return 'uuid';
    }

    public function question()
    {
        return $this->belongsTo(Question::class);
    }
}
