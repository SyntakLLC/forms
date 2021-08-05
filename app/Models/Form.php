<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use BinaryCabin\LaravelUUID\Traits\HasUUID;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Form extends Model
{
    use HasFactory;

    use HasUUID;

    use SoftDeletes;

    protected $fillable = [
        'user_id',
        'title',
        'id_color',
        'cover_photo_url'
    ];

    protected $appends = [
        'cover_photo',
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
        return $this->belongsTo(User::class);
    }

    public function site()
    {
        return $this->belongsTo(Site::class);
    }

    public function questions()
    {
        return $this->hasMany(Question::class);
    }
}
