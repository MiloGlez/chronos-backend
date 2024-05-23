<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ChronoProfile extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'chrono_profiles';

    protected $fillable = [
        'name',
    ];

    protected $hidden = [];

    protected $casts = [
        'id' => 'int'
    ];

    public $incrementing = true;
}
