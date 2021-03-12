<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Question extends Model
{
    use HasFactory;

    use HasUUID;

    use SoftDeletes;

    protected $fillable = [
        'form_id',
        'type',
        'title',
        'tagline',
        'subtitle',
        'description',
        'content',
        'multiple',
        'index'
    ];

    public function getRouteKeyName()
    {
        return 'uuid';
    }

    public function form()
    {
        return $this->belongsTo(Form::class);
    }

    public function options()
    {
        return $this->hasMany(Option::class);
    }
}
