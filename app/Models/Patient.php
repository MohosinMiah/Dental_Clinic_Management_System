<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory, SoftDeletes;
    
    protected $table = 'patients';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    protected $fillable = [
        'name',
        'phone',
        'age',
        'gender',
        'email',
        'blood_group',
        'address',
        'heart_disease',
        'high_blood',
        'diabetic',
        'note',
    ];
}
