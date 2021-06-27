<?php

namespace App\Models;

use BinaryCabin\LaravelUUID\Traits\HasUUID;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;

class Property extends Model
{
    use HasFactory;

    use HasUUID;

    use SoftDeletes;

    protected $fillable = [
        'user_id',
        'site_id',
        'bed',
        'bath',
        'square_feet',
        'cost',
        'street_address',
        'town_and_state',
        'description',
        'property_photo_url',
    ];

    protected $appends = [
        'property_photo',
    ];

    public function getPropertyPhotoAttribute()
    {
        if ($this->property_photo_url==null) {
            return null;
        } else {
            return Storage::url($this->property_photo_url);
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
}
