<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    protected $table ="roles";

    public function userType()
    {
        return $this->belongsTo(Role::class, 'role_id');
    }
}
