<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Tutor extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'display_name', 'about', 'trained_student' , 'facebook_acc', 'instagram_acc', 'twitter_acc' , 'linkedin_acc'];
}
