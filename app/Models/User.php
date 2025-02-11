<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class User extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'nickname', 'email', 'image' , 'role', 'provider_type', 'provider_id' , 'provider_token', 'phone' , 'address'];

}
