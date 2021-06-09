<?php

namespace App\Models;

use BinaryCabin\LaravelUUID\Traits\HasUUID;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Site extends Model
{
    use HasFactory;

    use HasUUID;

    protected $fillable = [
        'message',
        'layout',
        'cover_photo_url',
        'pattern',
        'user_id',
        'accent_color',
        'section_content',
        'section_header',
        'initialized',
        'useProfilePhoto',
        'useOurContactUs'
    ];

    public function getRouteKeyName()
    {
        return 'uuid';
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'uuid');
    }
}
