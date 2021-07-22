<?php

namespace App\Models;

use BinaryCabin\LaravelUUID\Traits\HasUUID;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;

class Photo extends Model
{
    use HasFactory;

    use HasUUID;

    use SoftDeletes;

    protected $fillable = [
        'property_id',
        'photo_url',
    ];

    protected $appends = [
        'photo',
    ];

    public function getPhotoAttribute()
    {
        if ($this->photo_url==null) {
            return null;
        } else {
            return Storage::url($this->photo_url);
        }
    }

    public function getRouteKeyName()
    {
        return 'uuid';
    }

    public function property()
    {
        return $this->belongsTo(Property::class);
    }
}
