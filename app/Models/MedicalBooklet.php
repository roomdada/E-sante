<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MedicalBooklet extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function consultations()
    {
        return $this->hasMany(Consultation::class);
    }

    
}
