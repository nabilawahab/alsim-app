<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    use HasFactory;
    protected $fillable = [
        'log_amount',
        'time_in',
        'log_defined_id',
        'schedule_defined_id',
        'id_alsim'
    ];
}
