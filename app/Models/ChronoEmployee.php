<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Tymon\JWTAuth\Contracts\JWTSubject;

class ChronoEmployee extends Authenticatable implements JWTSubject
{
    use HasFactory, SoftDeletes;

    protected $table = 'chrono_employees';

    protected $fillable = [
        'name',
        'last_name',
        'phone',
        'email',
        'password',
        'profile_id',
        'job_id'
    ];

    protected $hidden = [
        'password'
    ];

    protected $casts = [
        'id' => 'int'
    ];

    public $incrementing = true;

    public function profile()
    {
        return $this->belongsTo(ChronoProfile::class, 'profile_id');
    }

    public function job()
    {
        return $this->belongsTo(ChronoJob::class, 'job_id');
    }

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [];
    }
}




