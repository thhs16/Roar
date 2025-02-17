<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Appointment extends Model
{
    use HasFactory;
    protected $fillable = ['aptTime','expert_id','expert_name','status','user_id','student_name','student_email','student_phone', 'screenshot'];
}
