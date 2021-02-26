<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class userModel extends Authenticatable
{
    // use HasFactory;
    // use Authenticatable;
    protected $table = "users";
    protected $fillable = [
        'id',
        'nama',
        'email',
        'password',
        'remember_token',
    ];
    protected $guarded = [];
    protected $hidden = [
        'password',
    ];
}
