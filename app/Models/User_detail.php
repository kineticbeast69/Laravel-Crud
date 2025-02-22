<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User_detail extends Model
{
    /** @use HasFactory<\Database\Factories\UserDetailFactory> */
    use HasFactory;
    protected $fillable = ["username,email,password"];
}
