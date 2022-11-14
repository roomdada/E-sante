<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Appointment extends Model
{
    use HasFactory;

    protected $guarded = [];

  protected $casts = [
        'created_at' => 'datetime:d-m-Y',
    ];


    public function doctor()
    {
        return $this->belongsTo(User::class, 'doctor_id');
    }

    public function createdAt() : Attribute 
    {
      return new Attribute(
        get: fn($value) => Carbon::parse($value)->format('d/m/Y'),
      );
    }

    public function appointmentAt() : Attribute 
    {
      return new Attribute(
        get: fn($value) => Carbon::parse($value)->format('d/m/Y'),
      );
    }

  
}
