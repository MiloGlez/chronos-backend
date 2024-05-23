<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ChronoStop extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'chrono_stops';

    protected $fillable = [
        'employee_id',
        'status_id',
        'start_date',
        'end_date'
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

public function status()
{
    return $this->belongsTo(ChronoStatus::class, 'status_id');
}

}
