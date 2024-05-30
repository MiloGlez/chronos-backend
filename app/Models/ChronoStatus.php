<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ChronoStatus extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'chrono_statuses';

    protected $fillable = [
        'description',
        'name'
    ];

    protected $hidden = [];

    protected $casts = [
        'id' => 'int'
    ];

    public $incrementing = true;
}
