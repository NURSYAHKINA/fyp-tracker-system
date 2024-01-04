<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserRecord extends Model
{
    use HasFactory;

    protected $table="users";

    protected $fillable = [
        'name',
        'email',
        'password',
        'role_id',
        'user_majoring',
        'user_category'
    ];

    public function userType(){

        return $this->belongsTo(UserRecord::class);
    }
}
