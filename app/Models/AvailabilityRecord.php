<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AvailabilityRecord extends Model
{
  protected $table = 'availabilities';
  protected $guarded = [];

  protected $fillable = [
    'user_id',
    'date',
  ];
}
