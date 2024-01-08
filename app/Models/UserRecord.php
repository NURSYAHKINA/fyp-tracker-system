<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserRecord extends Model
{
    use HasFactory;

    protected $table="users";

    protected $fillable = [
        'id',
        'name',
        'id_matric',
        'email',
        'password',
        'role_id',
        'user_majoring',
        'user_category',
        'picture',
        'status',
        'sv_id',
    ];

    public function userType(){

        return $this->belongsTo(UserRecord::class);
    }

    public function role()
    {
        return $this->belongsTo(Role::class, 'role_id');
    }
}
