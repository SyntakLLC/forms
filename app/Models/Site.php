<?php

namespace App\Models;

use BinaryCabin\LaravelUUID\Traits\HasUUID;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

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
        'slug',
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

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'uuid');
    }

    protected $appends = [
        'cover_photo',
    ];


    /*
     * HasUUID code
     */


    public function getUUIDFieldName()
    {
        if (! empty($this->uuidFieldName)) {
            return $this->uuidFieldName;
        }

        return 'uuid';
    }

    public static function generateUUID()
    {
        return \Uuid::generate()->string;
    }

    public function scopeByUUID($query, $uuid)
    {
        return $query->where($this->getUUIDFieldName(), $uuid);
    }

    public static function findByUuid($uuid)
    {
        return static::byUUID($uuid)->first();
    }

    public static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $uuid = Str::uuid();

            if (empty($model->uuid)) {
                $model->uuid = $uuid;
            }

            if (empty($model->slug)) {
                $model->slug = $uuid;
            }
        });
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
