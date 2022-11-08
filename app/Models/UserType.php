<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class UserType extends Model
{
    use HasFactory;

    protected $guarded = [];

    public const ADULT = 1;
    public const YOUNG = 2;
    public const CHILD = 3;


    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function createdAt(): Attribute
    {
        return new Attribute(
            get: fn ($value) => \Carbon\Carbon::parse($value)->format('d/m/Y')
        );
    }
}
