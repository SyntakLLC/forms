<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use BinaryCabin\LaravelUUID\Traits\HasUUID;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;
use Spark\Billable;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;
    use Billable;
    use HasFactory;
    use HasUUID;
    use SoftDeletes;

    public function leads()
    {
        return $this->hasMany(Lead::class);
    }

    public function forms()
    {
        return $this->hasMany(Form::class);
    }

    public function properties()
    {
        return $this->hasMany(Property::class);
    }

    public function site()
    {
        return $this->hasOne(Site::class, 'user_id', 'uuid');
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'accent_color',
        'message',
        'layout',
        'cover_photo_url',
        'pattern',
    ];

    public function getRouteKeyName()
    {
        return 'uuid';
    }

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'trial_ends_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url',
    ];
}
