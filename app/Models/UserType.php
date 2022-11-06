<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserType extends Model
{
    use HasFactory;

    protected $guarded = [];

    public const PARENT = 'Parent';
    public const CHILD = 'Enfant';
}
