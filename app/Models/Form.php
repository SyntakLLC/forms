<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use BinaryCabin\LaravelUUID\Traits\HasUUID;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Form extends Model
{
    use HasFactory;

    use HasUUID;

    use SoftDeletes;

    protected $fillable = [
        'user_id',
        'title'
    ];

    public function getRouteKeyName()
    {
        return 'uuid';
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function questions()
    {
        return $this->hasMany(Question::class);
    }
}
