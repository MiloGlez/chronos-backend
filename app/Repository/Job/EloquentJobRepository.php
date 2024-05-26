<?php
namespace App\Repository\Job;

use App\Models\ChronoJob;
use App\Repository\Job\Interfaces\JobRepositoryInterface;

class EloquentJobRepository implements JobRepositoryInterface
{
    public function getAll()
    {
        return ChronoJob::all();    
    }
}