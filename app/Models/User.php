<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Laravel\Sanctum\HasApiTokens;
use Spatie\MediaLibrary\HasMedia;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\Permission\Traits\HasPermissions;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements HasMedia
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles, HasPermissions, InteractsWithMedia;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded = [];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    protected $appends = ['image', 'age'];


    public function userType() : BelongsTo
    {
        return $this->belongsTo(UserType::class);
    }

    public function image() : Attribute 
    {
      return new Attribute(
        get : fn() => $this->getFirstMediaUrl(),
      );
    }


    public static function getPatient()
    {
      return self::role(Role::PATIENT);
    }

    public function scopePatient($query)
    {
      return $query->role(Role::PATIENT);
    }

    public function createdAt(): Attribute
    {
        return new Attribute(
            get: fn ($value) => \Carbon\Carbon::parse($value)->format('d/m/Y')
        );
    }


    public function age() : Attribute
    {
      return new Attribute(
        get: fn() => now()->diffInYears($this->birthday_at)
      );
    }

    public function medicalBooklet() : BelongsTo
    {
      return $this->belongsTo(MedicalBooklet::class);
    }

    
}
