<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Consultation extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function consultationType()
    {
        return $this->belongsTo(ConsultationType::class);
    }

    public function medicalBooklet()
    {
        return $this->belongsTo(MedicalBooklet::class);
    }

    public function doctor()
    {
        return $this->belongsTo(User::class, 'doctor_id');
    }


    

    
}
