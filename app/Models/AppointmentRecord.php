<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AppointmentRecord extends Model
{
    use HasFactory;

    protected $table = "appointments";

    protected $fillable = [
        'id',
        'user_id',
        'date',
        'time',
        'purpose',
        'status',
    ];

    public function userType()
    {
        return $this->belongsTo(UserRecord::class, 'user_id');
    }

}
