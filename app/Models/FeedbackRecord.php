<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FeedbackRecord extends Model
{
    use HasFactory;

    protected $table = "feedbacks";

    protected $fillable = [
        'id',
        'id_matric',
        'name',
        'rating',
        'comment',
        'user_id',
        'date',
    ];
}
