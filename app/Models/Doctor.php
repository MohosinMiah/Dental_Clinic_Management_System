<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
  use HasFactory,SoftDeletes;

    protected $table = 'doctors';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    protected $fillable = [
        'name',
        'phone',
        'email',
        'designation',
        'personal_home_page',
        'degress',
        'department',
        'specialist',
        'experience',
        'date_of_birth',
        'gender',
        'blood_group',
        'about_me',
        'profile_pic',
        'password',
        'address',
    ];
}
