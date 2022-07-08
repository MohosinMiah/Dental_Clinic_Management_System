<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Appointment extends Model
{
	use HasFactory,SoftDeletes;

	protected $table = 'appointments';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array<int, string>
	 */

	protected $fillable = [
		'patient_id',
		'patient_phone',
		'name',
		'date',
		'time',
		'gender',
		'email',
		'doctor_id',
		'note',
		'isRegistered'
	];

}
