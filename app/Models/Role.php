<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Spatie\Permission\Models\Role as SpatieRole;

class Role extends SpatieRole
{
    // IMPORTANT: Should not be changed
    // Base User roles ID, does not rely on the name because it can be changed
    public const SUPER_ADMIN = 1;
    public const PATIENT = 2;
    public const DOCTOR = 3;
    public const NURSE = 4;

    protected $guarded = [];

    public function createdAt(): Attribute
    {
        return new Attribute(
            get: fn ($value) => \Carbon\Carbon::parse($value)->format('d/m/Y')
        );
    }
}
