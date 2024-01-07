<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReportRecord extends Model
{
    use HasFactory;
    protected $table = "reports";
    protected $fillable = [
        'id',
        'user_id',
        'name',
        'date',
        'feedback',
    ];
}
