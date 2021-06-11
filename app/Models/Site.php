<?php

namespace App\Models;

use BinaryCabin\LaravelUUID\Traits\HasUUID;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;

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

    public function getCoverPhotoAttribute()
    {
        if ($this->cover_photo_url==null) {
            return null;
        } else {
            return Storage::url($this->cover_photo_url);
        }
    }

    public function getRouteKeyName()
    {
        return 'uuid';
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'uuid');
    }

    protected $appends = [
        'cover_photo',
    ];
}
