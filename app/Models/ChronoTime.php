<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ChronoTime extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'chrono_times';

    protected $fillable = [
        'employee_id',
        'date_of_entry',
        'departure_date',
        'stop_id',
        'observation'
    ];

    protected $hidden = [];

    protected $casts = [
        'id' => 'int'
    ];

    public $incrementing = true;

    public function employee()
{
    return $this->belongsTo(ChronoEmployee::class, 'employee_id');
}

public function stop()
{
    return $this->belongsTo(ChronoStop::class, 'stop_id');
}

}
