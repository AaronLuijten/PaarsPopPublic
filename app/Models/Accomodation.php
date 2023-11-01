<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Accomodation extends Model
{
    use HasFactory;
    protected $fillable =
    [
        'presence',
        'stay_over',
        'accomodation_type',
        'accomodation_length',
        'accomodation_width',
        'number_of_guests_weekend',
        'number_of_guest_sat',
        'number_of_guest_sun',
        'dinner_sat',
        'brunch_sun',
        'dinner_sun',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
