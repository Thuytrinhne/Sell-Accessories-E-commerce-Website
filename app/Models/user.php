<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class user extends Model
{
    use HasFactory;
    protected $table ='user';
    protected $hidden = [
        'password' 
    ];
    protected $fillable = [
        "id",
        "full_name",
        "sex",
        "phone",
        "email",
        "role_id",
        "password",
        "birth",
    ];

}
