<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory,SoftDeletes;

    protected $table = 'invoices';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    protected $fillable = [
        'patient_id',
        'doctor_id',
        'added_by_id',
        'patient_phone',
        'patient_name',
        'patient_address',
        'payment_date',
        'total',
        'tax_total',
        'grand_total',
        'paid_amount',
        'due_total',
        'payment_note',
        'payment_method',
        'payment_method_note',
    ];
}
