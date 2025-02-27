<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = [
        'name',
        'add',
        'gender',
        'dob',
        'email',
        'password',
        'photo'];
}
